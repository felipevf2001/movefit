
<!-- // ============================= | BUSCA HEADER | ============================= \\ -->
<form action="<?=HOST_GERENCIADOR?>gerar_relatorio" method="get" class="busca-header">
	<div>
		<span>
			Selecione o
			intervalo das datas
		</span>
		<input name="data_inicial" value="<?=$_GET['data_inicial']?>" type="date" required class="form-control">
		<span>a</span>
		<input name="data_final" value="<?=$_GET['data_final'] ? $_GET['data_final'] : date('Y-m-d') ?>" type="date" required class="form-control">
	</div>
	<input type="hidden" name="tabela" value="<?=$tabela?>">
	<button class="btn btn-success text-nowrap">
		<i class="fa fa-search"></i> Gerar Relatório
	</button>
</form>
<!-- \\ ============================================================================ // -->