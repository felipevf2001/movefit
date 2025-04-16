<?php 
include($extensao_de_caminho.'../lib/config.php'); ?>

<script src="<?=HOST_GERENCIADOR?>source/assets/js/jquery/jquery.min.js"></script>
<link   rel="stylesheet" href="<?=HOST_GERENCIADOR?>source/assets/css/bootstrap/bootstrap.min.css">
<script src="<?=HOST_GERENCIADOR?>source/assets/js/sweetalert2/sweetalert2@11.js"></script>
<script src="<?=HOST_GERENCIADOR?>source/assets/js/fancybox/jquery.fancybox.min.js"></script>
<link rel="icon" href="<?=HOST?>source/assets/icone/<?=$dados_site['imagem_icone'] && $dados_site['imagem_icone'] != "sem_imagem.jpg" ? $dados_site['imagem_icone'] : "estudio.png" ?>" />
<script src="https://kit.fontawesome.com/ca3a52c1aa.js" crossorigin="anonymous"></script>

<?php include($extensao_de_caminho.'../source/assets/css/estilo.php'); ?>

<?php 
if(get_ip() == IP_FEFE){
	ini_set('display_errors', 1);
	error_reporting(0);
}
if(
	(
		!$_SESSION['ACESSO_GERENCIADOR'] || 
		!$_SESSION['ID_GERENCIADOR']
	) 
	&& 
	strpos($_SERVER['REQUEST_URI'], "login") === false
	&&
	strpos($_SERVER['REQUEST_URI'], "imprimir-email-marketing-lead") === false
){ ?>
	<script>
		$(window).on("load",function(){


		    let timerInterval;
		    Swal.fire({
		        title: "Sua sessão expirou, logue novamente!",
		        html: "Você sairá em <b></b> milisegundos.",
		        timer: 5000,
		        timerProgressBar: true,            
		        didOpen: () => {
		            Swal.showLoading();
		            const b = Swal.getHtmlContainer().querySelector("b");
		            timerInterval = setInterval(() => {
		                b.textContent = Swal.getTimerLeft();
		            }, 100);
		        },
		        willClose: () => {
		            clearInterval(timerInterval);

		            window.location.href = "<?=HOST_GERENCIADOR?>core/logout.php"

		        },
		    }).then((result) => {
		        /* Read more about handling dismissals below */
		        if (result.dismiss === Swal.DismissReason.timer) {
		            
		        }
		    });


		});
	</script>
<?php die(); } 


$usuario_logado = $banco->query('select * from usuario    where id = "'.$_SESSION['ID_GERENCIADOR'].'"')->fetch();
$dados_site     = $banco->query('select * from dados_site where id = "1"')->fetch();

?>



<style>
	<?php 
	if(
		strpos($_SERVER['SCRIPT_URI'], 'core') !== false
		&&
		strpos($_SERVER['SCRIPT_URI'], 'cadastrar_usuario') !== false
		&&
		strpos($_SERVER['SCRIPT_URI'], 'alterar_usuario') !== false

	){ ?>
	/* // ============================== | APENAS PARA O CORE | ============================== \\ */
	body{
		min-height: 100vh;
		background: #EEE;
	    display: flex;
	    flex-wrap: wrap !important;
	    align-items: start;
	    align-content: start;
	}
	/* \\ ==================================================================================== // */
	<?php } ?>
</style>

<?=control_title_core();?>


