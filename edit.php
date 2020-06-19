<?php   
        include 'header.php';
        include './connection/connection.php';


        if(isset($_GET['updateId'])){
            
            $query = "SELECT * FROM container WHERE id=".$_GET['updateId'];

            $result = mysqli_query($link, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $title = $row['title'];
                    $content = $row['content'];
                }
            }

        }else{
            header("Location: listar.php");
        }


        if(isset($_POST['submit'])){

            if(isset($_POST['titulo']) && !empty($_POST['titulo'])){

                $title = $_POST['titulo']; 
                
            }else{

                $titleError = "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Erro! O documento deve conter um título.</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                ";

            }
            
            if(isset($_POST['content']) && !empty($_POST['content'])){

                $content = $_POST['content'];

            }else{

                $contentError = "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Erro! O documento está em branco.</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                ";

            }

            if(isset($_POST['titulo']) && !empty($_POST['titulo']) && isset($_POST['content']) && !empty($_POST['content'])){
                
                $query = "UPDATE container SET title='$title', content='$content' WHERE id=".$_GET['updateId'];

                if(mysqli_query($link, $query)){
                    header("Location: list.php");
                }else{
                    $mysqlError = "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>Erro ao Gravar no Banco de Dados</strong><br>".mysqli_error($link).
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button></div>
                    ";
                }

            }

        }

?>


    <div class="container">
        <?php if(isset($mysqlError)) echo $mysqlError; ?>
        <h3 class="text-center">Adicionar Anotação</h3>
        <br>
        <div class="row">
            <div class="col-md-12">

                <form action="" method="post">

                    <?php if(isset($titleError)) echo $titleError; ?>

                    <label for="Title"><strong>Title</strong></label>
                    <input class="form-control" name="titulo" type="text" value="<?php if(isset($title)) echo $title;?>">

                    <br>

                    <textarea name="content" id="tinyMCEArea" cols="30" rows="10">

                        <?php
                            if(isset($content)) echo $content;
                        ?>
                    
                    </textarea>

                    <?php if(isset($contentError)) echo $contentError;?>

                    <br>

                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
        <br>
 
               
  
    </div>


<?php include 'footer.php' ?>