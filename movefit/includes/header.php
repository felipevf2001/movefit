
<!-- // ================================================= | HEADER | ============================================== \\ -->
<style>
  .header-supreme{
    width: 100%;
    display: flex;
    justify-content: center;
    position: sticky;
    top: 0;
    padding: 0.5rem 1rem;    
    z-index: 1030;
    background: <?=$cor_preto?>;
    backdrop-filter: blur(6px);
    border-bottom: 1px solid #393F45;
  }

  .header-supreme,
  .header-supreme *{
    transition: 0.3s;
  }

  .header-supreme > main{
    width: 100%;
    max-width: 450px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .header-supreme .logo img{
    width: 100%;
  }
  .header-supreme .logo{
    width: 70px;
  }
  .header-supreme nav{
    width: 100%;
    display: none;
    flex-wrap: wrap;
    align-content: center;
    
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    max-height: 100vh;
    background: <?=$cor_preto_contraste?>;
    padding: 2rem;
    overflow: auto;
    transition: initial;
  }
  .header-supreme nav ul{
    list-style: none;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    margin: 0;
    align-items: center;
    width: 100%;
  }
  .header-supreme nav ul:not(.links) > *{
    margin-bottom: 1rem;
  }


  .header-supreme .whatsapp{
    display: flex;
    align-items: center;
    font-size: 0.80rem;
    color: white;
    white-space: nowrap;
    justify-content: center;
  }
  .header-supreme .whatsapp i{
    color: <?=$cor_preto?>;
    font-size: 1.3rem;
    margin-right: 0.5rem;
  }
  .header-supreme .whatsapp span{
    font-weight: bold;
    color: white;
    margin-left: 0.3rem;
  }
  
  
  .header-supreme .redes-sociais{
    justify-content: center;
    display: flex;
    margin-top: 1rem;
    zoom: 150%;
  }
  .header-supreme .redes-sociais a{
    width: auto;
    background: #0e0d0c !important;
    margin: 0rem 0.3rem;
    background: white;
    border-radius: 8px;
    height: 35px;
    width: 35px;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    color: <?=$cor_preto?>;
    padding: 0 !important;
    font-size: 1.3rem;
  }
  .header-supreme .links{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  .header-supreme .links a{
    padding: 1rem 0rem;
    color: white;
    line-height: 100%;
    text-align: center;  
    display: block;
    transition: 0.3s;
    border-radius: 4px;
    font-weight: bold;
    font-size: 1.35rem;
  }
  .header-supreme .links a:hover{
    transition: 0.3s;
    transform: scale(1.03);
    color: <?=$cor_verde_contraste?>;
  } 

  .header-supreme .drop-fefe{
    z-index: 1;
  }

  .header-supreme .drop-fefe main{
    transition: initial;
  }

  

  .header-supreme .abrir-menu{
    height: 35px;
    width: 35px;
    background: <?=$cor_preto?>;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: white;
    border: none;
  }

  .header-supreme .links > *{
    width: 100%;
  }
  .header-supreme .fechar-menu{
    position: absolute;
    right: 15%;
    bottom: 15%;
    font-size: 2rem;
    line-height: 100%;
    color: white;
    width: 100%;
    text-align: right;
  }

  .header-supreme nav[style*="display: block"]{
    display: flex!important;
  }


  .header-supreme.header-rolagem{
    background: rgb(23, 11, 0, 95%);
  }








  /* // ============================================================= | 992 PX | ============================================================= \\ */  
  @media(min-width: 992px){




    .header-supreme > main{
      max-width: 1300px;
    }

    .header-supreme .redes-sociais{
      margin-top: 0rem;
      zoom: 100%;
    }

    .header-supreme .redes-sociais a{
      margin: 0;
      margin-left: 0.25rem;
    }

    .header-supreme .fechar-menu{
      display: none;
    }

    .header-supreme .whatsapp{
      justify-content: start;
    }

    .header-supreme .links{
      padding: 0rem;
      flex-wrap: nowrap;
      justify-content: end;
    }

    .header-supreme .abrir-menu{
      display: none;
    }
    .header-supreme nav ul > *{
      margin-bottom: 0rem;
    }
    .header-supreme .links > *{
      width: auto;
    }

    .header-supreme nav{
      display: flex;
      flex-wrap: nowrap;
      overflow: initial;
      position: initial;
      top: 0;
      left: 0;
      height: initial;
      background: initial;
      padding: 0;
    }


    .header-supreme .logo{
      width: 210px;
      margin-right: 2rem;
    }



    .header-supreme{
      overflow-x: clip;
      padding: 1rem 1rem;
      background: transparent;
    }



    .header-supreme .links a{
      white-space: nowrap;
      font-size: 1rem;
      padding: 0.3rem 1rem;
    }






  }
  /* \\ ====================================================================================================================================== // */

  
</style>
<header class="header-supreme">
  <main>
    <!-- // ================ | LOGO | ================ \\ -->
    <a class="logo" href="<?=HOST?>">
      <img src="<?=HOST?>source/assets/logo/<?=$dados_site['imagem_logo']?>" alt="<?=$dados_site['nome']?>">
    </a>
    <button class="abrir-menu">
      <i class="fas fa-bars"></i>
    </button>
    <!-- \\ ========================================== // -->
    <!-- // ================ | LINKS | =============== \\ -->    
    <nav>
      <i class="fas fa-times fechar-menu"></i>

      <ul class="links justify-content-start">
        <li><a href="<?=HOST?>#inicio">Início</a></li>
        <li><a href="<?=HOST?>#beneficios">Benefícios</a></li>
        <li><a href="<?=HOST?>#depoimentos">Depoimentos</a></li>
        <li><a href="<?=HOST?>#galeria">Galeria</a></li>
      </ul>

      <ul class="links mt-3 mt-lg-0">
        <?php 
        // // ================= | CLIENTE LOGADO | ================= \\
        if($cliente_logado){ ?>
        <li><a href="<?=HOST?>movefit-app/"><i class="fas fa-user me-2"></i> Meu Perfil</a></li>
        <li><a href="<?=HOST?>core/deslogar.php"><i class="fas fa-power-off"></i> Deslogar</a></li>
        <?php }
        // \\ ====================================================== //

        // // =============== | CLIENTE NÃO LOGADO | =============== \\
        else{ ?>
        <li><a class="abrir-login" href="#">Login</a></li>
        <?php }
        // \\ ====================================================== // ?>

        <li><a href="<?=HOST?>" class="teste-gratis">Teste Gratis</a></li>
      </ul>

    </nav>
    <!-- \\ ========================================== // -->
  </main>
</header>
<!-- \\ =========================================================================================================== // -->





<script type="text/javascript">
  $(".header-supreme .links a").click(function(){

    if(screen.width < 992){
      $(".header-supreme nav").slideUp(100);
    }

  });
</script>


<script>

 // // ========================= | ABRE E FECHA MENU DO MOBILE | ========================= \\
 $(".abrir-menu,.fechar-menu").click(function(){

   $(".header-supreme nav").slideToggle(250);

 });
 // \\ =================================================================================== //


 // // =============================== | HEADER PRODUTOS | =============================== \\
 $(".header-produtos > a").click(function(e){

   e.stopPropagation();
   e.preventDefault();

   if($(".header-produtos > main").is(":visible")){
     $(".header-produtos > main").fadeOut(200);
   }else{
     $(".header-produtos > main").fadeIn(200);
   }


 });

 $(".header-produtos .fechar-header-produtos").click(function(){
   $(".header-produtos > main").fadeOut(200);
 });
 // \\ =================================================================================== //

</script>






<main class="main-supreme">




<?php 
include('includes/formulario-movefit.php'); ?>



<script type="text/javascript">
  $(".abrir-login").click(function(e){
    e.stopPropagation();
    e.preventDefault();

    $(".formulario-movefit").fadeToggle(150);

  });
</script>








<script>
  
 $(document).ready(function(){

     $(".drop-fefe").click(function(){
         var drop_button = $(this);

         if(drop_button.children("main").is(":visible")){

             drop_button.children("main").fadeOut(250);

         }else{

             drop_button.children("main").fadeIn(250);

         }

         

     });

 });
</script>













<!-- // ===================== | WHATS | ====================== \\
<style>
  .zap-flutuante{
    position: fixed;
    right: 1rem;
    bottom: 4.5rem;
    z-index: 999;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 180px;
    color: white;
    font-size: 1.75rem;
    width: 57px;
    aspect-ratio: 16 / 16;
    background: #0dc143;
  }
  .zap-flutuante:hover{
    color: <?=$cor_vermelho?>;
    transform: scale(1.15);
  }

</style>
<a target="_blank" class="zap-flutuante" href="<?=whatsapp($dados_site['whatsapp'], 'Olá! Estava acessando seu site e fiquei interessado em seus serviços')?>">
  <i class="fab fa-whatsapp"></i>
</a>
\\ ====================================================== // -->
