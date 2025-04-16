  <!-- // =================================== | LOGIN | =================================== \\ -->

<style>
  header#header_supreme{
    width: 100%;
    display: flex;
    padding: 0rem 0rem 0rem 0.5rem;
  }
  header#header_supreme main{
    height: 100%;
    width: 100%;
    overflow-y: auto;
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;
  }
  header#header_supreme main > *{ 
    width: 100%;
  }
  header#header_supreme main figure{
    padding: 2rem;
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
  }
  header#header_supreme main figure img{
    width: 80%;
    filter: drop-shadow(0px 0px 1px white);
  }
  header#header_supreme main figure i{
    font-size: 2rem;
    width: auto;
    display: block;
    color: <?=$cor_texto?>;
  }
  header#header_supreme ul{
    list-style: none;
    padding: 0;
    width: 100%;
  }

  
  header#header_supreme main > ul > li{
    font-weight: 600;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
  }

  header#header_supreme main > ul > li > a{
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
  }

  header#header_supreme main > ul > li > div,
  header#header_supreme main > ul > li > a{
    padding:0.5rem 1rem ;
    border-radius: 180px 0px 0px 180px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
  }

  header#header_supreme main > ul > li:not(:last-child){
    margin-bottom: 1rem;
  }


  header#header_supreme .link-selected i,
  header#header_supreme .selected i{
    color: <?=$cor_texto?>;
  }

  header#header_supreme main > ul > li i{
    color: <?=$cor_icone?>;
    margin-right: 1rem;
    font-size: 1.7rem;
  }
  header#header_supreme .fa-chevron-down,
  header#header_supreme .fa-chevron-up{
    color: <?=$cor_adicional?>;
    font-size: 1rem;
  }
  
  header#header_supreme main > ul > li span{
    display: flex;
    align-items: center;
    color: <?=$cor_texto?>;
  }

  header#header_supreme main > ul > li > ul{
    list-style: none;
    padding: 1rem 0.2rem 1rem 3rem;
    display: none;
  } 
  header#header_supreme main > ul > li > ul li a{
    color: <?=$cor_texto?>;
    border-radius: 180px;
    line-height: 125%;
  }
  header#header_supreme main > ul > li > ul li{
    list-style: none;
    margin: 0.5rem 0rem;    
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    justify-content: space-between;
    color: <?=$cor_texto?>;
  } 





  @keyframes exclamation_agenda{
    25%{
      transform: scale(1.2);
      background: <?=$cor_1?>;
    }
    50%{
      transform: scale(1);
      background: <?=$cor_2?>;
    }
    75%{
      transform: scale(1.2);
      background: <?=$cor_1?>;
    }
    100%{
      background: <?=$cor_2?>;
      transform: scale(1);
    }
  }
  header#header_supreme .agenda .fa-exclamation{
    background: <?=$cor_2?>;
    color: white;
    font-size: 1rem;
    padding: 0.4rem;
    height: 30px;
    border-radius: 181px;
    width: 30px;
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
    animation: exclamation_agenda 5s infinite;
  }

  header#header_supreme *:not(figure a,.agenda div a).link-selected{
    background: <?=$cor_adicional?>;;
    padding: 0.3rem 0.9rem;
    width: 100%;
    border-radius: 180px 0px 0px 180px;
    color: white;
    transition: 1s;
  }
  header#header_supreme .selected{
    background: <?=$cor_selected?>;
  }

  /* // ============== | SCROLL | ============== \\ */
  header#header_supreme main::-webkit-scrollbar {
    width: 15px;              /* width of the entire scrollbar */
  }

  header#header_supreme main::-webkit-scrollbar-track {
    background: #e6e6e6;        /* color of the tracking area */
  }

  header#header_supreme main::-webkit-scrollbar-thumb {
    background-image: linear-gradient(#a6a6a6, #ccc);
    /*background-color: <?=$cor_verde?>;    /* color of the scroll thumb */
    border-radius: 10px;       /* roundness of the scroll thumb */
    border: 3px solid #e6e6e6;  /* creates padding around scroll thumb */
  }
  /* \\ ======================================== // */



  /* // ========================== 992 ========================== \\ */
  @media(min-width: 992px){

    header#header_supreme{
      position: sticky;
      top: 0;
      min-width: 320px;
      max-width: 320px;
      min-height: 100%;
    }

    header#header_supreme main > ul > li > div,
    header#header_supreme main > ul > li > a{
      padding:0.5rem 2rem ;
    }

 
    header#header_supreme main figure img{
      margin-right: 2rem;
      width: 65%;
    }
    


  }




  header#header_supreme_fake,
  .menu-header{
    cursor: pointer;
  }


  header#header_supreme_fake{
    position: fixed;
    left: 5px;
    top: 5px;
    height: 50px;
    width: 50px;
    background: white;
    border-radius: 180px;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10;
    box-shadow: 0px 0px 15px -8px rgb(0 0 0);
  }
  /* \\ ========================== 992 ========================== // */
