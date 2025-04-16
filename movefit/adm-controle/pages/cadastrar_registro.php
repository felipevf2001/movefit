<?php include('includes/header.php') ?>



<!-- // ================================== | MAIN CONTAINER | ================================== \\ -->
<section class="section-container">
	<?php include('includes/main-header.php'); ?>
	<main class="main-container">
		<h1>Cadastrar</h1>
		<hr>
		<form action="<?=HOST_GERENCIADOR?>core/cadastrar_registro.php" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label>Nome</label>
				<input name="nome" type="text" required class="form-control">
			</div>

			<footer>
				<button class="btn btn-success">
					<i class="fa-solid fa-check"></i> Salvar
				</button>
				<input type="hidden" name="tabela" value="<?=$_GET['tabela']?>">
				<a class="btn btn-default" href="<?=HOST_GERENCIADOR?>listar_<?=$_GET['tabela']?>">
					<i class="fas fa-long-arrow-left"></i> Retornar
				</a>
			</footer>
			
		</form>

	</main>
</section>
<!-- \\ ======================================================================================== // -->

