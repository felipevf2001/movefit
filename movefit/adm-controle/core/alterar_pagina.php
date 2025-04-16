<?php 
include('../includes/control-core-gerenciador.php');


// // ========================================= | CRUD | ========================================= \\

// // ================= | ARQUIVO | ================ \\
if($_FILES['meta_og_imagem']['error'] == 0){
    $extencao = explode('.',$_FILES['meta_og_imagem']['name']);
    $foto = time().rand(0,1000).".".end($extencao);
    $pasta = "../../source/assets/og-image/";
    move_uploaded_file($_FILES['meta_og_imagem']['tmp_name'],$pasta.$foto);     
}else{
    $foto = $_POST['meta_og_imagem_antiga'] ? $_POST['meta_og_imagem_antiga'] : "sem_imagem.jpg";
}       
$sql_pagina['meta_og_imagem'] = $foto; 
// \\ ============================================== //

$sql_pagina['nome_pagina']         = $_POST['nome_pagina'];
$sql_pagina['meta_title']          = $_POST['meta_title'];
$sql_pagina['meta_description']    = $_POST['meta_description'];
$sql_pagina['meta_keywords']       = $_POST['meta_keywords'];
$sql_pagina['meta_og_title']       = $_POST['meta_og_title'];
$sql_pagina['meta_og_site_name']   = $_POST['meta_og_site_name'];
$sql_pagina['meta_og_description'] = $_POST['meta_og_description'];
$sql_pagina['url_configuravel']    = $_POST['url_configuravel'];
$sql_pagina['id']                  = $_POST['id_pagina'];

$action = $banco->prepare("update pagina set
    nome_pagina         = :nome_pagina,
    meta_title          = :meta_title,
    meta_description    = :meta_description,
    meta_keywords       = :meta_keywords,
    meta_og_title       = :meta_og_title,
    meta_og_site_name   = :meta_og_site_name,
    meta_og_imagem      = :meta_og_imagem,
    meta_og_description = :meta_og_description,
    url_configuravel    = :url_configuravel
    where id = :id")->execute($sql_pagina);
// \ ================================================================================================================ /
        

// \\ ======================================== | VANTAGEM | ====================================== //




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



