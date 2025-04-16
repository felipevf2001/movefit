<?php 
include('../includes/control-core-site.php');


// // ========================================= | CRUD | ========================================= \\


// // ================= | ARQUIVO | ================ \\
$imagem = $_FILES['imagem'];
if($imagem['error'] == 0){
    $extencao = explode('.',$imagem['name']);
    $foto = time()."-".retirar_acento_espaco($imagem['name']).".".end($extencao);
    $pasta = "../source/cliente/imagem/";
    move_uploaded_file($imagem['tmp_name'],$pasta.$foto);     
}else{
    $foto = $_POST['imagem_antiga'] ? $_POST['imagem_antiga'] : "sem_imagem.jpg";
}       
$sql['imagem'] = $foto;
// \\ ============================================== //

// // ============= | ANTI INJECTION | ============= \\
$nome            = anti_injection($_POST['nome']);
$email           = anti_injection($_POST['email']);
$senha           = anti_injection($_POST['senha']);
$confirmar_senha = anti_injection($_POST['confirmar_senha']);
// \\ ============================================== //


if($senha != $confirmar_senha){

	$titulo   = "Erro! As senhas não Coincidem";
    $voltar   = true;
    $icon     = "error";
	include('../adm-controle/includes/alerta-crud.php'); 
	die();
}


$sql['nome']  = trim($nome);
$sql['email'] = trim($email);
$sql['senha'] = md5(trim($senha));

$action = $banco->prepare('insert into cliente
		(
			nome,
			imagem,
			email,
			senha
		)
  values(
 			:nome,
 			:imagem,
			:email,
			:senha
	 	)')->execute($sql);

$id_sql = ($banco->lastInsertId());
$_SESSION['ID_CLIENTE'] = $id_sql;
// \\ ============================================================================================ //




// // =============== | ACTION == TRUE | =============== \\
if($action){
    $titulo   = "Sucesso!";
    $location = HOST."movefit-app/";
    $icon     = "success";
}
// \\ ================================================== //
// // =============== | ACTION == FALSE | ============== \\
else{
    $titulo   = "Erro! Tente novamente, caso persistir, contate a empresa responsável.";
    $voltar   = true;
    $icon     = "error";
}
// \\ ================================================== //




include('../adm-controle/includes/alerta-crud.php'); ?>



