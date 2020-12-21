<?php
// Call PHP Script from javascript

$mydata='Variables declaration in PHP';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>     
    <?php require "./include/header.php"; ?>         
    <main>

        <div class="container-md">

            <hr class="my-6">

            <div class="row">
                <div class="col-md-6">
                    <form class="row row-cols-lg-auto g-3" action="index.php" method="post">
                        <div class="col-6" >
                            <input class="form-control"  type="text" name="newtodo" placeholder="here write what you have to do">
                        </div>
                        <div class="col-5">
                            <button class="btn btn-primary" type="submit">New task</button>
                        </div>
                    </form>
                </div>
            </div>

            <hr class="my-6">

            <div class="row">
                <div class="col-md-6" id="todoListDiv">
                   
                    <?php

                        include "actions.php";
                        $response = $db->query("SELECT * FROM todo WHERE histo = '0'");

                        
                        echo '<ul class="list-group">';
                        while ( $toDoList = $response->fetch() ) {
                            echo "<li class=\"list-group-item alert alert-success d-flex justify-content-between\" id=\"{$toDoList['id']}\">";
                                
                                    echo "<div>{$toDoList['task']}</div>";
                                    echo "<div class=\"d-flex\">";
                                        echo "<div><a href=\"index.php?setHisto=".$toDoList['id']."\" class=\"todoLink\">&#128447;</a></div>";
                                        echo "<div><a href=\"index.php?delete_task=".$toDoList['id']."\" class=\"todoLink\">&#x274C</a></div>";
                                    echo "</div>";
                                
                            echo "</li>";
                        }
                        echo "</ul>";
                        
                        if ( isset($erreur) ) {
                            echo "<p class=\"text-warning\">{$erreur}</p>";
                        }          
                    ?>  
                </div>

                <div class="col-md-6">
                    
                    <?php

                        $histo = $db->query("SELECT * FROM todo WHERE histo = '1'");

                        
                        echo '<ul class="list-group">';
                        while ( $toDoListHisto = $histo->fetch() ) {
                            echo "<li class=\"list-group-item alert alert-warning d-flex justify-content-between\">";
                                
                                    echo "<div>{$toDoListHisto['task']}</div>";
                                    echo "<div class=\"d-flex\">";
                                        echo "<div><a href=\"index.php?cancelHisto=".$toDoListHisto['id']."\" class=\"todoLink\">&#129092;
                                        </a></div>";
                                        echo "<div><a href=\"index.php?delete_task=".$toDoListHisto['id']."\" class=\"todoLink\">&#x274C</a></div>";
                                    echo "</div>";
                                
                            echo "</li>";
                        }
                        echo "</ul>";
                        
                        if ( isset($erreur) ) {
                            echo "<p class=\"text-warning\">{$erreur}</p>";
                        }          
                    ?>  
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                        <a href="index.php?deleteAll=true"><button class="btn btn-danger">Delete all to do</button></a>
                </div>
            </div>
        </div>   
    </main>
</body>
<script src="script.js"></script>
</html>
