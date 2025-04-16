<?php
error_reporting(1);
ini_set('display_errors', 1);
session_start();



// // ===================== | CONEXÃO COM BD | ====================== \\
$host  = "host";
$banco = "banco";//banco e user mesmo
$user  = "user";
$senha = "senha!";

try{
  $banco = new PDO("mysql:host=$host; dbname=$banco;", $user, $senha);
  $banco->exec("set names utf8");
}
catch (Exception $e){ ?>
  <h1>Estamos passando por uma instabilidade temporaria</h1>
  <h5>Aguarde alguns instantes ate estabilizar</h5>
  <meta http-equiv="refresh" content="5">
<?php die(); }
// \\ =============================================================== // 

// // ============== | HOSTS PARA REDIRECIONAMENTOS | =============== \\
define('HOST','https://www.felipevitorferreira.com.br/repositorio/movefit/');
define('RAIZ',$_SERVER['DOCUMENT_ROOT']."/");
define('HOST_GERENCIADOR',HOST."adm-controle/");
define('IP_FEFE',"177.10.90.242");
// \\ =============================================================== //
  
// // ========== | CONFIGURAÇÕES PADRÕES PARA GERENCIADOR | ========= \\
$dados_site = $banco->query('select * from dados_site where id = "1"')->fetch();
// \\ =============================================================== //




// // ======================================= | FUNÇÕES E MÉTODOS PHP | ======================================= \\
function retirar_acento($texto){
  $array1 = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç", "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç", " - "," ", "/","#","?","&","%", "-", " ");
  $array2 = array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c", "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C", "-","-","","","","","-","-", "");
  return strtolower(str_replace( $array1, $array2, $texto ));
}


// // ================ | MY SQL REGCASE | ================ \\
// | Indiferencia uma string para maisculo e minusculo
function my_sql_regcase($str){
  $res = "";
  $chars = str_split($str);
  foreach($chars as $char){
    if(preg_match("/[A-Za-z]/", $char)){
        $res .= "[".mb_strtoupper($char, 'UTF-8').mb_strtolower($char, 'UTF-8')."]";
    }else{
        $res .= $char;
    }
  }
  return $res;
}
// \\ ==================================================== //

// // ================ | ANTI INJECTION | ================ \\
// | Evita ataques sql por strings
function anti_injection($sql){
  $sql = preg_replace(my_sql_regcase("/(from|select|<script | < scr|insert|delete|where|drop table|drop|update|show tables|#|\*|--|\\\\)/"), "" ,$sql);
  $sql = trim($sql);
  $sql = strip_tags($sql);
  $sql = addslashes($sql);
  return $sql;
}
// \\ ==================================================== //


function retirar_acento_espaco($texto){
  $array1 = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç", "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç", " - "," ", "/","#","?","&","%", "-",",",".","[","]","º","|","+","\\",'"',"º","ª","°","{","}","|");
  $array2 = array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c", "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C", "-","-","","","","","-","-","","-","","","","-","-","-","","-","-a-","o-","","","");
  $texto = strtolower(str_replace( $array1, $array2, trim($texto) ));
  $texto = str_replace(' ','-',$texto);
  return $texto;
}



// // ===================================== | VALOR FORMAT | ================================== \\
function valor($valor){    
    return str_replace(array(".",","), array("","."), $valor);
}
// \\ ========================================================================================= //

// // ========================= | CALCULA A PORCENTAGEM ENTRE DOIS NUMEROS | ================== \\
function porcentagem_entre_dois_numeros($parcial, $total) {
    return ($parcial * 100) / $total;
}
// \\ ========================================================================================= //




// // =================================== | CONTROL EFFECT | ================================== \\
function control_effect($quantidade = null, $indice = 0){
  $indice++;

  if(
    $quantidade >= "5" 
    && 
    (
      $indice == "4"
      ||
      $indice == "9"
    )
  ){
    $control_effect = "col-lg-8";
  }else{
    $control_effect = "col-lg-4";
  }

  return $control_effect;
}
// \\ ========================================================================================= //





