<style>
<?php 
//  // ================= | CORES | ================= \\
$cor_amarelo           = "#FFAA00";
$cor_amarelo_contraste = "#D59411";
 


$cor_azul           = "#023994";
$cor_azul_contraste = "#04307A";
 

$cor_bege = "#EFE8DB";

$cor_laranja           = "#EF3824";
$cor_laranja_contraste = "#be200e";

$cor_black   = "#202020";
$cor_cinza   = "#D6D6D6";


$cor_roxo = "#350955";

$cor_verde = "#A6CE39";




// // COR, LOGIN, ALGUNS CARDS
$cor_1 = "#0BD1AA";


// // COR, TEXTOS
$cor_2 = "#001447";




$tema = $banco->query('
    select t.* from tema t 
        inner join dados_site ds on ds.id_tema = t.id
            where
                t.id = ds.id_tema
                group by t.id')->fetch();


$cor_background = $tema['cor_background'];
$cor_texto      = $tema['cor_texto'];
$cor_icone      = $tema['cor_icone'];
$cor_adicional  = $tema['cor_adicional'];
$cor_selected   = $tema['cor_selected'];

//  \\ ============================================= //


//  // ================ | MEDIDAS | ================ \\
$medida_lg = "4rem";
$medida_sm = "2rem";
//  \\ ============================================= //


?>


/* // ===================== CSS GERAL ===================== \\ */
* {
    font-family: 'Montserrat', sans-serif;
    caret-color:  <?=$cor_2?>;
}

body{
    zoom: 80%;
}

ul li::marker{
    color: <?=$cor_2?>;
}

a {
    text-decoration: none !important;
    color: black;
}

h1,h2{
    font-family: 'Montserrat', sans-serif;
    font-weight: bold;
    font-weight: bold;
}
p{
    font-weight: 300;
}

a:hover{
    text-decoration: none !important;
    color: <?=$cor_2?>;
}
 



::selection{
    background: <?=$cor_2?>;
    color: black;
}


#chartdiv,
#chartdiv2,
#chartdiv3,
#chartdiv4,
#chartdiv5,
#chartdiv6{
    width: 100%;
    height: 500px;
    zoom: 120%;
}


.text-black {
    color: black !important;
}


.cursor-pointer{
    cursor: pointer;
}

.tox-tinymce{
    width: 100%;
    min-height: 500px;
}

.z-index-0{
    z-index: 0;
}
.z-index-1{
    z-index: 1;
}
.z-index-2{
    z-index: 2;
}
.z-index-3{
    z-index: 3;
}
.z-index-4{
    z-index: 4;
}
.z-index-9{
    z-index: 9;
}


  
/* // ======== btn primary ======== \\ */
.btn-primary{
    background: <?=$cor_2?>;
    border: none !important;
    transition: 0.3s !important;
    box-shadow: none !important;
    font-size: 0.90rem;
    border-radius: 4px;
    letter-spacing: 4px;
}
.btn-primary:hover,.btn-primary:active,.btn-primary:focus{
    background: <?=$cor_2?>;
    transition: 0.3s !important;
}
/* \\ ============================= // */


/* // ======== btn primary ======== \\ */
.btn-outline{
    background: transparent;
    border: 1px solid <?=$cor_amarelo?>;
    transition: 0.3s !important;
    box-shadow: none !important;
    font-size: 0.80rem;
    border-radius: 180px;
    font-weight: 400;
    letter-spacing: 3px;
    padding: 0.5rem 1rem 0.5rem 1rem;
    color: <?=$cor_amarelo?>;
}
.btn-outline span{
    color: black;
    font-weight: 600;
}
.btn-outline:hover,.btn-outline:active,.btn-outline:focus{
    background-image: linear-gradient(150deg, <?=$cor_amarelo_contraste?>, <?=$cor_amarelo?>);
    transition: 0.3s !important;
    border: 1px solid <?=$cor_amarelo_contraste?>;
    color: white;
}
/* \\ ============================= // */
/* \\ ===================================================== // */

 

 
/* // ===================== CSS GERAL ===================== \\ */
iframe.endereco{
    height: 300px;
}
iframe.endereco{
    height: 400px;
}

