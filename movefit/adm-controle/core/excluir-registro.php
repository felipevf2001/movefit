<?php 
include('../includes/control-core-gerenciador.php');

$sql['id'] = $_GET['id_deletado'];
$tabela = trim(anti_injection($_GET['tabela']));
$action = $banco->prepare('delete from '.$tabela.' where id = :id')->execute($sql);


// // =============== | ACTION == TRUE | =============== \\
if($action){
    $titulo   = "Sucesso!";
    $voltar   = true;
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




include('../includes/alerta-crud.php'); ?>



