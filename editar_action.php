<?php
require 'config.php';
$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


if($id && $name && $email){

    $sql = $pdo->prepare("UPDATE usuarios SET nome = :name, email = :email WHERE id = :id");
    $sql->bindvalue(':name', $name);
    $sql->bindvalue(':email', $email);
    $sql->bindvalue(':id', $id);
    $sql->execute();

    header("location: index.php");
   

}else{
    header('location: editar.php');
    exit;
}