// // ================================ | TRADUÇÃO DOS TEXTOS | ================================ \\
/*
  Criado em 13/09/2023 15:18 por Felipe Vitor Ferreira, inclusive hoje é dia do programador, parabéns fefe!
  Como funciona: com base nos cadastros do gerenciador de tradução e nos idiomas cadastrados permitindo cadastrar
  o tradução texto, fazemos a busca com essa função e mostramos diretamente no local onde for mostrado desta forma
  <?=mostrar_traducao(ID DA TRADUÇÃO CADASTRADA PRA ESSE LOCAL ESPECIFICO, $idioma_exist['id'])?>
  De nada!
*/
function traducao($id_traducao, $id_idioma = null){
  global $banco;

  if(!$id_idioma){
    $id_idioma = IDIOMA_EXIST_ID;
  }


  // // ====================== | TRADUÇÃO | ====================== \\
  $traducao = $banco->query('
    select * from traducao 
      where 
        id = "'.$id_traducao.'"')->fetch();
  // \\ ========================================================== //

  // // =================== | TRADUÇÃO TEXTO | =================== \\
  $traducao_texto = $banco->query('
    select * from traducao_texto 
      where 
        id_traducao = "'.$traducao['id'].'" and 
        id_idioma   = "'.$id_idioma.'"')->fetch();
  // \\ ========================================================== //

  $texto = $traducao_texto['texto'];

  return $texto;


}
// \\ ========================================================================================= //


// // ============================= | CONFIGURA URL'S NOS IDIOMAS | =========================== \\
function configura_url($pagina = "home", $id_idioma = null){
  global $banco;
  if(!$id_idioma){
    $id_idioma = IDIOMA_EXIST_ID;
  }

  $idioma = $banco->query('select * from idioma where id = "'.$id_idioma.'"')->fetch();
  if($idioma['idioma_principal'] == "1"){
    $idioma['url'] = "";
  }else{
    $idioma['url'] .= "/";
  }

  $url_correta = $banco->query('select * from pagina where id_idioma = "'.$id_idioma.'" and url_sem_extencao = "'.$pagina.'"')->fetch();

  $url_pagina = $url_correta['url_configuravel'] == "home" ? "" : $url_correta['url_configuravel'];

  if(!$url_pagina){
    $url_pagina = $pagina;
  }

  return HOST.$idioma['url'].$url_pagina;

}
// \\ ========================================================================================= //



// // ================================ | CONFIG PADRÃO NOME | ================================= \\
function config_padrao_nome($nome){

  return str_replace(array("[","]","{","}"),array("","","",""),$nome);

}
// \\ ========================================================================================= //


// // ===================================== | WHATSAPP | ====================================== \\
function whatsapp($numero = NULL, $mensagem = NULL){

  $numero = str_replace(array(".","-"), array("",""), $numero);
  $mensagem = $mensagem ? $mensagem : "Olá estou acessando seu site e gostaria de solicitar algumas informações." ;

  $url = "https://api.whatsapp.com/send?phone=".$numero."&text=".$mensagem."&source=&data=";
  return $url;
}
// \\ ========================================================================================= //

// // =================================== | CONTROL ASPAS | =================================== \\
function aspas($texto){

    return str_replace('"', "&quot;", $texto);

}
// \\ ========================================================================================= //


// // =============================== | FORM OUVIDORIA SELECT | =============================== \\
function form_ouvidoria_select($filtro = null, $id_selected = null){
  global $banco;
  $ls_form_ouvidoria_opcao = $banco->query('
    select * from form_ouvidoria_opcao
      where
        filtro = "'.$filtro.'"
          order by posicao asc, id asc')->fetchAll();
  foreach($ls_form_ouvidoria_opcao as $form_ouvidoria_opcao){ ?>
    <option value="<?=$form_ouvidoria_opcao['id']?>" <?php if($form_ouvidoria_opcao['id'] == $id_selected){ echo"selected"; } ?>>
        <?=$form_ouvidoria_opcao['nome']?>
      </option>
  <?php }

}
// \\ ========================================================================================= // 



// // ===================================== | DIRETORIO | ===================================== \\
/*
  Passe o caminho da pasta para a função ler
  ela retornará um array com o nome de todos os arquivos que existem dentro da pasta
  Criado: 11/10/2022 16:51 por Felipe Vitor Ferreira, um ser muito fofo e que aguarda o feriado de amanhã
*/
function diretorio($pasta){

    $ls_arquivo = array();
    
    $pasta = $pasta;
    if(is_dir($pasta)){
        $diretorio = dir($pasta);
        $contador_pasta = 0;
        while(($arquivo = $diretorio->read()) !== false){ $contador_pasta++; 
            if($arquivo != "." && $arquivo != ".."){

                array_push($ls_arquivo, $arquivo);
                
            } 
        }
        $diretorio->close();
    }

    return $ls_arquivo;
}
// \\ ========================================================================================= //





// // ======================================= | ALERT | ======================================= \\
function alert($mensagem = null){
  ?>
  <script>
    alert('<?=$mensagem?>');
  </script>
  <?php
}
// \\ ========================================================================================= //





// // =============================== | PARA O CALENDÁRO | ================================== \\
// // ======== | DIAS DA SEMANA | ==== \\
$dia_semana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
// \\ ================================ //

// // =========== | MESES | ========== \\
$ls_mes = array(
                  array(
                      "id" => "1",
                      "mes" => "Janeiro",
                  ),
                  array(
                      "id" => "2",
                      "mes" => "Fevereiro",
                  ),
                  array(
                      "id" => "3",
                      "mes" => "Março",
                  ),
                  array(
                      "id" => "4",
                      "mes" => "Abril",
                  ),
                  array(
                      "id" => "5",
                      "mes" => "Maio",
                  ),
                  array(
                      "id" => "6",
                      "mes" => "Junho",
                  ),
                  array(
                      "id" => "7",
                      "mes" => "Julho",
                  ),
                  array(
                      "id" => "8",
                      "mes" => "Agosto",
                  ),
                  array(
                      "id" => "9",
                      "mes" => "Setembro",
                  ),
                  array(
                      "id" => "10",
                      "mes" => "Outubro",
                  ),
                  array(
                      "id" => "11",
                      "mes" => "Novembro",
                  ),
                  array(
                      "id" => "12",
                      "mes" => "Dezembro",
                  ),
                );
// \\ ================================ //

// // ========== | LS DIA | ========== \\
$ls_dia = array(
                array(
                    "id"   => "2",
                    "nome" => "Segunda",
                ),
                array(
                    "id"   => "3",
                    "nome" => "Terça",
                ),
                array(
                    "id"   => "4",
                    "nome" => "Quarta",
                ),
                array(
                    "id"   => "5",
                    "nome" => "Quinta",
                ),
                array(
                    "id"   => "6",
                    "nome" => "Sexta",
                ),
                array(
                    "id"   => "7",
                    "nome" => "Sábado",
                ),
                array(
                    "id"   => "1",
                    "nome" => "Domingo",
                ),

            );
// \\ ================================ //

// // ======= | CONTROLL DIA | ======= \\
function controll_dia($dia_semana){
    if($dia_semana == "Segunda"){
        $limite = 1;
    }elseif($dia_semana == "Terça"){
        $limite = 2;
    }elseif($dia_semana == "Quarta"){
        $limite = 3;
    }elseif($dia_semana == "Quinta"){
        $limite = 4;
    }elseif($dia_semana == "Sexta"){
        $limite = 5;
    }elseif($dia_semana == "Sabado"){
        $limite = 6;
    }elseif($dia_semana == "Domingo"){
        $limite = 0;
    }

    $return = "";
    for ($i=1; $i <= $limite; $i++) { 
        $return .= '<section class="dia dia-fake"><main></main></section>';
    }

    return $return;
}
// \\ ================================ //

// \\ ========================================================================================= //



// // =================================== | URL YOUTUBE | ===================================== \\
/*
  Apenas Converte uma url de youtube para o embed
*/
function url_youtube($url){
  $url_array = explode('v=',$url);
  $url_correta = $url_array[1];
  if(!$url_array[1]){
    $url_correta = $url;
  }

  return "https://www.youtube.com/embed/".$url_correta;
}

/*
  Ao passar a uyrl além de converter a url já coloca o embed do yotubeu
*/
function embed_youtube($url = NULL){
  if(!$url){ return; } ?>

  <iframe 
    style="width:100%; height: 400px" 
    src="<?=url_youtube($url)?>" 
    frameborder="0" 
    class="youtube-embed"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen>
  </iframe>

<?php return ;}
// \\ ========================================================================================= //




// // ===================================== | URL ATUAL | ===================================== \\
function url_atual(){
    $http     = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host     = $_SERVER['HTTP_HOST'];
    $url      = $_SERVER['REQUEST_URI'];
    $full_url = $http.'://'.$host.$url;

    return $full_url;
}
// \\ ========================================================================================= //





// // =================================== | REDES SOCIAIS | =================================== \\
function redes_sociais(){
  global $dados_site;
  // // ================ | FACEBOOK | ================ \\
  if($dados_site['facebook']){ ?>
  <a target="_blank" href="<?=$dados_site['facebook']?>">
    <i class="fab fa-facebook-f"></i>
  </a>
  <?php }
  // \\ ============================================== // 
  // // =============== | INSTAGRAM | ================ \\
  if($dados_site['instagram']){ ?>
  <a target="_blank" href="<?=$dados_site['instagram']?>">
    <i class="fab fa-instagram"></i>
  </a>
  <?php }
  // \\ ============================================== // 
  // // ================ | LINKEDIN | ================ \\
  if($dados_site['linkedin']){ ?>
  <a target="_blank" href="<?=$dados_site['linkedin']?>">
    <i class="fab fa-linkedin-in"></i>
  </a>
  <?php }
  // \\ ============================================= // 
  // // ================ | TWITTER | ================= \\
  if($dados_site['twitter']){ ?>
  <a target="_blank" href="<?=$dados_site['twitter']?>">
    <i class="fab fa-twitter"></i>
  </a>
  <?php }
  // \\ ============================================= // ?>
  <?php 
  // // ================ | YOUTUBE | ================= \\
  if($dados_site['youtube']){ ?>
  <a target="_blank" href="<?=$dados_site['youtube']?>">
    <i class="fab fa-youtube"></i>
  </a>
  <?php }
  // \\ ============================================= // 
  // // ============== | TRIPADVISOR | ============== \\
  if($dados_site['tripadvisor']){ ?>
  <a target="_blank" href="<?=$dados_site['tripadvisor']?>">
    <i class="fab fa-tripadvisor"></i>
  </a>
  <?php }
  // \\ ============================================= //
  // // ============== | TRIPADVISOR | ============== \\
  if($dados_site['email']){ ?>
  <a target="_blank" href="mailto:<?=$dados_site['email']?>">
    <i class="fas fa-envelope"></i>
  </a>
  <?php }
  // \\ ============================================= //
  // // ================ | DISCORD | ================ \\
  if($dados_site['discord']){ ?>
  <a target="_blank" href="<?=$dados_site['discord']?>">
    <i class="fab fa-discord"></i>
  </a>
  <?php }
  // \\ ============================================= //
  // // ================ | DISCORD | ================ \\
  if($dados_site['whatsapp']){ ?>
  <a target="_blank" href="<?=whatsapp($dados_site['whatsapp'])?>">
    <i class="fab fa-whatsapp"></i>
  </a>
  <?php }
  // \\ ============================================= //  

  return ;
}
// \\ ========================================================================================= //



// // ====================================== | RECAPTCHA | ==================================== \\
function recaptcha($chave_site){

  global $dados_site;

  //RECAPTCHA -------  Aqui em baixo vai a chave secreta
  $secret  = $dados_site['recaptcha_chave_secreta'];
  $ip      = $_SERVER['REMOTE_ADDR'];
  $captcha = $chave_site;

  $curl = curl_init();
  curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
          CURLOPT_POST => 1,
          CURLOPT_POSTFIELDS => array(
                    'secret'   => $secret,
                    'response' => $captcha,
                    'remoteip' => $ip
                  )
        ));
  $response = curl_exec($curl);
  curl_close($curl);

  if(strpos($response, '"success": true') === FALSE){ ?>
    <script>
      $(window).on("load",function(){
        
        Swal.fire(
          'Erro!',
          'Verifique o recaptcha e tente novamente!',
          'error'
        )
        setTimeout(function(){
          window.location.replace(document.referrer);
        }, 2500);

      });
    </script>
  <?php die(); }
  

}
// \\ ========================================================================================= //









// // ====== | DESTACAR PRIMEIRA E ÚLTIMA PALAVRA | ====== \\
function destacar_ultima_palavra_do_array($texto){
  $texto_quebrado = explode(" ",$texto);
  $texto_mostrar  = "";
  if(count($texto_quebrado) == 1){
    $texto_mostrar = "<b>".$texto_quebrado[0]."</b>";
  }else{
    foreach($texto_quebrado as $key_texto => $texto){
      if($key_texto == (count($texto_quebrado)-1)){
        $texto_mostrar .= "<b>".$texto."</b> ";
      }else{
        $texto_mostrar .= $texto." ";
      }
    }
  }

  return $texto_mostrar;
}   




function destacar_primeira_palavra($texto){
  $texto_quebrado = explode(" ",$texto);
  $texto_mostrar  = "";
  if(count($texto_quebrado) == 1){
    $texto_mostrar = $texto_quebrado[0];
  }else{
    foreach($texto_quebrado as $key_texto => $texto){
      if($key_texto == 0){
        $texto_mostrar .= "<b>".$texto."</b> ";
      }else{
        $texto_mostrar .= $texto." ";
      }
    }
  }

  return $texto_mostrar;
}   
// \\ ==================================================== //



// // =========== | RETORNA O TIPO DO ARQUIVO | ========== \\
function verifica_tipo_arquivo($nome_arquivo){
    $ls_nome_arquivo = explode('.',$nome_arquivo);
    $tipo_arquivo = end($ls_nome_arquivo);

    return $tipo_arquivo;
}
// \\ ==================================================== //

// // ====== | RETIRAR EXTENSÃO E RETORNAR RESTO | ======= \\
function retirar_extensao($arquivo){
  $texto_completo = "";
  $ls_texto = explode('.',$arquivo);
  foreach(array_slice($ls_texto, 0, (count($ls_texto)-1)) as $texto){
    $texto_completo .= $texto;
  }

  return $texto_completo;
}
// \\ ==================================================== //






// // ===================== | CONFIGURADOR DE TITLES | ===================== \\
/* Se a string for menor que 20 caracteres 
  (quantidade minima para os titles, aplicará uma string invisível para aumentar a quantidade) */
function config_title_characters($string){
    $string = $string;
    if(strlen($string) <= 23){
      $string = $string."⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀";
    }
    return $string;
}
// \\ ====================================================================== //







// // ===================== | GERADOR DE SENHAS | ========================== \\
/*
  NO PRIMEIRO PARAMETRO PASSA-SE EM INTEGER A QUANTIDADE QUE SE DESEJA, 
  NOS DEMAIS COLOQUE TRUE OR FALSE PARA CASO QUEIRA OU NÃO AQUELA CONFIG

*/
function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
  $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
  $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
  $nu = "0123456789"; // $nu contem os números
  $si = "!@#$%¨&*()_+="; // $si contem os símbolos

  if ($maiusculas){
        // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($ma);
  }

    if ($minusculas){
        // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($mi);
    }

    if ($numeros){
        // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($nu);
    }

    if ($simbolos){
        // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($si);
    }

    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
    return substr(str_shuffle($senha),0,$tamanho);
}
// \\ ====================================================================== //


