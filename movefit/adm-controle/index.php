<?php
/* // ================================= | ADM-CONTROLE | ============================== \\ */
include("lib/config.php");
/* \\ ================================================================================= // */



 
/* // ============================ | CONFIGURA PARAMETROS | =========================== \\ */
if (isset($_SERVER['PATH_INFO'])) {
    $pagina     = explode('/', $_SERVER['PATH_INFO']);
    $site       = $pagina[1];
    $id         = anti_injection((int) $pagina[2]);
    $id_2       = anti_injection((int) $pagina[3]);
    $id_3       = anti_injection((int) $pagina[4]);
    $id_4       = anti_injection((int) $pagina[5]);
    $id_texto   = anti_injection((string) substr($_SERVER['PATH_INFO'], 1));
    $id_texto_1 = anti_injection((string) $pagina[2]);
    $id_texto_2 = anti_injection((string) $pagina[3]);
} else {
    $site = "home";
}

/* \\ ================================================================================= // */


/* // ========================= RESOLVE O ERRO 404 DO WOORANK ========================= \\ */
if(!(file_exists("pages/".$site.".php"))){header("HTTP/1.0 404 Not Found");}
/* \\ ================================================================================= // */


/* // ====================================== DADOS SITE =============================== \\ */
$dados_site = $banco->query('select * from dados_site where id = "1"')->fetch();
/* \\ ================================================================================= // */



/* // ====================================== USUARIO ================================== \\ */
$usuario = $banco->query('select * from usuario where id = "'.$_SESSION['ID_GERENCIADOR'].'"')->fetch();
if(!$usuario && $site != "login"){
    session_destroy();
    location(HOST_GERENCIADOR."login");
    die();
}

$usuario_logado = $usuario;
/* \\ ================================================================================= // */


$url_atual = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_total = $_SERVER['SCRIPT_URI'];



