<?php include('includes/header.php') ?>



<!-- // ================================== | MAIN CONTAINER | ================================== \\ -->
<section class="section-container">
	<?php include('includes/main-header.php'); ?>
	<main class="main-container">
		<h1>Página | Alterar</h1>
		<hr>
		<?php 
		$depoimento = $banco->query('select * from depoimento where id = "'.$id.'"')->fetch();
		$cliente = $banco->query('
			select * from cliente
				where
					id = "'.$depoimento['id_cliente'].'"')->fetch(); ?>
		<form action="<?=HOST_GERENCIADOR?>core/alterar_depoimento.php" method="post" enctype="multipart/form-data">


		    <div class="form-group">
		        <label>Publicar</label>
	            <select name="nota" required class="form-control">
	            	<option value="0" <?=$depoimento['publicar'] == "0" ? "selected" : ""?>>Não Publicar</option>
	            	<option value="1" <?=$depoimento['publicar'] == "1" ? "selected" : ""?>>Publicar</option>
	            </select>
		    </div>

		    <div class="form-group">
		        <label>Cliente</label>
	            <input type="text" readonly value="<?=$cliente['nome']?>" name="nome" class="form-control">
		    </div>

		    <hr>

    	    <div class="form-group">
    	        <label>Nota</label>
                <select name="nota" required class="form-control">
                	<option value="" selected disabled>Selecione uma Nota</option>
                	<?php 
                	for($i = 0; $i <= 10; ++$i){ ?>
                	<option value="<?=$i?>" <?=$depoimento['nota'] == $i ? "selected" : ""?>><?=$i/2?> Estrelas</option>
                	<?php } ?>
                </select>
    	    </div>


    	    <div class="form-group">
    	        <label>Título</label>
                <input type="text" value="<?=$depoimento['titulo']?>" name="titulo" class="form-control">
    	    </div>

    	    <div class="form-group">
    	        <label>Descrição</label>
                <textarea name="descricao" class="form-control" rows="6"><?=$depoimento['descricao']?></textarea>
    	    </div>

		    


			<footer>
				<button class="btn btn-success">
					<i class="fa-solid fa-check"></i> Salvar
				</button>
				<input type="hidden" value="<?=$depoimento['id']?>" name="id_depoimento">
				<a class="btn btn-default" href="<?=HOST_GERENCIADOR?>listar_depoimento/<?=$depoimento['id_idioma']?>">
					<i class="fas fa-long-arrow-left"></i> Retornar
				</a>
			</footer>
			
		</form>

	</main>
</section>
<!-- \\ ======================================================================================== // -->