function first_name($string){
  $string = explode(" ",$string);
  return $string[0];
}


function get_ip(){
    $ipaddress = null;
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = null;
    return $ipaddress;
}
 
 


function error_404(){
  header("HTTP/1.0 404 Not Found");  
  ?>
  <script language="JavaScript">
    location.href = "<?=HOST?>404";
  </script>
  <?php 
  return $error_404;
}



// // ================ | MOSTRAR TEXTO FLUTUANTE | ==================== \\
function pre_text($string){ ?>

  <style>
    .pre-text{
      position: fixed;
      left: 0;
      top: 0;
      background: rgb(0, 0, 0, 80%);
      font-weight: bold;
      color: white;
      font-size: 0.90rem;
      z-index: 999999999;
      margin: 0;
      padding: 1rem;
      border-radius: 0px 12px 12px 0px;
    }
  </style>
  <pre class="pre-text">
    <?=$string?>
  </pre>

<?php }
// \\ ================================================================= //



// // ================= | MOSTRA O TITLE DENTRO DOS CORE DO CRM | ===== \\
function control_title_core(){
  $string = $_SERVER['REQUEST_URI'];
  $string = str_replace(array(".php","-"), array(""," "), $string); 
  $string = explode('/', $string);
  $string = end($string);
  $string = ucwords($string);
  $title = "<title>".$string."</title>";
  return $title;
}
 // \\ ================================================================= //

 