?>
<!-- \\ ===================================================================================================================================== // -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="UTF-8" />

    <!-- // ====================== | TITLE | ====================== \\ -->
    <title><?=ucwords(str_replace(array("_","-"), array(" "," "), $site))?></title>
    <!-- \\ ======================================================= // -->


    <!-- // ==================================== | METAS PADRÕES | ====================================== \\ -->
    <meta name="robots" content="ALL" />
    <meta name="GOOGLEBOT" content="index,nofollow" />
    <meta http-equiv="content-language" content="pt-br" />
    <!-- \\ ============================================================================================= // -->



    <?php 
    // // ========================================= | METAS | =========================================== \\
    $title               = ucfirst(mb_strtolower($site));
    $meta_url            = $url_atual;
    $meta_description    = $dados_site['meta_description'];
    $meta_keywords       = $dados_site['meta_keywords'];
    $meta_og_site_name   = $dados_site['meta_og_site_name'];
    $meta_og_image       = HOST."source/assets/og-image/".$dados_site['meta_og_imagem'];
    $meta_og_description = $dados_site['meta_og_description'];
    // \\ ========================================= | METAS | =========================================== // ?>

 
    <!-- // =================== | META | ============== \\ -->
    <meta name="url"         content="<?=$meta_url?>"         />
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
    <meta name ="twitter:card"       content = "summary"></meta>
    <meta name="twitter:title"       content="<?=$meta_og_title?>">
    <meta name="twitter:site"        content="<?=$meta_og_site_name?>">
    <meta name="twitter:card"        content="summary_large_image">
    <meta property="twitter:domain"  content="<?=HOST?>">
    <meta property="twitter:url"     content="<?=$meta_og_url?>">
    <meta name="twitter:image"       content="<?=$meta_og_image?>">
    <meta name="twitter:description" content="<?=$meta_og_description?>">
    <!-- \\ =========================================== // -->




    <script type="application/ld+json">
        <?php 
        $ls_schema = [];
        array_push($ls_schema, $dados_site['facebook']);
        array_push($ls_schema, $dados_site['instagram']);
        array_push($ls_schema, $dados_site['linkedin']);
        array_push($ls_schema, $dados_site['twitter']);
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

 


    <Meta xmlns:fb="https://www.facebook.com//rfautopeca">
    <meta property="fb:admins" content="100041857245391" />
    <meta name="fb:page_id" content="100041857245391" />

    <meta name="TITLE" content="<?=$dados_site['nome']?> " />
    <meta name="copyright" content="© Agência Estúdio Sul" />

    <link rel="icon" href="<?=HOST?>source/assets/icone/<?=$dados_site['imagem_icone'] && $dados_site['imagem_icone'] != "sem_imagem.jpg" ? $dados_site['imagem_icone'] : "estudio.png" ?>" />
    <link rel="stylesheet" type="text/css" href="<?=HOST_GERENCIADOR?>source/assets/css/bootstrap/datatables.min.css"/>

    <link rel="stylesheet" href="<?=HOST_GERENCIADOR?>source/assets/css/bootstrap/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ca3a52c1aa.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?=HOST_GERENCIADOR?>source/assets/css/flickity/flickity.min.css">
    <link rel="stylesheet" href="<?=HOST_GERENCIADOR?>source/assets/css/fancybox/jquery.fancybox.min.css" />
    
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/jquery/jquery.min.js"></script>
    <!-- // =========== | DRAGGABLE | =========== \\ -->
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/jquery-ui-1.13.1/jquery-ui.min.js"></script>
    <!-- \\ ===================================== // -->
    <!-- // ============ | MASCARAS | =========== \\ -->
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/jquery-mask/jquery.mask.min.js"></script>    
    <!-- \\ ===================================== // -->
    <!-- // ========= | TEXT AREA TOP | ========= \\ -->
    <script src="https://cdn.tiny.cloud/1/p1ra2cn221jfpp4rtzqf7g60tt8kj03h3l4ft4ofs7g8bdq3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- \\ ===================================== // -->
    <!-- // ======== | GRÁFICOS CANVAS | ======== \\ -->
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/amcharts5/jquery.canvasjs.min.js"></script>
    <!-- \\ ===================================== // -->

    <!-- // ============ | FONTES | ============ \\ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    <!-- \\ ==================================== // -->

    <!-- // =========================== | FERRAMENTAS PARA GRÁFICOS | =========================== \\ -->
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/amcharts5/index.js"></script>
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/amcharts5/xy.js"></script>
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/amcharts5/themes/Animated.js"></script>
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/amcharts5/percent.js"></script>    
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/amcharts5/locales/de_DE.js"></script>
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/amcharts5/geodata/germanyLow.js"></script>
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/amcharts5/fonts/notosans-sc.js"></script>
    <!-- \\ ===================================================================================== // -->

    <!-- // =========== | ESTILO CSS | ========= \\ -->
    <?php include('source/assets/css/estilo.php'); ?>
    <!-- \\ ==================================== // -->  

