<?php
/* // ================================= | ADM-CONTROLE | ============================== \\ */
include("adm-controle/lib/config.php");
/* \\ ================================================================================= // */



/* // ==== | REDIRECIONA PARA O SSL  | DESCOMENTE QUANDO SITE TIVER SSL INSTALADO ===== \\ */
$url_http = (isset($_SERVER['HTTPS']) ? (($_SERVER['HTTPS']=="on") ? "s" : "Não está sendo utilizado") : "off");
if($url_http == "off"){
    header("Location: ".HOST);
}
/* \\ ================================================================================= // */




 
/* // ============================ | CONFIGURA PARAMETROS | =========================== \\ */
if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != "/") {
    $pagina     = explode('/', $_SERVER['PATH_INFO']);
    $site       = $pagina[1];
    $id         = anti_injection((int) $pagina[2]);
    $id_2       = anti_injection((int) $pagina[3]);
    $id_3       = anti_injection((int) $pagina[4]);
    $id_4       = anti_injection((int) $pagina[5]);
    $id_texto_0 = anti_injection((string) $pagina[1]);
    $id_texto_1 = anti_injection((string) $pagina[1]);
    $id_texto_2 = anti_injection((string) $pagina[2]);
    $id_texto_3 = anti_injection((string) $pagina[3]);
}else{
    $site = "home";
}
/* \\ ================================================================================= // */



/* // =================================== | PÁGINA | ================================== \\ */
$pagina = $banco->query('select * from pagina where url_configuravel = "'.$site.'"')->fetch();
/* \\ ================================================================================= // */


/* // ============================= | CATEGORIA PRODUTO | ============================= \\ */
//$categoria_produto_exist = $banco->query('select * from categoria_produto where url = "'.$id_texto_2.'"')->fetch();
/* \\ ================================================================================= // */


/* // ================================ | DADOS SITE | ================================= \\ */
$dados_site      = $banco->query('select * from dados_site where id = "1"')->fetch();
/* \\ ================================================================================= // */


/* // ============================= | INFORMAÇÃO EXIST | ============================== \\ */
//$informacao_exist = $banco->query('select * from informacao where url = "'.$id_texto_2.'"')->fetch();
/* \\ ================================================================================= // */