body{
    display: flex;
    flex-wrap: wrap;
    background: <?=$cor_background?>;
}



html{
    scroll-behavior: smooth;
}


.section-container{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;
    padding: 1rem 0rem;
    justify-content: flex-end;
}
.section-container > *{
    width: 100%;
}

.main-container{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;
    background: white;
    border-radius: 32px 0px 0px 32px;
    min-height: 100vh;
    padding: 1rem;
    position: relative;
}

.main-container > *{
    width: 100%;
}
.main-container > h1{
    font-weight: 600;
    font-size: 1.5rem;
    margin-bottom: 1rem;
}
.main-container > hr{
    opacity: 1;
    height: 1px;
    background: rgb(0, 0, 0, 25%);
    margin: 0;
    margin-bottom: 1rem;
}

.card-galeria a{
    width: 100%;
}

.card-galeria .imagem{
    min-height: 280px;
    max-height: 280px;
    width: 100%;
    margin-bottom: 1rem;
    object-fit: contain;
    object-position: center;
    border-radius: 8px;
    align-items: center;
    justify-content: center;
    display: flex;
    background: #EEE;
}

.logout{
    width: auto;
    background: transparent;
    border-radius: 180px;
    border:none;
    border: 1px solid #F84949;
    padding: 0.2rem 1rem;
    font-size: 0.90rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: <?=$cor_texto?>;
}



.container-tabela{
    width: 15px;
    overflow-y: ;
    max-width: 100%;
    overflow-x: auto;
    transition: 0.3s;
    padding-bottom:3rem ;
}
/* // ============== | SCROLL | ============== \\ */
.container-tabela::-webkit-scrollbar {
  width: 15px;              /* width of the entire scrollbar */
}

.container-tabela::-webkit-scrollbar-track {
  background: #EFEFEF;        /* color of the tracking area */
}

.container-tabela::-webkit-scrollbar-thumb {
  background: #1D2232;
  /*background-color: <?=$cor_verde?>;    /* color of the scroll thumb */
  border-radius: 4px;       /* roundness of the scroll thumb */
  border: none;  /* creates padding around scroll thumb */
}
/* \\ ======================================== // */
.container-tabela .row,
.container-tabela .col-sm-12{
    margin: 0;
    padding: 0;
}
.botoes-adicionais{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 2rem;
}

.btn-success,
.btn-default,
.btn-warning,
.btn-primary,
.btn-danger{
    text-transform: uppercase;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 4px;
    font-size: 0.85rem;
    font-weight: bold;
    border: none;
    min-height: 45px;
    padding: 0.6rem 1rem;
}

.btn-success{
    background: #00B97D;
    color: white;
}
.btn-danger{
    background: #EF2E35;
    color: white;
}
.btn-warning{
    background: #FFCC00;
    color: #1a1a1a;
}
.btn-default{
    background: #E2E2E2;
    color: black;
}

.btn-success i,
.btn-default i,
.btn-danger i,
.btn-warning i{
    font-size: 1.2rem;
    margin-right: 1rem;
}

table:not(.normal) tr td:last-child:not(.normal){
    padding: 0.5rem 0rem; 
    display: flex;
    justify-content: flex-end;
    float: right;
}
table tr td > *{
    margin-left: 0.5rem;
}
table{
    width: 100%;
}
/*
.table>:not(caption)>*>*{
    padding: 0.7rem 0.7rem;
}
*/
.table>:not(caption)>*>th{
    background-color: #1D2232;
    color: white;
    font-weight: 600;
}
.table>:not(caption)>tr{
    margin-bottom: 1rem;
}
.table td,
.table th{
    vertical-align: middle;
    text-align: center;
    /* white-space: nowrap; */
}