</head>
<body>
  
    
    <?php
    // // ========= | CASO PÁGINA NÃO EXISTA, REDIRECIONA PARA A PAG 404 | ========== \\
    if(!$_SESSION['ACESSO_GERENCIADOR']){
        // // ========= | INCLUDE PÁGINA | ========= \\
        include("pages/login.php");
        // \\ ====================================== //
    }else{
        if (file_exists("pages/".$site.".php")) {
            // // ========= | INCLUDE PÁGINA | ========= \\
            include("pages/".$site.".php");
            // \\ ====================================== //
        }else{          
           location(HOST_GERENCIADOR."404");
        }        
    }
    // \\ =========================================================================== // ?>


    <div id="verifica_posicao"></div>
    <div class="ajax-receptor"></div>


    <!-- // ================================= | SCRIPTS ================================= \\ -->

    <!-- // ============ | Google Analytics | ============ \\ -->
    <?php 
    if($_COOKIE['cookie_analytics'] != "0"){ ?>
        <?=$dados_site['google_analytics']?>
    <?php } ?>
    <!-- \\ ============================================== // -->

    <script type="text/javascript">
        document.cookie = 'screen_width='+screen.width+';path=/';
        document.cookie = 'screen_height='+screen.height+';path=/';
    </script>

    <?php 
    if(!$_COOKIE['screen_width'] || !$_COOKIE['screen_height']){
        location(HOST_GERENCIADOR);
    } ?>

    <script type="text/javascript">
        $('a[href^="#"]').on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr('href'),
                targetOffset = $(id).offset().top;

            $('html, body').animate({
                scrollTop: targetOffset - 200
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


    <script>
    // // ===================== | CONFIGS TABLE SEARCH | ===================== \\


    $(document).ready(function () {
        $('#table-search').DataTable({
            lengthMenu: [
                [50, 100, 200, -1],
                [50, 100, 200, 'Todos'],
            ],
        });
    });
    // \\ ==================================================================== //
    </script>

    <script type="text/javascript" src="<?=HOST_GERENCIADOR?>source/assets/js/bootstrap/datatables.min.js"></script>


    <!-- // = | FANCY BOX (GALERIA FLUTUANTE AO CLICAR | = \\ -->
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/fancybox/jquery.fancybox.min.js"></script>
    <!-- \\ ============================================== // -->

    <!-- // =========== | DEPENDECIAS BOOSTRAP | ========= \\ -->
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- \\ ============================================== // -->

    <!-- // ==== | FLICKITY - ROLAGEM DOS ELEMENTS | ===== \\ -->
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/flickity/flickity.pkgd.min.js"></script>
    <!-- \\ ============================================== // -->

    <!-- // ===== | SWEET ALERT - ALERTAS BONITOS | ====== \\ -->
    <script src="<?=HOST_GERENCIADOR?>source/assets/js/sweetalert2/sweetalert2@11.js"></script>
    <!-- \\ ============================================== // -->

    <!-- // ===== | TEXT ÁREA TINY (textarea) | ========== \\ -->
    <script>
        tinymce.init({
            selector: '.textarea',
            plugins: 
            [
                'advlist',
                'autolink',
                'lists',
                'link',
                'image',
                'charmap',
                'preview',
                'anchor', 
                'searchreplace', 
                'visualblocks', 
                'fullscreen',
                'insertdatetime', 
                'media', 
                'table', 
                'code', 
                'help', 
                'wordcount'
            ],
            toolbar: 'undo redo | blocks | bold italic backcolor | '+'alignleft aligncenter alignright alignjustify | '+'bullist numlist outdent indent | removeformat | help',
            toolbar_mode: 'floating',
        });
    </script>
    <!-- \\ ============================================== // -->

    <!-- // ============ | AO CLICAR CTRL Ç | ============ \\ -->
    <script>
        contador = 1;
        $(document).on('keydown', function(e) {
            var key = e.key;
            if(
                e.ctrlKey == true && key == 'ç'
            ){
                
                if(contador == 0){
                    $(".easter-egg-estudio").slideUp(300);
                    contador = 1;
                }else{
                    $(".easter-egg-estudio").slideDown(3000);
                    contador = 0;
                }
            }
        });
    </script>
    <!-- \\ ============================================== // -->

    <script>
        // // ============= | MOSTRA UM PREVIEW IMAGE | ============= \\
        /*
            Método de utilização
            - Adicione a classe "imagem" no input que fará a ação da upagem da imagem
            - Adicione neste input um data-receptor="classe do elemento que vai receber"
            - Pronto! Super fefe fez todo o trabalho 
            - By Felipe Vitor Ferreira 25/03/2022 9:14 (tenho aula de tcc hoje, q saco)
        */
        $(".imagem").change(function(){
            var input       = this;
            var input_J     = $(this);
            var ler_arquivo = new FileReader();
            var receptor    = $("."+input_J.data("receptor"));
            ler_arquivo.readAsDataURL(input.files[0]);
            ler_arquivo.onload = function (ler_arquivo_event){
                receptor.children("img").remove();
                receptor.prepend("<img src='"+ler_arquivo_event.target.result+"'>");
            };
        });
        // \\ ======================================================= //



        // // ============= | ADICIONAR E REMOVER IMAGENS | ========= \\    
        $(".remover-imagem").click(function(){
            $(this).parent("aside").parent(".imagem-padrao").children("img").attr("src", "<?=HOST_GERENCIADOR?>source/images/"+$(this).data("imagem-nova"));
            $(this).parent("aside").parent(".imagem-padrao").children("input").val("");
        });
        $(".adicionar-imagem").click(function(){
            $(this).parent("aside").parent(".imagem-padrao").children("input.imagem").click();
        });
        // \\ ======================================================= //






        // // ============= | VERIFICA LOGINS EXISTENTES | ========== \\    
        $("input[name='login']").on("keyup",function(){
            var input_login = $(this);
            $.ajax({
              type: "POST",
              url:"<?=HOST_GERENCIADOR?>core/verifica_login_existente.php",
              data: {
                'valor': input_login.val(),
                'tabela_para_verificar': input_login.data("tabela-para-verificar"),
              },
              success:function(result){
                input_login.parent(".form-group").children("span").html(result);       
              }
            });
        });
        // \\ ======================================================= //

        // // ==================== | SWEET ALERT | ================== \\    
        /*
            Passar parametros para ao clicar enviar a mensagem.
        */
        function sweet_alert(mensagem,botao){

            Swal.fire(
                mensagem,
                '',
                botao
            )

        }
        // \\ ======================================================= //


        // // ================== | EXCLUIR REGISTROS | ============== \\    
        $(".excluir").click(function(e){
            var ahref = $(this);
            Swal.fire({
                title: 'Você deseja excluir este registro? Não é possível recuperar este registro após a ação',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Excluir',
                denyButtonText: `Cancelar`,
                icon: 'info',
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
                if(result.isConfirmed) {
                    window.location.href = ahref.data('href');
                    ahref.fadeOut(500);
                }
            })

            e.preventDefault();
            e.stopPropagation();
        });
        // \\ ======================================================= //




        // // ================== | LIMITAR TABELAS | ================ \\    
        $(window).on("load",function(){

            $("table tr th:first-child").click();
            $("table.nao-ordenar tr th:first-child").click();

            setInterval(function(){
                $(".container-tabela:not(.stop)").css("width", $(".main-container").width()+"px");
            }, 20);
        });
        // \\ ======================================================= //


        // // ============ | MOTRA VÍDEO YOUTUBE | ================== \\    
        $(window).on("load",function(){
            $(document).on('change','.youtube',function(){

                var elemento = $(this);
                var url = elemento.val().split('v=');
                url = url[1].split('&list');
                url = url[0];
                elemento.parent("div").children("iframe").remove();
                elemento.parent("div").append(`
                    <iframe 
                        style="width:100%; height: 400px" 
                        src="https://www.youtube.com/embed/`+url+`" 
                        frameborder="0" 
                        class="youtube-embed"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                `);



            });
        });
        // \\ ======================================================= //

        // // ============ | ATUALIZAÇÃO POSIÇÃO | ================== \\    
        $(window).on("load",function(){
            $(document).on('change','.atualizar-posicao',function(){

                var id_posicao = $(this).data("id-posicao");
                var valor      = $(this).val();
                var tabela     = $(this).data("tabela");
                $.ajax({
                    type: "POST",
                    url:"<?=HOST_GERENCIADOR?>source/verifica/verifica_posicao.php",
                    data: {
                        'id': id_posicao,
                        'valor': valor,
                        'tabela': tabela
                    },
                    success:function(result){               

                        $("#verifica_posicao").html(result);     

                    }
                });

            });
        });
        // \\ ======================================================= //

        // // ============ | ATUALIZAÇÃO POSIÇÃO | ================== \\    
        $(window).on("load",function(){
            $(document).on('change','.atualizar-campo',function(){
                var id_campo   = $(this).data("id-campo");
                var campo      = $(this).data("campo");
                var valor      = $(this).val();
                var tabela     = $(this).data("tabela");
         
                $.ajax({
                    type: "POST",
                    url:"<?=HOST_GERENCIADOR?>source/verifica/verifica_campo.php",
                    data: {
                        'id': id_campo,
                        'valor': valor,
                        'tabela': tabela,
                        'campo': campo
                    },
                    success:function(result){               
                        
                        $("#verifica_posicao").html(result);     

                    }
                });

            });
        });
        // \\ ======================================================= //


        // // ==================== | DROP FEFE | ==================== \\    
        $(document).ready(function(){

            $(".drop-fefe").click(function(){
                var drop_button = $(this);

                if(drop_button.children("ul").is(":visible")){

                    drop_button.children("ul").fadeOut(250);

                }else{

                    drop_button.children("ul").fadeIn(250);

                }

                

            });

        });
        // \\ ======================================================= //

        

        // // ==================== | VALOR | ======================== \\    
        $(".valor").keypress(function(){
            $(this).mask('#.##0,00', {reverse: true});
        });
        // \\ ======================================================= //


        // // =========== | VERIFICA REGISTRO EXISTENTE | =========== \\    
        /*
            Para que esta função funcione, precisa-se passar pelo input os valores
            aos quais o banco de dados precisam procurar (Tabela e Campo) além do valor
            pelo qual o sistema comparará
        */
        $(window).on("load",function(){
            $(document).on('change','.verifica-registro-existente',function(){

                var apagar_campo = 0;
                var input        = $(this);
                var tabela       = $(this).data("tabela");
                var campo        = $(this).data("campo");
                var valor        = $(this).val();


                $.ajax({
                  type: "POST",
                  url:"<?=HOST_GERENCIADOR?>source/verifica/verifica_registro_existente.php",
                  data: {
                    'tabela': tabela,
                    'campo': campo,
                    'valor': valor,
                  },
                  success:function(result){
                    $(".ajax-receptor").html(result);       
                    if(resetar_campo == "1"){
                        $(input).val("");
                    }
                  }
                });

            });
        });
        // \\ ======================================================= //


        // // ===================== | CPF | ========================= \\    

        // // ============== | MASCARA CPF | ============== \\
        $(".cpf").keypress(function(){
            $(this).mask('000.000.000-00');
        });
        // \\ ============== | MASCARA CPF | ============== //


        // // ============== | VALIDADOR CPF | ============ \\        
        $(function(){
            //Executa a requisição quando o campo username perder o foco
            $(".cpf-validador").change(function(){
                var cpf = $(".cpf").val().replace(/[^0-9]/g, "").toString();

                if(cpf.length == 11){
                    var v = [];

                    //Calcula o primeiro dígito de verificação.
                    v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
                    v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
                    v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
                    v[0] = v[0] % 11;
                    v[0] = v[0] % 10;

                    //Calcula o segundo dígito de verificação.
                    v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
                    v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
                    v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
                    v[1] = v[1] % 11;
                    v[1] = v[1] % 10;

                    //Retorna Verdadeiro se os dígitos de verificação são os esperados.
                    if((v[0] != cpf[9]) || (v[1] != cpf[10])){
                        sweet_alert("CPF Incorreto, digite novamente","warning");

                        $(".cpf").val("");
                        $(".cpf").focus();
                    }
                }else{
                    sweet_alert("Números de Digito incorretos, digite novamente","warning");

                    $(".cpf").val("");
                    $(".cpf").focus();
                }
            });
        });
        // \\ ============== | VALIDADOR CPF | ============ //

        // \\ ======================================================= //
    </script>



    


    


</body>

</html>