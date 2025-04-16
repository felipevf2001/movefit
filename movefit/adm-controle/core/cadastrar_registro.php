<?php 
include('../includes/control-core-gerenciador.php');


// // ========================================= | CRUD | ========================================= \\
$tabela = anti_injection($_POST['tabela']);


$sql['nome'] = aspas($_POST['nome']);
$sql['url']  = retirar_acento_espaco(anti_injection(retirar_acento_espaco($_POST['nome'])));

$action = $banco->prepare('insert into '.$tabela.'
        (
            nome,
            url
        )
 values(
            :nome,
            :url
       )')->execute($sql);

$id_sql = ($banco->lastInsertId());
// \\ ============================================================================================ //



// // =============== | ACTION == TRUE | =============== \\
if($action){
    $titulo   = "Sucesso!";
    $location = HOST_GERENCIADOR."alterar_".$tabela."/".$id_sql;
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