// // ================= | FORMATA A DATA PARA MOSTRAR MÊS | =========== \\
// ** Passar data em formato sql americano
function data_format($string){
  // // ======= | MÊS | ======= \\
  $mes = date("m", strtotime($string));
  if($mes == 1){
    $mes = "janeiro";
  }elseif($mes == 2){
    $mes = "fevereiro";
  }elseif($mes == 3){
    $mes = "março";
  }elseif($mes == 4){
    $mes = "abril";
  }elseif($mes == 5){
    $mes = "maio";
  }elseif($mes == 6){
    $mes = "junho";
  }elseif($mes == 7){
    $mes = "julho";
  }elseif($mes == 8){
    $mes = "agosto";
  }elseif($mes == 9){
    $mes = "setembro";
  }elseif($mes == 10){
    $mes = "outubro";
  }elseif($mes == 11){
    $mes = "novembro";
  }elseif($mes == 12){
    $mes = "dezembro";
  }
  // \\ ======================= //
  // // ======= | DIA | ======= \\
  $dia = date("d", strtotime($string));
  // \\ ======================= //
  // // ======= | ANO | ======= \\
  $ano = date("Y", strtotime($string));
  // \\ ======================= //


  $string_retorno = $dia." de ".$mes." de ".$ano;
  return $string_retorno; 
}





