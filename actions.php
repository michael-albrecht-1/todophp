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
        $task = $_POST['newtodo'];
        $db->exec("INSERT INTO todo(task, dateCreation, histo) VALUES ('$task', '$dateCreation', '0')");
    }
}

//----------

// UPDATE TO DO


if ( isset($_POST['value']) && isset($_POST['id'])) {
    
    $value = $_POST['value'];
    $id = $_POST['id'];
    var_dump("value : " . $value);
    $db->exec("UPDATE todo SET task = '$value' WHERE id = '$id' ");
}


//----------


// SET IN HISTO

if ( isset($_GET['setHisto'])) {
    $id = $_GET['setHisto'];
    $db->exec("UPDATE `todo` SET histo = '1' WHERE id='$id'");
}

//---------------

// CANCEL HISTO

if ( isset($_GET['cancelHisto'])) {
    $id = $_GET['cancelHisto'];
    $db->exec("UPDATE `todo` SET histo = '0' WHERE id='$id'");
}

//-------------


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