<?php

//INIT

$erreur = "";
$db = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'root', 'root');

// NEW TO DO

if (isset($_POST['newtodo'])) {
    if (empty($_POST['newtodo'])) {
        $erreur = "Veuillez renseigner une valeur";
    } else {
        $dateCreation = date("Y-m-d H:i:s");
        var_dump($dateCreation);
        $task = $_POST['newtodo'];
        $db->exec("INSERT INTO todo(task, dateCreation, histo) VALUES ('$task', '$dateCreation', '0')");
    }
}

//----------

// SET IN ARCHIVE

if ( isset($_GET['setHisto'])) {
    $id = $_GET['setHisto'];
    var_dump($id);
    $db->exec("UPDATE `todo` SET histo = '1' WHERE id='$id'");

}


//---------------


// DELETE TO DO

if ( isset($_GET['delete_task']) ) {
    $id = $_GET['delete_task'];
    $db->exec("DELETE FROM todo WHERE id=$id");
}

// ----------------

// DELETE * TO DO

if ( isset($_GET['deleteAll']) ){

    deleteAll();
}

function deleteAll() {
    global $db;
    $db->exec("DELETE FROM todo");
}

// --------------