<?php 
include('../includes/control-core-gerenciador.php');


// // ========================================= | CRUD | ========================================= \\
$pasta     = "../../source/galeria/";
foreach($_FILES as $galeria => $chave_galeria){
    if($galeria == "galeria_master"){

        if($chave_galeria['size'][0] > 0){

            foreach($chave_galeria['tmp_name'] as $indice_imagem_galeria => $tmp_name){
                $extencao = explode('.',$chave_galeria['name'][$indice_imagem_galeria]);
                $foto = time().rand(0,1000).".".end($extencao);
                move_uploaded_file($tmp_name,$pasta.$foto);

                $sql_galeria['imagem']    = $foto;

                $action_insert = $banco->prepare("insert into galeria
                        (
                            imagem
                        )
                  values(
                            :imagem
                        )")->execute($sql_galeria);


            }
        }
    }
}

// \\ ========================================= | CRUD | ========================================= //


// // ========================================= | CRUD | ========================================= \\
if($_POST['posicao']){
    foreach($_POST['posicao'] as $id => $posicao){

        $sql_galeria_update['posicao'] = $posicao;
        $sql_galeria_update['nome']    = $_POST['titulo'][$id];
        $sql_galeria_update['id']      = $id;

        $action_galeria = $banco->prepare('update galeria set
            posicao = :posicao,
            nome    = :nome
                where 
                    id = :id')->execute($sql_galeria_update);
    }
}

// \\ ============================================================================================ //





// // =============== | ACTION == TRUE | =============== \\
if("1" == "1"){
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



