<?php include('includes/header.php') ?>



<!-- // ================================== | MAIN CONTAINER | ================================== \\ -->
<section class="section-container">
	<?php include('includes/main-header.php'); ?>
	<main class="main-container">
		<h1>Galeria</h1>
		<hr>
		<form action="<?=HOST_GERENCIADOR?>core/alterar_galeria.php" method="post" enctype="multipart/form-data">



			<!-- // ==================================== GALERIA ==================================== \\ -->
			<div class="form-group">
			    <label>Galeria</label>
		        <input type="file" placeholder="Galeria" name="galeria_master[]" multiple class="form-control">
		        <code class="x_panel">
		        	Utilize <b>Webp</b>, para converter acesse: 
		        	<a target="_blank" href="https://anyconv.com/pt/conversor-de-png-para-webp/">Clique Aqui</a>
		        </code>
			</div>


			<?php
			$ls_galeria = $banco->query("
				select * from galeria 
					order by posicao asc")->fetchAll();
			foreach($ls_galeria as $key_galeria => $galeria){ ?>
				<div class="card-galeria col-lg-3 p-3 ps-lg-0">
					<article>
			        
		                <a target="_blank" href="<?=HOST?>source/galeria/<?=$galeria['imagem']?>" class="w-100">
	                        <img src="<?=HOST?>source/galeria/<?=$galeria['imagem'] ?>" class="imagem w-100">
		                </a>

						<div class="form-group">
							<label>Posição:</label>
							<input name="posicao[<?=$galeria['id']?>]" required type="number" value="<?=$galeria['posicao']?>" class="form-control" placeholder="Posição" />
						</div>
						<div class="form-group">
							<label>Alt / Título:</label>
							<input name="titulo[<?=$galeria['id']?>]" value="<?=$galeria['nome']?>" class="form-control" placeholder="Título" />
						</div>

						<a data-href="<?=HOST_GERENCIADOR?>core/excluir-registro.php?id_deletado=<?=$galeria['id']?>&tabela=galeria" class="btn btn-danger w-100 excluir">
							<i class="fa fa-close m-0"></i>
						</a>
	                </article>
		      	</div>                 
			<?php } ?>

			<!-- \\ ================================================================================= // -->
 
			
			<footer>
				<button class="btn btn-success">
					<i class="fa-solid fa-check"></i> Salvar
				</button>
				<input type="hidden" name="id_idioma" value="<?=$id?>">
				<a class="btn btn-default" href="<?=HOST_GERENCIADOR?>">
					<i class="fas fa-long-arrow-left"></i> Retornar
				</a>
			</footer>
			
		</form>

	</main>
</section>
<!-- \\ ======================================================================================== // -->

