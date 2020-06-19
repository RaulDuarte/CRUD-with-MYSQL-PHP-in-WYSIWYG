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
                                    <strong>Are you sure you want to delete the note?</strong>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                    
                                    <form action='' method='post'>
                                        <br>
                                        <div class='form-group'>
                                            <input type='hidden' name='confirmId' value='$anotId'>
                                            <button type='submit' class='btn btn-danger'>Delete</button> 
                                            <button type='button' class='btn btn-success' data-dismiss='alert'>Cancel</button>
                                        </div>
                                    </form>
                                </div>
                        ";
                    }

                    if(isset($_POST['confirmId'])){

                        $query = "DELETE FROM container WHERE id=".$_POST['confirmId'];

                        if(mysqli_query($link, $query)){
                            header("Location: list.php");
                        }else{
                            echo "
                                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                        <strong>Error trying to delete!</strong><br>".mysqli_error($link)."
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
                    <h3 class="text-center">Notes List</h3>
                    <br> 
                    <table class="table">   
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col">View</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
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
                                                    <td><a href='view.php?showId=$id'><button type='button' class='btn btn-info'><i class='fas fa-eye'></i></button></a></td>
                                                    <td><a href='edit.php?updateId=$id'><button type='button' class='btn btn-success'><i class='fas fa-edit'></i></button></a></td>
                                                    <td><a href='list.php?deleteId=$id'><button name='delete' type='button' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></a></td>
                                                </tr>
                                        ";
                                    }
                                }else{
        
                                    echo "
                                            <tr>
                                                <td colspan='6'>No Data Found</td>
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
