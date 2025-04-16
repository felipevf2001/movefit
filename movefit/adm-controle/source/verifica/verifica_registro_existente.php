<?php 
include('../includes/control-core-gerenciador.php');

error_reporting(0);

$tabela = $_POST['tabela'];
$campo  = $_POST['campo'];
$valor  = $_POST['valor'];


if(
	!$tabela
	||
	!$campo
){ ?>
	<script>
		sweet_alert('Não foi possível verificar os valores, tente novamente, caso persistir contate a empresa responsável', 'warning');
	</script>
	<?php
	die();
}

 
$action['posicao'] = $valor;
$action['id']      = $id_linha;
$action = $banco->query('select * from '.$tabela.' where '.$campo.' = "'.$valor.'"')->fetch();

if($action){ ?>
	<script>
		sweet_alert('O sistema já possui outro registro com este valor', 'warning');
		resetar_campo = 1;
	</script>
<?php } ?>