<style>



<?php 
//  // ================= | CORES | ================= \\
$cor_cinza           = "#41535A";
$cor_cinza_fraco     = "#566d76";
$cor_cinza_contraste = "#2b373b";

$cor_verde           = "#C1F17E";
$cor_verde_fraco     = "#d3f5a3";
$cor_verde_contraste = "#A7EE43";

$cor_preto           = "#080F17";
$cor_preto_fraco     = "#121820";
$cor_preto_contraste = "#070707";

//  \\ ============================================= // ?>


/* // ===================== CSS GERAL ===================== \\ */


* {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 400;
    caret-color: <?=$cor_cinza?>;
    color: white;
}

body{
    background: <?=$cor_preto?>;
}

ul li::marker{
    color: <?=$cor_cinza?>;
}

a{
    text-decoration: none !important;    
    transition: 0.3s;
    word-break: break-word;
}
a:hover{
    text-decoration: none !important;
    color: <?=$cor_preto_contraste?>;
    transition: 0.3s;
}

select optgroup{
    font-weight: bold;
}
 
h1, h2{
    font-weight: bold;
    font-family: 'Plus Jakarta Sans', sans-serif;
}



p{
    line-height: 130%;
}


main.main-supreme{
    overflow-x: hidden;
    margin: 0;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    justify-content: center;
}



::selection{
    background: <?=$cor_cinza_contraste?>;
    color: white;
}




.text-justify{
    text-align: justify !important;
}
.text-black {
    color: black !important;
}
.bg-black{
    background: black;
}
.cursor-pointer{
    cursor: pointer;
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

b{
    font-weight: bold;
}



/* // ===================== | INTERNA | =================== \\ */
.interna{
    display: flex;
    flex-wrap: nowrap;
    flex-direction: column;
    align-items: center;
    justify-content: start;
    width: 100%;
    padding: 3rem 1rem;
}
.interna > main{
    width: 100%;
    max-width: 450px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    position: relative;
}

/* \\ ===================================================== // */



/* // ================= | FORMULÁRIO GERAL | ============== \\ */

.formulario-geral > main{
    position: relative;
    justify-content: center;
}
.formulario-geral > main > *{
    z-index: 2;
}

.formulario-geral h1{
    width: 100%;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 2rem;
    font-weight: 800;
    color: <?=$cor_preto?>;
    line-height: 100%;
}



.formulario-geral label{
    color: black;
    text-transform: uppercase;
}
.formulario-geral form{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
}
.formulario-geral *{
    transition: 0.3s;
}
.formulario-geral form > *{
    <?php 
    if($site != "ouvidoria"){ ?>
    width: 100%;
    <?php } ?>
    margin-bottom: 1rem;
}

.formulario-geral .form-control:focus{
    box-shadow: 0px 0px 0px 2px <?=$cor_preto?>;
}
.formulario-geral .form-control{
    color: <?=$cor_preto?>;
    font-size: 1rem;                
    border: 1px solid #707070;
    border-radius: 4px;
    min-height: 45px;
}
.formulario-geral button{
    min-height: 45px;
    border-radius: 8px;
    padding: 0rem 2rem;
    font-weight: bold;
    text-transform: uppercase;
    color: white;
    background: #000;
    border: none;
    width: auto;
}






.formulario-geral header{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 2rem;
}   

.formulario-geral header div{
    width: 100%;
    padding: 1rem;
    border: 2px solid <?=$cor_cinza?>;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    border-radius: 8px;
}
.formulario-geral header div:not(:last-child){
    margin-bottom: 1rem;
}

.formulario-geral header div:not(.redes-sociais) a,
.formulario-geral header div:not(.redes-sociais) p{
    width: 100%;
    display: flex;
    font-size: 1rem;
    align-items: center;
    color: <?=$cor_preto?>;
    line-height: 110%;
    font-weight: bold;
}
.formulario-geral header div:not(.redes-sociais) a:not(:last-child){
    margin-bottom: 0.5rem;
}

.formulario-geral header .redes-sociais i{
    color: white;
}
.formulario-geral header div:not(.redes-sociais) a i,
.formulario-geral header div:not(.redes-sociais) p i{
    margin-right: 0.75rem;
    color: <?=$cor_cinza?>
}

/* \\ ===================================================== // */




/* // =================== | REDES SOCIAIS | =============== \\ */
.redes-sociais{
  justify-content: start;
  display: flex;
}
.redes-sociais a{
  width: auto;
  margin-right:0.5rem;
  background: white;
  border-radius: 8px !important;
  height: 35px;
  width: 35px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  font-size: 1.3rem;
  background: <?=$cor_preto?> !important;
}
.redes-sociais a img{
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;
}
.redes-sociais a i{
    color: white;
}
/* \\ ===================================================== // */




/* // ================= | FALE CONOSCO | ================== \\ */
.fale-conosco{
    text-align: center;
    word-break: initial;
    width: auto;
    font-size: 1.20rem;
    color: #D6DDE6;
    padding: 0.75rem 1.35rem;
    border-radius: 12px;
    border: 2px solid #313840;
    font-weight: 600;
    transition: 0.3s ease;
    line-height: 100%;
}
.fale-conosco:hover{
    transform: scale(1.03);
    border: 2px solid <?=$cor_verde_contraste?>;
    color: <?=$cor_verde_contraste?>;
}
/* \\ ===================================================== // */



/* // ================= | TESTE GRÁTIS | ================== \\ */
.teste-gratis{
    text-align: center;
    word-break: initial;
    width: auto;
    color: <?=$cor_preto?> !important;
    padding: 0.75rem 1.35rem !important;
    background: <?=$cor_verde_contraste?>;
    border-radius: 12px !important;
    border: 2px solid <?=$cor_verde_contraste?>;
    font-size: 1.20rem;
    font-weight: 600;
    line-height: 100%;
    transition: 0.3s ease;
}
.teste-gratis:hover{
    transform: scale(1.03);
    background: transparent;
    border: 2px solid <?=$cor_verde_contraste?> !importantm;
    color: white !important;
}
/* \\ ===================================================== // */







/* // ============================================================= | 576 PX | ============================================================= \\ */
@media (min-width: 576px) {

}
/* \\ ====================================================================================================================================== // */


/* // ============================================================= | 768 PX | ============================================================= \\ */
@media (min-width: 768px) {
  



}
/* \\ ====================================================================================================================================== // */


/* // ============================================================= | 992 PX | ============================================================= \\ */
@media (min-width: 992px){  

    body{
        zoom: 70%;
    }


    /* // ===================== | INTERNA | =================== \\ */
    .interna > main{
        max-width: 1300px;
    }
    .interna{
        padding: 5rem 1rem;
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
    

    body{
        zoom: 100%;
    }

    

}
/* \\ ====================================================================================================================================== // */
</style>