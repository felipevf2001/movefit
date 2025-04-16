<?php include('includes/header.php') ?>



<!-- // ================================== | MAIN CONTAINER | ================================== \\ -->
<section class="section-container">
	<?php include('includes/main-header.php'); ?>
	<main class="main-container">
		<h1>Cliente | Alterar</h1>
		<hr>
		<?php 
		$cliente = $banco->query('select * from cliente where id = "'.$id.'"')->fetch(); ?>
		<form action="<?=HOST_GERENCIADOR?>core/alterar_cliente.php" method="post" enctype="multipart/form-data">


			<a src="<?=HOST?>source/cliente/imagem/<?=$cliente['imagem']?>" data-fancybox="gallery" class="form-group imagem">
				<img src="<?=HOST?>source/cliente/imagem/<?=$cliente['imagem']?>" class="w-100" alt="">
			</a>
 
		    <div class="form-group">
		        <label>Nome</label>
	            <input type="text" value="<?=$cliente['nome']?>" name="nome" class="form-control">
		    </div>

		    <div class="form-group">
		        <label>E-Mail</label>
	            <input type="text" value="<?=$cliente['nome']?>" name="nome" class="form-control">
		    </div>

    	    <div class="form-group">
    	        <label>Data Cadastro</label>
                <input type="text" value="<?=date("d/m/Y H:i", strtotime($cliente['data_cadastro']))?>" name="data_cadastro" class="form-control">
    	    </div>

    	    <div class="form-group">
    	        <label>Data Atualização</label>
                <input type="text" value="<?=date("d/m/Y H:i", strtotime($cliente['data_alteracao']))?>" name="data_alteracao" class="form-control">
    	    </div>





    	    <article>
    	    	<h3>Depoimentos deste Cliente</h3>
    	    	<?php 
    	    	$ls_depoimento = $banco->query('
    	    		select * from depoimento
    	    			where
    	    				id_cliente = "'.$cliente['id'].'"
    	    					order by id asc')->fetchAll();
    	    	foreach($ls_depoimento as $depoimento){ ?>
    	    		<div class="form-group col-lg-6 p-3">
    	    			<div class="x_panel bg-light">
    					    
    					    <div class="form-group">
    					        <label>Título</label>
    				            <input type="text" value="<?=$depoimento['titulo']?>" name="titulo" class="form-control">
    					    </div>

				    	    <div class="form-group">
				    	        <label>Descrição</label>
				                <textarea name="descricao" class="form-control" rows="6"><?=$depoimento['descricao']?></textarea>
				    	    </div>

				    	    <div class="form-group justify-content-end">
				    	    	<a data-href="<?=HOST_GERENCIADOR?>core/excluir-registro.php?id_deletado=<?=$depoimento['id']?>&tabela=depoimento" class="btn btn-danger excluir">
				    	    		<i class="fa fa-close m-0"></i>
				    	    	</a>
				    	    </div>

    	    			</div>
    	    		</div>
    	    	<?php } ?>
    	    </article>
			


			<footer>
				<!-- <button class="btn btn-success">
					<i class="fa-solid fa-check"></i> Salvar
				</button> -->
				<input type="hidden" value="<?=$cliente['id']?>" name="id_cliente">
				<a class="btn btn-default" href="<?=HOST_GERENCIADOR?>listar_cliente/">
					<i class="fas fa-long-arrow-left"></i> Retornar
				</a>
			</footer>
			
		</form>

	</main>
</section>
<!-- \\ ======================================================================================== // -->



<style type="text/css">
	.imagem{
		justify-content: center !important;
	}
	.imagem img{
		width: 65%;
		border: 2px solid #1a1a1a;
		max-width: 300px;
		aspect-ratio: 16 / 16;
		object-fit: cover;
		object-position: center;
		border-radius: 180px;
	}
</style>