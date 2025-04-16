<?php 
include('../includes/control-core-gerenciador.php');


// // ========================================= | CRUD | ========================================= \\
$sql['id_tema'] = $_POST['id_tema'];
$sql['id']      = "1";

$action = $banco->prepare('update dados_site set
                                                id_tema  = :id_tema
                                                where id = :id')->execute($sql);

$id_sql = ($banco->lastInsertId());
// \\ ============================================================================================ //




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



