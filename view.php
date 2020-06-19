<?php
    include 'header.php';
    include './connection/connection.php';
?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php

                    if($_GET['showId']){

                        $query = "SELECT * FROM container WHERE id=".$_GET['showId'];

                        $result = mysqli_query($link, $query);

                        if(mysqli_num_rows($result) > 0){
                            
                            while($row = mysqli_fetch_array($result)){
                            echo "
                                        <div class='card'>
                                            <h5 class='card-header'>".$row['title']."</h5>
                                            <div class='card-body'>
                                            <p class='card-text'>".$row['content']."</p>
                                            <a href='list.php' class='btn btn-primary'>Back</a>
                                            </div>
                                        </div>
                            ";
                            }
                        }else{
                            echo "Erro.".mysql_error($link);
                        }

                    }else{
                        header("Location: listar.php");
                    }
                ?>
            </div>
        </div>
    </div>





<?php include 'footer.php'?>