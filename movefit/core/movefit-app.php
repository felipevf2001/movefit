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



// // ========================= | CONFIG | ========================= \\
if(!$_SESSION['ID_CLIENTE']){
	$titulo   = "Você Deslogou, limpe o cache e tente novamente!";
    $voltar   = true;
    $icon     = "error";
	include('../adm-controle/includes/alerta-crud.php'); 
	die();
}

$id_cliente = $_SESSION['ID_CLIENTE'];
// \\ ============================================================== //


// // ========================= | CONFIG | ========================= \\
if($senha){
	if($senha != $confirmar_senha){
		$titulo   = "Erro! As senhas não Coincidem";
	    $voltar   = true;
	    $icon     = "error";
		include('../adm-controle/includes/alerta-crud.php'); 
		die();
	}
	$sql['senha'] = md5(trim($senha));
}else{
	$sql['senha'] = $_POST['senha_antiga'];
}
// \\ ============================================================== //


$sql['nome']  = trim($nome);
$sql['id']    = $id_cliente;

$action = $banco->prepare('update cliente set
		nome   = :nome,
		imagem = :imagem,
		senha  = :senha
			where
				id =:id')->execute($sql);

// \\ ============================================================================================ //






// // ========================================= | CRUD | ========================================= \\
$delete = $banco->prepare('delete from depoimento where id_cliente = "'.$id_cliente.'"')->execute();
foreach($_POST['depoimento_nota'] as $key => $nota){

	$sql_depoimento['nota']       = $_POST['depoimento_nota'][$key];
	$sql_depoimento['titulo']     = $_POST['depoimento_titulo'][$key];
	$sql_depoimento['descricao']  = $_POST['depoimento_descricao'][$key];
	$sql_depoimento['id_cliente'] = $id_cliente;

	$action_depoimento = $banco->prepare('insert into depoimento
			(
				nota,
				titulo,
				descricao,
				id_cliente
			)
	  values(
	  			:nota,
	  			:titulo,
	  			:descricao,
	  			:id_cliente
			)')->execute($sql_depoimento);

}
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



