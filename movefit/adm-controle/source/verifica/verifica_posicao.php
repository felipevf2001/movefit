<?php 
include('../../includes/control-core-gerenciador.php');

error_reporting(0);

$id_linha = $_POST['id'];
$tabela   = $_POST['tabela'];
$valor    = $_POST['valor'];

 
$sql_linha['posicao'] = $valor;
$sql_linha['id']      = $id_linha;
$update_linha = $banco->prepare('update '.$tabela.' set posicao = :posicao where id = :id')->execute($sql_linha);

if($update_linha){ ?>
	<script type="text/javascript">
		setTimeout(function(){ 

		let timerInterval
		Swal.fire({
		  icon: 'success',
		  title: 'Posição Alterada com sucesso!',
		  html: 'Auto pop up fechará em:<b></b> milisegundos.',
		  timer: 1500,
		  timerProgressBar: true,
		  willOpen: () => {
		    Swal.showLoading()
		    timerInterval = setInterval(() => {
		      const content = Swal.getContent()
		      if (content) {
		        const b = content.querySelector('b')
		        if (b) {
		          b.textContent = Swal.getTimerLeft()
		        }
		      }
		    }, 100)
		  },
		  onClose: () => {
		    clearInterval(timerInterval)
		  }
		}).then((result) => {
		  /* Read more about handling dismissals below */
		  if (result.dismiss === Swal.DismissReason.timer) {
		    console.log('I was closed by the timer')
		  }
		})
		 }, 200);
	</script>
<?php }else{ ?>
	<script type="text/javascript">
		Swal.fire({
		  icon: 'error',
		  title: 'Oops...',
		  text: 'Não foi possível atualizar, tente novamente, caso persistir contate a empresa responsável!',
		  footer: ''
		})
	</script>
<?php } ?>
 