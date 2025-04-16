<?php 
include('../includes/control-core-site.php');


// // ========================================= | CRUD | ========================================= \\
$email = anti_injection($_POST['email']);
$senha = md5($_POST['senha']);

$action = $banco->query('
	select * from cliente
		where
			email = "'.$email.'" and
			senha = "'.$senha.'"')->fetch();

// \\ ============================================================================================ //




// // =============== | ACTION == TRUE | =============== \\
if($action){
	$_SESSION['ID_CLIENTE'] = $action['id'];
    $titulo   = "Sucesso!";
    $location = HOST."movefit-app/";
    $icon     = "success";
}
// \\ ================================================== //
// // =============== | ACTION == FALSE | ============== \\
else{
	unset($_SESSION['ID_CLIENTE']);
    $titulo   = "Login e/ou Senha incorretos!";
    $voltar   = true;
    $icon     = "error";
}
// \\ ================================================== //




include('../adm-controle/includes/alerta-crud.php'); ?>