/* // ============================== | CLIENTE LOGADO | =============================== \\ */
if($_SESSION['ID_CLIENTE']){
    $cliente_logado = $banco->query('
            select * from cliente
                where
                    id = "'.$_SESSION['ID_CLIENTE'].'"')->fetch();
}
/* \\ ================================================================================= // */




/* // ========================= RESOLVE O ERRO 404 DO WOORANK ========================= \\ */
if (
    !(file_exists("pages/".$site.".php")) &&
    !$pagina                              &&
    !$noticia_exist                       &&
    !$produto_exist                       &&
    !$informacao_exist                    &&
    !$categoria_produto_exist                       
){
    header("HTTP/1.0 404 Not Found");
}
/* \\ ================================================================================= // */




/* // ================================= CONTROL WWW =================================== \\ */
$url_atual = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($url_atual, 'www') !== false){
    // se tiver www faz nada se n madna li pro outro
}else{
    header('Location: '.HOST);
}
/* \\ ================================================================================= // */



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="UTF-8">

    <!-- // ====================== | TITLE | ====================== \\ -->
    <?php     
    // // ========= | PÁGINA TITLE | ========= \\
    if($pagina['meta_title']){ ?>
        <title><?=config_title_characters($pagina['meta_title'])?></title>
    <?php }
    // \\ ==================================== //
    // // ======= | RESTANTE DAS PÁG | ======= \\
    else{ ?>
        <title><?=config_title_characters($dados_site['meta_title'])?></title>
    <?php }
    // \\ ==================================== // ?>
    <!-- \\ ======================================================= // -->


    <!-- // ==================================== | METAS PADRÕES | ====================================== \\ -->
    <meta name="robots" content="ALL" />
    <meta name="GOOGLEBOT" content="index,follow" />
    <meta http-equiv="content-language" content="pt-br" />
    <!-- \\ ============================================================================================= // -->

    <?php 
    // // ========================= | CONFIGURAÇÕES DE PÁGINA MODEL FEFE | ============================== \\
    // // ========= | PÁGINAS PADRÕES E "PERSONALIZADAS | ========= \\
    if($pagina){
        // // ================== | META | ================== \\
        // // ========= | META TITLE | ========= \\
        if($pagina['meta_title']){
            $title = $pagina['meta_title'];
        }else{
            $title = ucfirst(mb_strtolower($site));
        }
        // \\ ================================== //
       
        // // ====== | META DESCRIPTION | ====== \\
        if($pagina['meta_description']){
            $meta_description = $pagina['meta_description'];
        }else{
            $meta_description = $dados_site['meta_description'];
        }
        // \\ ================================== //
        // // ====== | META KEYWORDS | ========= \\
        if($pagina['meta_keywords']){
            $meta_keywords = $pagina['meta_keywords'];
        }else{
            $meta_keywords = $dados_site['meta_keywords'];
        }
        // \\ ================================== //
        // \\ ============================================== //

        // // ================ | META OG | ================= \\
        // // ======= | META OG TITLE | ======== \\
        if($pagina['meta_og_title']){
            $meta_og_title = $pagina['meta_og_title'];
        }else{
            $meta_og_title = $dados_site['meta_og_title'];
        }
        // // ===== | META OG SITE NAME | ====== \\
        if($pagina['meta_og_site_name']){
            $meta_og_site_name = $pagina['meta_og_site_name'];
        }else{
            $meta_og_site_name = $dados_site['meta_og_site_name'];
        }
        // \\ ================================== //
        // // ====== | META OG TYPE | ========== \\
        $meta_og_type = "website";
        // \\ ================================== //
        // // ========= | META OG URL | ======== \\
        $meta_og_url = $_SERVER['SCRIPT_URI'];
        // \\ ================================== //
        // // ====== | META OG IMAGE | ========= \\
        if($pagina['meta_og_imagem'] && $pagina['meta_og_imagem'] != "sem_imagem.jpg"){
            $meta_og_image = HOST."source/assets/og-image/".$pagina['meta_og_imagem'];
        }else{
            $meta_og_image = HOST."source/assets/og-image/".$dados_site['meta_og_imagem'];
        }
        // \\ ================================== //
        // // ====== | META OG DESCRIPTION | === \\
        if($pagina['meta_og_description']){
            $meta_og_description = $pagina['meta_og_description'];
        }else{
            $meta_og_description = $dados_site['meta_og_description'];
        }
        // \\ ================================== //
        // \\ ============================================== //
    }
    // \\ ========= | PÁGINAS PADRÕES E "PERSONALIZADAS | ========= //
    // \\ ======================================= | SUBSITE CONFIG | ==================================== // ?>

 
    <!-- // =================== | META | ============== \\ -->
    <title><?=$title?></title>
    <meta name="url"         content="<?=url_atual()?>"         />
    <meta name="description" content="<?=$meta_description?>" />
    <meta name="keywords"    content="<?=$meta_keywords?>"    />
    <!-- \\ =========================================== // -->

    <!-- // ================ | META OG | ============== \\ -->
    <meta property="og:title"       content="<?=$meta_og_title?>"       />
    <meta property="og:site_name"   content="<?=$meta_og_site_name?>"   />
    <meta property="og:type"        content="<?=$meta_og_type?>"        />
    <meta property="og:url"         content="<?=$meta_og_url?>"         />
    <meta property="og:image"       content="<?=$meta_og_image?>"       />
    <meta property="og:description" content="<?=$meta_og_description?>" />
    <!-- \\ =========================================== // -->

    <!-- // ============= | META TWITTER | ============ \\ -->
    <meta name ="twitter:card"       content="summary"></meta>
    <meta name="twitter:title"       content="<?=$meta_og_title?>"      >
    <meta name="twitter:site"        content="<?=$meta_og_site_name?>"  >
    <meta name="twitter:card"        content="summary_large_image"      >
    <meta property="twitter:domain"  content="<?=HOST?>"                >
    <meta property="twitter:url"     content="<?=url_atual()?>"        >
    <meta name="twitter:image"       content="<?=$meta_og_image?>"      >
    <meta name="twitter:description" content="<?=$meta_og_description?>">
    <!-- \\ =========================================== // -->


 
 


    <script type="application/ld+json">
        <?php 
        $ls_schema = array();
        array_push($ls_schema, $dados_site['facebook']);
        array_push($ls_schema, $dados_site['instagram']);
        array_push($ls_schema, $dados_site['linkedin']);
        array_push($ls_schema, $dados_site['twitter']);        
        
        $schema_text = "";
        foreach($ls_schema as $schema){
            if($schema){
                $schema_text .= '"'.$schema.'",';
            }
        } 
        $schema_text =  substr($schema_text,0,-1);
        ?>
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "<?=$dados_site['nome']?>",
            "url": "<?=HOST?>",
            "address": "<?=$dados_site['email']?>",
            "sameAs": [
                <?=$schema_text?>
            ]
        }
    </script>

 

    <?php 
    if($dados_site['facebook']){ ?>
    <Meta xmlns:fb="<?=$dados_site['facebook']?>">
    <meta property="fb:admins" content="<?=$dados_site['facebook_id']?>" />
    <meta name="fb:page_id" content="<?=$dados_site['facebook_id']?>" />
    <?php } ?>

    <meta name="TITLE" content="<?=$dados_site['nome']?>" />
    <meta name="copyright" content="<?=$dados_site['nome']?>" />

    <link rel="icon" href="<?=HOST?>source/assets/icone/<?=$dados_site['imagem_icone'] && $dados_site['imagem_icone'] != "sem_imagem.jpg" ? $dados_site['imagem_icone'] : "icone.png" ?>" />
    <link rel="stylesheet" href="<?=HOST?>source/assets/css/bootstrap-5/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="<?=HOST?>source/assets/css/flickity/flickity.min.css">

    <link rel="stylesheet" href="<?=HOST?>source/assets/css/fancybox/fancybox.css">
    
    <script src="<?=HOST?>source/assets/js/jquery/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- // ============ | FONTES | ============ \\ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <!-- \\ ==================================== // -->


    <!-- // ========== | ESTILO CSS | ========== \\ -->
    <?php include('source/assets/css/estilo.php'); ?>
    <!-- \\ ==================================== // -->  

    <?php 
    // // ==== | GOOGLE TAG MANAGER - HEAD | === \\ 
    echo $dados_site['google_tag_manager_head'];
    // \\ ====================================== // ?>

