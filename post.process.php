<?php

include('includes/class-autoload.inc.php');

$posts = new Posts;

if(isset($_POST['submit'])){           //SUBMIT -- name w buttonie, gdy kliniesz submit to sie wykona reszta
    $title = $_POST['post-title'];
    $body = $_POST['post-content'];
    $author = $_POST['post-author'];

    $posts->addPost($title, $body, $author);
    header("location: {$_SERVER['HTTP_REFERER']}"); //przekieruje nas po zapisaniu


} else if(isset($_POST['update'])){          //UPDATE -- name w buttonie
    $id = $_GET['id'];
    $title = $_POST['post-title'];
    $body = $_POST['post-content'];
    $author = $_POST['post-author'];

    $posts->updatePost( $id, $title, $body, $author);
    //header("location: http://crudoop.localhost/"); //przekieruje nas po zapisaniu
    header("location: {$_SERVER['HTTP_ORIGIN']}");
    
}else if($_GET['send'] === 'del'){
    $id = $_GET['id'];
    
    $posts->delPost($id);
    header("location: http://crudoop.localhost/"); //przekieruje nas po zapisaniu
   // header("location: {$_SERVER['HTTP_ORIGIN']}");
  
}