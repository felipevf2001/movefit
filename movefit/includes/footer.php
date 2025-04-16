</main>















<!-- // ============================================= | FOOTER | ============================================ \\ -->
<style>
    
    

    .footer-supreme > main{
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .footer-supreme .logo{
        width: 170px;
        margin-bottom: 2rem;
    }

    /* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */
    @media(min-width: 992px){

        .footer-supreme .logo{
            margin-bottom: 0rem;
        }


        .footer-supreme > main{
            flex-direction: row;
            justify-content: space-between;
        }


    }
</style>
<footer class="interna footer-supreme">
    <main>

        <img src="<?=HOST?>source/assets/logo/<?=$dados_site['imagem_logo']?>" class="logo" alt="<?=$dados_site['nome']?>">
        
        <a class="fale-conosco" href="">
            Fale Conosco
        </a>


    </main>
</footer>
<!-- \\ ===================================================================================================== // -->