</head>
<body>
    <?php 
    // // ==== | GOOGLE TAG MANAGER - BODY | === \\ 
    echo $dados_site['google_tag_manager_body'];
    // \\ ====================================== // ?>





    <?php 
    // // ========= | CASO PÁGINA NÃO EXISTA, REDIRECIONA PARA A PAG 404 | ========== \\
    if(
        is_file("pages/".$pagina['url']."")
        ||
        (
            is_file("pages/".$pagina['url']."") 
            &&
            $idioma_exist
        )
    ){
        // // ========= | INCLUDE PÁGINA | ========= \\
        include("pages/".$pagina['url']."");
        // \\ ====================================== //
    }else{
        // // =========== | PRODUTO | ============== \\
        if(is_file("pages/".$site.".php") ){
            include("pages/".$site.".php");
        }
        // \\ ====================================== //
        // // === | SE N EXISTE, VAI PRA 404 | ===== \\
        else{
            error_404();
        }
        // \\ ====================================== //
    }
    // \\ =========================================================================== // ?>

    <!-- // ================================= | SCRIPTS ================================= \\ -->


    <!-- // ============ | Google Analytics | ============ \\ -->
    <?php 
    if($_COOKIE['cookie_analytics'] != "0"){ ?>
        <?=$dados_site['google_analytics']?>
    <?php } ?>
    <!-- \\ ============================================== // -->

    

    <script type="text/javascript">
        $('a[href^="#"]').on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr('href'),
                targetOffset = $(id).offset().top;

            $('html, body').animate({
                scrollTop: targetOffset - 300
            }, 100);
        });
    </script>


    <!-- // ======= | TIRAR DRAGGABLE DAS IMG'S | ======== \\ -->
    <script>
        $(document).ready(function(){
            $("img").attr('draggable', false)
        });
    </script>
    <!-- \\ ============================================== // -->

    <!-- // = | FANCY BOX (GALERIA FLUTUANTE AO CLICAR | = \\ -->
    <script src="<?=HOST?>source/assets/js/fancybox/fancybox.umd.js"></script>
    <!-- \\ ============================================== // -->

    <!-- // =========== | DEPENDECIAS BOOSTRAP | ========= \\ -->
    <script src="<?=HOST?>source/assets/js/bootstrap-5/bootstrap.min.js"></script>
    <!-- \\ ============================================== // -->

    <!-- // ==== | FLICKITY - ROLAGEM DOS ELEMENTS | ===== \\ -->
    <script src="<?=HOST?>source/assets/js/flickity/flickity.pkgd.min.js"></script>
    <!-- \\ ============================================== // -->

    <!-- // ===== | SWEET ALERT - ALERTAS BONITOS | ====== \\ -->
    <script src="<?=HOST?>source/assets/js/sweetalert2/sweetalert2@10.js"></script>
    <!-- \\ ============================================== // -->


    <div class="receptor_geral"></div>

</body>

</html>