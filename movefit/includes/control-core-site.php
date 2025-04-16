<?php include('../adm-controle/lib/config.php'); ?>

<script src="<?=HOST_GERENCIADOR?>source/assets/js/jquery/jquery.min.js"></script>
<link   rel="stylesheet" href="<?=HOST_GERENCIADOR?>source/assets/css/bootstrap/bootstrap.min.css">
<script src="<?=HOST_GERENCIADOR?>source/assets/js/sweetalert2/sweetalert2@11.js"></script>
<script src="<?=HOST_GERENCIADOR?>source/assets/js/fancybox/jquery.fancybox.min.js"></script>
<?php 
include('../css/estilo.php');

//$dados_site = $banco->query('select * from dados_site where id = "1"')->fetch();

// // ======== | GOOGLE ANALYTICS | ======== \\
echo $dados_site['google_analytics'];
// \\ ====================================== //

// // ==== | GOOGLE TAG MANAGER - HEAD | === \\ 
echo $dados_site['google_tag_manager_head'];
// \\ ====================================== //

// // ==== | GOOGLE TAG MANAGER - BODY | === \\ 
echo $dados_site['google_tag_manager_body'];
// \\ ====================================== // 

?>



<style>
	/* // ============================== | APENAS PARA O CORE | ============================== \\ */
	body{
		min-height: 100vh;
		background: #EEE;
	    display: flex;
	    flex-wrap: wrap;
	    align-items: start;
	    align-content: start;
	}
	/* \\ ==================================================================================== // */
</style>

<?=control_title_core();?>