function mes_format($string){
  // // ======= | MÊS | ======= \\ 
  if(strlen($string) >= "9"){
    $string = date('m', strtotime($string));
  }
  $mes = $string;
  if($mes == 1){
    $mes = "janeiro";
  }elseif($mes == 2){
    $mes = "fevereiro";
  }elseif($mes == 3){
    $mes = "março";
  }elseif($mes == 4){
    $mes = "abril";
  }elseif($mes == 5){
    $mes = "maio";
  }elseif($mes == 6){
    $mes = "junho";
  }elseif($mes == 7){
    $mes = "julho";
  }elseif($mes == 8){
    $mes = "agosto";
  }elseif($mes == 9){
    $mes = "setembro";
  }elseif($mes == 10){
    $mes = "outubro";
  }elseif($mes == 11){
    $mes = "novembro";
  }elseif($mes == 12){
    $mes = "dezembro";
  }

  return $mes; 
}
// \\ ================================================================= //


function location($url){ ?>
  <script type='text/javascript'>window.location.href = "<?=$url?>";</script>
  <?php
  return $location;
}


function br_apos_primeiro_indice($string){
  $ls_string = explode(" ",$string);
  $string_certa = "";
  foreach ($ls_string as $key_string => $string) {
    if($key_string == 0){
      $string_certa .= $string."<br>";
    }else{
      $string_certa .= $string." ";
    }
  }
  return $string_certa;
}

