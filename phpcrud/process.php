<?php

session_start();
$mysqli = mysqli_connect('localhost','root','','crud');
$name='';
$id=0;
$update = false;
$location='';
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $mysqli->query("insert into data(name,location) values('$name','$location')") or die($mysqli->error);
    $_SESSION['message']="record has been added";
    $_SESSION['msg_type']="success";
    header("location: index.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("Delete from data where id=$id") or die($mysqli->error());

    $_SESSION['message']="record has been deleted";
    $_SESSION['msg_type']="danger";

    header("location: index.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("select * from data where id=$id");# or die($mysqli->error);

   # if(count($result) ==1 ){
        $update = true;
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
    #}
}


if(isset($_POST['update'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];

    $mysqli->query("update data set name='$name', location='$location' where id=$id") or die($mysqli->error);
    $_SESSION['message']="record has been updated";
    $_SESSION['msg_type']="warning";

    header("location: index.php");
  
}



?>