</style>
<header id="header_supreme_fake" style="display: none;">
  <i class="fas fa-bars"></i>
</header>
<header id="header_supreme">
  <main>
    <figure>
      <a href="<?=HOST_GERENCIADOR?>">
        <img src="<?=HOST?>source/assets/logo/<?=$dados_site['imagem_logo']?>" alt="Logo <?=$dados_site['nome']?>">
      </a>
      <i class="fas fa-bars menu-header"></i>
    </figure>
    <ul>

      <li>
        <a href="<?=HOST_GERENCIADOR?>alterar_galeria">
          <span><i class="fa-solid fa-images"></i> Galeria</span>
        </a>
      </li>

      <li>
        <a href="<?=HOST_GERENCIADOR?>listar_depoimento">
          <span><i class="fa-solid fa-comment"></i> Depoimentos</span>
        </a>
      </li>

      <li>
        <a href="<?=HOST_GERENCIADOR?>listar_cliente">
          <span><i class="fa-solid fa-users"></i> Clientes</span>
        </a>
      </li>

      <li>
        <div>
          <span><i class="fa-solid fa-gear"></i> Configurações</span>
          <i class="fas fa-chevron-down"></i>
        </div>
        <ul>
          <li><a href="<?=HOST_GERENCIADOR?>alterar_tema/">Tema</a></li>
          <li><a href="<?=HOST_GERENCIADOR?>dados_site/">Configuração Geral</a></li>
          <li><a href="<?=HOST_GERENCIADOR?>listar_usuario">Usuários</a></li>
          <li><a href="<?=HOST_GERENCIADOR?>listar_pagina">Páginas</a></li>
        </ul>
      </li>
     

    </ul>
  </main>
</header>



<script>

  // // ========================== | ABRIR MENUS | ========================== \\
  $("header#header_supreme main > ul > li > div").click(function(e){

    $("header#header_supreme main > ul > li > ul").slideUp(200);
    $("header#header_supreme main div").not($(this)).removeClass("selected");
    if(!$(this).hasClass("selected")){
      $(this).addClass("selected");
      $(this).parent("li").children("ul").slideDown(200);
    }else{
      $("header#header_supreme main div").removeClass("selected");
    }
    
  });
  // \\ ===================================================================== //


  // // ========================== | ABRIR MENUS | ========================== \\
  $(document).ready(function(){
    $('a[href="<?=$url_total?>"]').addClass('link-selected');
    $('a[href="<?=$url_total?>"]').parent('li').parent('ul').parent('li').children('div').click();

  });
  // \\ ===================================================================== //


  // // ====================== | MINIMIZAR HEADER | ========================= \\
  $(".menu-header , #header_supreme_fake").click(function(){
    
    $("header#header_supreme").toggle(500);
    $("header#header_supreme_fake").toggle(500);

    if($(".etapas").hasClass("w-100")){
      $(".etapas").removeClass("w-100");
    }else{
      $(".etapas").addClass("w-100");
    }
    

  });
  // \\ ===================================================================== //
</script>
<!-- \\ ================================================================================= // -->