// \\ ======================================= | FUNÇÕES E MÉTODOS PHP | ======================================= //




// // ================================= | GERAR IMAGEM MINIFICADA | ================================= \\
// // ======================= | COMO UTILIZAR A FUNÇÃO | ======================= \\
/*
  Basta passar por parametros os seguintes dados:
  * Caminho da imagem que vai ser modificada
  * Largura que a imagem nova receberá (será proporcional a altura original)
  * Caminho que a imagem nova será salva
  Exemplo: gerar_imagem_minificada('imagens_produto/imagem_teste.jpg','320','imagens_produto/min_imagem_teste.jpg'); ?> 

*/
// \\ ========================================================================== //
function gerar_imagem_minificada($caminho_enviar,$largura_nova,$caminho_salvar,$qualidade){
  echo $qualidade;
  // // ============= | CAPTURA O CAMINHO DA IMAGEM E A LARGURA NOVA | ============= \\
  $foto         = RAIZ.$caminho_enviar; // nome do arquivo original
  $largura_nova = $largura_nova; // largura do arquivo ja redimensionado (em PX) 
  // \\ ============================================================================ //

  // // ======== | CARREGA IMAGEM NA VARÍAVEL PARA FAZER AS CONFIGURAÇÕES | ======== \\
  $original = imagecreatefromjpeg($foto);
  // \\ ============================================================================ //

  // // ============= | PEGA A LARGURA E A ALTURA DA IMAGEM ORIGINAL | ============= \\
  $largura_foto = imagesx($original);
  $altura_foto  = imagesy($original);
  // \\ ============================================================================ //

  // // ========= | FAZ O CÁLCULO DA PROPORCIONALIDADE DA LARGURA / ALTURA | ======= \\
  $fator = $altura_foto/$largura_foto;
  // \\ ============================================================================ //

  // // ==================== | CALCULA A NOVA ALTURA DA IMAGEM | =================== \\
  $altura_nova = $largura_nova*$fator;
  // \\ ============================================================================ //

  // // ============ | CRIA UMA NOVA IMAGEM COM A LARGURA E ALTURA NOVA | ========== \\
  $saida = imagecreatetruecolor($largura_nova,$altura_nova);
  // \\ ============================================================================ //

  // // ============= | CRIA UMA CÓPIA REDIMENSIONADA DA IMAGEM NOVA | ============= \\
  imagecopyresized($saida,$original, 0, 0, 0, 0,$largura_nova,$altura_nova,$largura_foto,$altura_foto);
  // \\ ============================================================================ //

  // // ==== | SALVA A IMAGEM NO CAMINHO DIRECIONADO COM A QUALIDADE ESCOLHIDA | === \\
  imagejpeg($saida,RAIZ.$caminho_salvar,$qualidade);
  // \\ ============================================================================ //

  // // ==================== | LIBERA OS ARQUIVOS PRO SERVIDOR | =================== \\
  imagedestroy($saida);
  imagedestroy($original);
  // \\ ============================================================================ //

  // // =================== | VERIFICA SE FOI CRIADO COM EXITO | =================== \\
  if(file_exists(RAIZ.$caminho_salvar)){
    return true;
  }else{
    return false;
  }
  // \\ ============================================================================ //
}
// \\ =============================================================================================== //

?>