table:not(.table-bordered) tr th:first-child,
table:not(.table-bordered) tr td:first-child{
    border-radius: 8px 0px 0px 8px;
}
table:not(.table-bordered) tr th:last-child,
table:not(.table-bordered) tr td:last-child{
    border-radius: 0px 8px 8px 0px;
}



.main-container form{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;
}



<?php 
if($site != "listar_agenda"){ ?>
    .main-container form > *:not(button,a){
        width: 100%;
    }
<?php } ?>

.main-container form .form-group{
    margin-bottom: 1rem;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;
    align-items: flex-start;
    justify-content: flex-start;
}


.main-container form .form-control{
    min-height: 50px;
    border: 1px solid #C5C5C5;
    border-radius: 4px;
}


.main-container form footer{
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;
    align-items: flex-start;
    margin-top: 2rem;
}
.main-container form footer button{
    margin-right: 1rem;
    margin-bottom: 1rem;
}


.main-container form .imagem-padrao{
    width: 100%;
    height: 270px;
    position: relative;
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    margin-bottom: 1rem;
    background-color: #ccc;
}
.main-container form .imagem-padrao input{
    display: none;
}
.main-container form .imagem-padrao img{
    height: 100%;
    max-height: 100%;
    width: 100%;
    object-fit: contain;
    object-position: center;
}
.main-container form .imagem-padrao aside{
    position: absolute;
    right: 0.8rem;
    bottom: 0.8rem;
    display: flex;
    flex-wrap: wrap;
}
.main-container form .imagem-padrao aside button,
.main-container form .imagem-padrao aside a{
    font-size: 0.60rem !important;
    min-height: 30px;
    padding: 0.2rem 0.9rem;
    margin-left: 0.5rem;
}
.main-container form .imagem-padrao aside button i,
.main-container form .imagem-padrao aside a i{
    font-size: 0.80rem !important;
    margin-right: 0.5rem;
}
<?php 
if($site != "etapas"){ ?>
.main-container h3{
    width: 100%;
    text-align: center;
    color: <?=$cor_2?>;
    font-size: 2rem;
    font-weight: 800;
}
.main-container article{
    width: 100%;
    padding: 1.5rem 0.5rem;
    background: white;
    margin-bottom: 3rem;
    margin-top: 1rem;
    border-radius: 12px;
    box-shadow: 0px 4px 0px 1px rgb(0, 0, 0, 15%);
    border: 1px solid #eee;
    display: flex;
    flex-wrap: wrap;
}
<?php } ?>

.x_panel{
    padding: 1rem;
    margin-bottom: 1rem;
    width: 100%;
    box-shadow: 0px 3px 2px 2px rgb(0 0 0 / 8%);
    border-radius: 6px;
}
.escolher-um-usuario{
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    align-content: flex-start;
    justify-content: flex-start;
}
.escolher-um-usuario label{
    display: block;
    font-size: 0.75rem;
    margin-top: 0.5rem;
}
.escolher-um-usuario article{
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;
    width: auto;
    text-align: center;
}
.escolher-um-usuario img{
    height: 65px;
    width: 65px;
    border-radius: 180px;
    object-fit: cover;
    object-position: center;
    transition: 0.3s;
    cursor: pointer;
}
.escolher-um-usuario img:hover{
    transform: scale(1.1);
    transition: 0.3s;
}
.escolher-um-usuario .selected{
    border: 5px solid <?=$cor_2?>;
    transition: 0.3s;
    transform: scale(1.2);
}
.link{
    color: <?=$cor_1?>;
}

.table .sim{
    font-weight: bold;
    color: #00B97D !important;
}
.table .nao{
    font-weight: bold;
    color: #EF2E35 !important;
}

