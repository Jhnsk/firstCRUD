<?php
require 'config.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email){

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindvalue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0){

         $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
    $sql->bindvalue(':name', $name);
    $sql->bindvalue(':email', $email);
    $sql->execute();

    header('location: index.php');
    exit;

    }else {
        header("location: adicionar.php");
        exit;
    }

   

}else{
    header('location: adicionar.php');
    exit;
}