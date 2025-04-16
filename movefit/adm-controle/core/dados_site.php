<?php 
include('../includes/control-core-gerenciador.php');


// // ========================================= | CRUD | ========================================= \\
// // ================= | ARQUIVO | ================ \\
$imagem = $_FILES['imagem'];
if($imagem['error'] == 0){
    $extencao = explode('.',$imagem['name']);
    $foto = time()."-".retirar_acento_espaco($imagem['name']).".".end($extencao);
    $pasta = "../../source/assets/logo/";
    move_uploaded_file($imagem['tmp_name'],$pasta.$foto);     
}else{
    $foto = $_POST['imagem_antiga'] ? $_POST['imagem_antiga'] : "sem_imagem.jpg";
}       
$sql['imagem_logo'] = $foto;
// \\ ============================================== //

// // ================= | ARQUIVO | ================ \\
$imagem = $_FILES['imagem_icone'];
if($imagem['error'] == 0){
    $extencao = explode('.',$imagem['name']);
    $foto = "icone-".time()."-".retirar_acento_espaco($imagem['name']).".".end($extencao);
    $pasta = "../../source/assets/icone/";
    move_uploaded_file($imagem['tmp_name'],$pasta.$foto);     
}else{
    $foto = $_POST['imagem_icone_antiga'] ? $_POST['imagem_icone_antiga'] : "sem_imagem.jpg";
}       
$sql['imagem_icone'] = $foto;
// \\ ============================================== //


// // ================= | ARQUIVO | ================ \\
$imagem = $_FILES['meta_og_imagem'];
if($imagem['error'] == 0){
    $extencao = explode('.',$imagem['name']);
    $foto = time()."-".retirar_acento_espaco($imagem['name']).".".end($extencao);
    $pasta = "../../source/assets/og-image/";
    move_uploaded_file($imagem['tmp_name'],$pasta.$foto);     
}else{
    $foto = $_POST['imagem_og_antiga'] ? $_POST['imagem_og_antiga'] : "sem_imagem.jpg";
}       
$sql['meta_og_imagem'] = $foto;
// \\ ============================================== //


// / ================ ARQUIVOS ==================== \
if($_FILES['sitemap']['error'] == 0){
    $extencao = explode('.',$_FILES['sitemap']['name']);
    $foto = "sitemap.".end($extencao);
    $pasta = "../../";
    move_uploaded_file($_FILES['sitemap']['tmp_name'],$pasta.$foto);        
} 
// \ ============================================== /

// / ================ ARQUIVOS ==================== \
if($_FILES['robots']['error'] == 0){
    $extencao = explode('.',$_FILES['robots']['name']);
    $foto = "robots.".end($extencao);
    $pasta = "../../";
    move_uploaded_file($_FILES['robots']['tmp_name'],$pasta.$foto);     
} 
// \ ============================================== /




$sql['nome']                    = $_POST['nome'];
$sql['email']                   = $_POST['email'];
$sql['facebook']                = $_POST['facebook'];
$sql['facebook_id']             = $_POST['facebook_id'];
$sql['instagram']               = $_POST['instagram'];
$sql['linkedin']                = $_POST['linkedin'];
$sql['twitter']                 = $_POST['twitter'];
$sql['youtube']                 = $_POST['youtube'];
$sql['tripadvisor']             = $_POST['tripadvisor'];
$sql['discord']                 = $_POST['discord'];
$sql['whatsapp']                = $_POST['whatsapp'];
$sql['telefone']                = $_POST['telefone'];
$sql['endereco']                = $_POST['endereco'];
$sql['recaptcha_ativo']         = $_POST['recaptcha_ativo'];
$sql['recaptcha_chave_site']    = $_POST['recaptcha_chave_site'];
$sql['recaptcha_chave_secreta'] = $_POST['recaptcha_chave_secreta'];
$sql['google_analytics']        = $_POST['google_analytics'];
$sql['google_tag_manager_head'] = $_POST['google_tag_manager_head'];
$sql['google_tag_manager_body'] = $_POST['google_tag_manager_body'];
$sql['meta_title']              = $_POST['meta_title'];
$sql['meta_description']        = $_POST['meta_description'];
$sql['meta_keywords']           = $_POST['meta_keywords'];
$sql['meta_og_title']           = $_POST['meta_og_title'];
$sql['meta_og_site_name']       = $_POST['meta_og_site_name'];
$sql['meta_og_description']     = $_POST['meta_og_description'];
$sql['enviar_email_email']      = $_POST['enviar_email_email'];
$sql['enviar_email_senha']      = $_POST['enviar_email_senha'];
$sql['enviar_email_smtp']       = $_POST['enviar_email_smtp'];
$sql['enviar_email_porta']      = $_POST['enviar_email_porta'] ? $_POST['enviar_email_porta'] : '587';
$sql['id']                      = "1";


$action = $banco->prepare('update dados_site set
            nome                    = :nome,
            email                   = :email,
            facebook                = :facebook,
            facebook_id             = :facebook_id,
            instagram               = :instagram,
            linkedin                = :linkedin,
            twitter                 = :twitter,
            youtube                 = :youtube,
            tripadvisor             = :tripadvisor,
            discord                 = :discord,
            whatsapp                = :whatsapp,
            telefone                = :telefone,
            endereco                = :endereco,
            recaptcha_ativo         = :recaptcha_ativo,
            recaptcha_chave_site    = :recaptcha_chave_site,
            recaptcha_chave_secreta = :recaptcha_chave_secreta,
            google_analytics        = :google_analytics,
            google_tag_manager_head = :google_tag_manager_head,
            google_tag_manager_body = :google_tag_manager_body,
            meta_title              = :meta_title,
            meta_description        = :meta_description,
            meta_keywords           = :meta_keywords,
            meta_og_title           = :meta_og_title,
            meta_og_site_name       = :meta_og_site_name,
            meta_og_description     = :meta_og_description,
            imagem_logo             = :imagem_logo,
            imagem_icone            = :imagem_icone,
            meta_og_imagem          = :meta_og_imagem,
            enviar_email_email      = :enviar_email_email,
            enviar_email_senha      = :enviar_email_senha,
            enviar_email_smtp       = :enviar_email_smtp,
            enviar_email_porta      = :enviar_email_porta
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