<?php 
if(strpos($_SERVER['SCRIPT_URI'], 'core') === false){ ?>
table tr:hover *:not(input, select, option){
    color: white;
}
table:not(.normal) tr:hover td:last-child{
    padding-right: 1rem;
}
table tr:hover{
    background: #1C2131;
    transition: 0.3s;
}
<?php } ?>
/* \\ ===================================================== // */



/* // ================== | AVISO LOCAL | ================== \\ */
.aviso-local{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 1rem;
    margin-bottom: 1.5rem;
}
.aviso-local main{
    width: auto;
    padding: 1rem 2rem;
    background: #eee;
    color: black;
    text-align: center;
    border-radius: 8px;
    font-size: 1rem;
}
.aviso-local main strong{
    font-weight: bold;
}
.aviso-local main b{
    font-weight: bold;
    font-size: 1.5rem;
}
/* \\ ===================================================== // */


/* // ==================== | INTERNA | ==================== \\ */
.interna{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    align-content: flex-start;
    justify-content: center;
    padding: 3rem 2rem;
}
.interna > main{
    width: 100%;
    max-width: 1300px;
    display: flex;
    flex-wrap: wrap;
}

/* \\ ===================================================== // */






/* // =================== BUSCA HEADER ==================== \\ */
.main-container .busca-header{
    display: flex;
    flex-wrap: wrap;
    align-content: center;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}
.main-container .busca-header .form-control{
    background: #E2E2E2;
    border: none;
}
.main-container .busca-header button{
    background: <?=$cor_2?>;
}
.main-container .busca-header h1{
    font-size: 1.2rem;
    width: auto;
    margin-bottom: 0;
    white-space: nowrap;
}
.main-container .busca-header span{
    font-size: 0.80rem;
    line-height: 100%;
    padding: 0rem 0.5rem;
    text-align: center;
    width: 100%;
}

.main-container .busca-header > *{
    margin-bottom: 1rem;
}   
.main-container .busca-header div{
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}
/* \\ ===================================================== // */






/* // =================== | DROP FEFE | =================== \\ */
.drop-fefe{
    position: relative;
    cursor: pointer;
}
.drop-fefe ul{
    display: none;
    position: absolute;
    right: 0;
    top: 101%;
    max-width: 250px;
    min-width: 200px;
    background: white;
    border-radius: 4px;
    padding: 0.75rem;
    margin: 0;
    z-index: 5;
    box-shadow: 0px 2px 7px -1px rgb(0, 0, 0, 30%);
}
.drop-fefe ul li{
    width: 100%;
    text-align: left;
    list-style: none;
    letter-spacing: initial;
    letter-spacing: 0;
    line-height: 110%;
}
.drop-fefe ul li:not(:last-child){
    margin-bottom: 0.75rem;
}
.drop-fefe ul li a,
.drop-fefe ul li{
    color: black !important;
}
/* \\ ===================================================== // */







/* // =================== | SUB LINKS | =================== \\ */
.sub-links{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    margin-top: 1rem;
    margin-bottom: 1.5rem;
}
.sub-links *{
    transition: 0.3s;
}
.sub-links > *{
    z-index: 5;
    padding: 0.5rem 1.5rem;
    font-weight: bold;
    font-size: 1.2rem;
    border: 1px solid #ccc;
    color: black;
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    border-radius: 5px;
    box-shadow: 0px 0px 15px -5px rgb(0, 0, 0, 5%);
}

.sub-links > *:hover,
.sub-links .active{
    background: <?=$cor_2?>;
    color: white;
    z-index: 7;
    border: 1px solid <?=$cor_2?>;
    transform: scale(1.02);
}
/* \\ ===================================================== // */






