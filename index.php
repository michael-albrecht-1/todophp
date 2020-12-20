<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>              
    <div class="container-md">

        <h1 class="">Ma todo list en PHP</h1>

        <hr class="my-6">

        <div class="row">
            <div class="col-md-6">


                <form class="form-inline" action="index.php" method="post">
                    <div class="form-group" >
                        <input class="form-control"  type="text" name="newtodo">
                    </div>
                    <button class="btn btn-primary" type="submit">New task</button>
                </form>
                        
            
                <hr class="my-6">
                
                <?php

                    include "actions.php";
                    $response = $db->query("SELECT * FROM todo WHERE histo = '0'");

                    
                    echo '<ul class="list-group">';
                    while ( $toDoList = $response->fetch() ) {
                        echo "<li class=\"list-group-item alert alert-success d-flex justify-content-between\">";
                            
                                echo "<div>{$toDoList['task']}</div>";
                                echo "<div class=\"d-flex\">";
                                    echo "<div><a href=\"index.php?setHisto=".$toDoList['id']."\" class=\"todoLink\">&#128448;</a></div>";
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
                <a href="index.php?deleteAll=true"><button class="btn btn-danger">Delete all to do</button></a>
            </div>

        </div>

        
        
       
    </div>   
</body>
</html>