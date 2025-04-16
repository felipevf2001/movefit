<?php 
include('../includes/control-core-gerenciador.php');


// // ========================================= | CRUD | ========================================= \\
// // ================= | ARQUIVO | ================ \\
$imagem = $_FILES['imagem'];
if($imagem['error'] == 0){
    $extencao = explode('.',$imagem['name']);
    $foto = time()."-".retirar_acento_espaco($imagem['name']).".".end($extencao);
    $pasta = "../source/usuario/imagem/";
    move_uploaded_file($imagem['tmp_name'],$pasta.$foto);     
}else{
    $foto = $_POST['imagem_antiga'] ? $_POST['imagem_antiga'] : "sem_imagem.jpg";
}       
$sql['imagem'] = $foto;
// \\ ============================================== //


$sql['login']      = $_POST['login'];
$sql['senha']      = sha1(md5($_POST['senha']));
$sql['nome']       = $_POST['nome'];
$sql['cargo']      = $_POST['cargo'];
$sql['email']      = $_POST['email'];
$sql['telefone']   = $_POST['telefone'];
$sql['permissao']  = $_POST['permissao'];
$sql['id_usuario'] = $_SESSION['ID_GERENCIADOR'];

$action = $banco->prepare('insert into usuario
        (
            imagem,
            login,
            senha,
            nome,
            cargo,
            email,
            telefone,
            permissao,
            id_usuario
        )
 values(
            :imagem,
            :login,
            :senha,
            :nome,
            :cargo,
            :email,
            :telefone,
            :permissao,
            :id_usuario
       )')->execute($sql);

$id_sql = ($banco->lastInsertId());
// \\ ============================================================================================ //




// // =============== | ACTION == TRUE | =============== \\
if($action){
    $titulo   = "Sucesso!";
    $location = HOST_GERENCIADOR."listar_usuario";
    $icon     = "success";
}
// \\ ================================================== //
// // =============== | ACTION == FALSE | ============== \\
else{
    $titulo   = "Erro! Tente novamente, caso persistir, contate a empresa responsável.";
    $location = HOST_GERENCIADOR."cadastrar_usuario";
    $icon     = "error";
}
// \\ ================================================== //




include('../includes/alerta-crud.php'); ?>



