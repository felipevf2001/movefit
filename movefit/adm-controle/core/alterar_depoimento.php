<?php 
include('../includes/control-core-gerenciador.php');


// // ========================================= | CRUD | ========================================= \\
$sql['nota']      = $_POST['nota'];
$sql['nota']      = $_POST['nota'];
$sql['titulo']    = $_POST['titulo'];
$sql['descricao'] = $_POST['descricao'];

$sql['id'] = $_POST['id_depoimento'];

$action = $banco->prepare('update depoimento set
            nota      = :nota,
            nota      = :nota,
            titulo    = :titulo,
            descricao = :descricao
                where 
                    id = :id')->execute($sql);



$id_sql = ($banco->lastInsertId());
if(!$id_sql || $id_sql < 1){
    $id_sql = $_POST['id_depoimento'];
}
// \\ ============================================================================================ //





// // =============== | ACTION == TRUE | =============== \\
if($action){
    $titulo   = "Sucesso!";
    $location = HOST_GERENCIADOR."alterar_depoimento/".$id_sql;
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



