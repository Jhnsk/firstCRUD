<?php
require 'config.php';
$info = [];
$id = filter_input(INPUT_GET, 'id');
if($id){
    $sql = $pdo->prepare("SELECT * FROM usuarios where id = :id");
    $sql->bindvalue(':id', $id);
    $sql->execute();

    if($sql->rowCount()>0){

      $info = $sql->fetch( PDO::FETCH_ASSOC );
    }
}

?>

<h1>Editar usuário</h1>

<form action="editar_action.php" method="POST">
    <input type="hidden" name="id" value="<?=$info['id'];?>">

    <label for="">
        Name:<br>
        <input type="text" name="name" value="<?= $info['nome'];?>">
</label><br><br>
<label for="">
    Email:<br>
    <input type="email" name="email" value="<?= $info['email'];?>">
</label><br><br>

<input type="submit" value="Salvar">
</form>