/* // =================== | PERTENCE | ==================== \\ */
.pertence{
    width: 100%;
    display: block;
    text-align: center;
    font-size: 4rem;
    line-height: 100%;
    margin-bottom: 3rem;
    font-weight: bold;
    margin-top: 2rem;
}
.pertence span{
    display: block;
    font-size: 1rem;
    line-height: 100%;
    margin-bottom: 0.15rem;
    font-weight: 400;
    letter-spacing: 4px;
    text-transform: uppercase;
}
.pertence span:last-child{
    color: crimson;
    text-decoration: underline;
    margin-top: 0.5rem;
    font-weight: 600;
}
.pertence small{
    display: block;
    line-height: 100%;
    font-size: 2rem;
    color: #666;
}
/* \\ ===================================================== // */











/* // ============================================================= | 576 PX | ============================================================= \\ */
@media (min-width: 576px) {



    /* // ===================== BREADCRUMB ==================== \\ */
    .modal-dialog{
        width: 80%;
    }
    /* \\ ===================================================== // */






}
/* \\ ====================================================================================================================================== // */


/* // ============================================================= | 768 PX | ============================================================= \\ */
@media (min-width: 768px) {
  





}
/* \\ ====================================================================================================================================== // */


/* // ============================================================= | 992 PX | ============================================================= \\ */
@media (min-width: 992px) {


    /* // =================== BUSCA HEADER ==================== \\ */
    .main-container .busca-header span{
        text-align: left;
        width: auto;
    }
    .main-container .busca-header > *:not(:last-child){
        margin-right: 1rem;
    }
    .main-container .busca-header div{
        flex-wrap: nowrap;
    }
    .main-container .busca-header{
        flex-wrap: nowrap;
    }
    .main-container .busca-header > *{
        margin-bottom: 0rem;
    }   
    /* \\ ===================================================== // */



    /* // ===================== CSS GERAL ===================== \\ */
    body{
        flex-wrap: nowrap !important;
    }
    .main-container{
        padding: 2rem;
    }
    .main-container form > *:not(:last-child){
        padding-right: 1rem;
    }
    .main-container form .form-group > *:not(:last-child){
        padding-right: 1rem;
    }
    .main-container form .imagem-padrao{
        height: 400px;
    }


    .col-lg-1{        
        width: 8.3333333333% !important;
    }
    .col-lg-2{        
        width: 16.6666666667% !important;
    }
    .col-lg-3{        
        width: 25% !important;
    }
    .col-lg-4{        
        width: 33.3333333333% !important;
    }
    .col-lg-5{        
        width: 41.6666666667% !important;
    }
    .col-lg-6{        
        width: 50% !important;
    }
    .col-lg-7{        
        width: 58.3333333333% !important;
    }
    .col-lg-8{        
        width: 66.6666666667% !important;
    }
    .col-lg-9{        
        width: 75% !important;
    }
    .col-lg-10{        
        width: 83.3333333333% !important;
    }
    .col-lg-11{        
        width: 91.6666666667% !important;
    }
    .col-lg-12{        
        width: 100% !important;
    }
    /* \\ ===================================================== // */





 
}
/* \\ ====================================================================================================================================== // */


/* // ============================================================= | 1200PX | ============================================================= \\ */
@media (min-width: 1200px) {

  






}
/* \\ ====================================================================================================================================== // */


/* // ============================================================= | 1400PX | ============================================================= \\ */
@media (min-width: 1400px) {



}
/* \\ ====================================================================================================================================== // */

/* // ============================================================= | 1600PX | ============================================================= \\ */
@media (min-width: 1600px) {
    




    

}
/* \\ ====================================================================================================================================== // */
































/* // /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ | 992 PX | /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ \\ */
@media (max-width: 992px) {




    /* // ===================== CSS GERAL ===================== \\ */
   .main-container form .form-group > *:not(.col-1,.col-2,.col-3,.col-4,.col-5,.col-6,.col-7,.col-8,.col-9.col-,.col-10,.col-11,.col-12){
        width: 100%;
    }
    .main-container form .form-group{
        margin-bottom: 2rem;
    }
    /* \\ ===================================================== // */





 
}
/* \\ \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ \\ */
</style>





