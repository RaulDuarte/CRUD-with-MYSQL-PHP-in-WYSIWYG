<?php 

        include 'header.php';
        include './connection/connection.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php

                    if(isset($_GET['deleteId'])){

                        $anotId = $_GET['deleteId'];

                        echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Tem Certeza que Deseja Excluir a Anotação?</strong>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                    
                                    <form action='' method='post'>
                                        <br>
                                        <div class='form-group'>
                                            <input type='hidden' name='confirmId' value='$anotId'>
                                            <button type='submit' name='excluir' class='btn btn-danger'>Excluir</button> 
                                            <button type='button' class='btn btn-success' data-dismiss='alert'>Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                        ";
                    }

                    if(isset($_POST['confirmId'])){

                        $query = "DELETE FROM container WHERE id=".$_POST['confirmId'];

                        if(mysqli_query($link, $query)){
                            header("Location: listar.php");
                        }else{
                            echo "
                                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                        <strong>Erro ao tentar Excluir!</strong><br>".mysqli_error($link)."
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                            ";
                        }
                    }

                ?>

            </div>
        </div>

        <div id="table-content">
            <div class="row">
                <div class='col-md-12'>    
                    <h3 class="text-center">Lista de Anotações</h3>
                    <br> 
                    <table class="table">   
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Título</th>
                            <th scope="col">Data de Criação</th>
                            <th scope="col">Ver</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $query = "SELECT * FROM container"; 

                                $result = mysqli_query($link, $query);

                                if(mysqli_num_rows($result) > 0){

                                    while($row = mysqli_fetch_array($result)){
                                        
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        $date = $row['date'];

                                        echo "
                                                <tr>
                                                    <td>$id</th>
                                                    <td>$title</td>
                                                    <td>$date</td>
                                                    <td><a href='mostrar.php?showId=$id'><button type='button' class='btn btn-info'><i class='fas fa-eye'></i></button></a></td>
                                                    <td><a href='editar.php?updateId=$id'><button type='button' class='btn btn-success'><i class='fas fa-edit'></i></button></a></td>
                                                    <td><a href='listar.php?deleteId=$id'><button name='delete' type='button' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></a></td>
                                                </tr>
                                        ";
                                    }
                                }else{
        
                                    echo "
                                            <tr>
                                                <td colspan='6'>Nenhum Dado Encontrado</td>
                                            </tr>
                                    ";
                                }
                            
                            ?>
                        </tbody>              
                    </table>


                    
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php' ?>
