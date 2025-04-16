<?php include('includes/header.php') ?>



<!-- // ================================== | MAIN CONTAINER | ================================== \\ -->
<section class="section-container">
	<?php include('includes/main-header.php'); ?>
	<main class="main-container">
		<h1>Página | Alterar</h1>
		<hr>
		<?php 
		$pagina = $banco->query('select * from pagina where id = "'.$id.'"')->fetch(); ?>
		<form action="<?=HOST_GERENCIADOR?>core/alterar_pagina.php" method="post" enctype="multipart/form-data">

 

			<!-- // ==================================== | SEO | ==================================== \\  -->
			<article>
				<h3>Meta</h3>
			    <div class="form-group">
			        <label>Title</label>
		            <input type="text" value="<?=$pagina['meta_title']?>" name="meta_title" class="form-control">
			    </div>

			    <div class="form-group">
			        <label>Description</label>
		            <input type="text" value="<?=$pagina['meta_description']?>" name="meta_description" class="form-control">
			    </div>

			    <div class="form-group">
			        <label>Keywords</label>
		            <input type="text" value="<?=$pagina['meta_keywords']?>" name="meta_keywords" class="form-control">
			    </div>
		    </article>


			<article>
				<h3>Meta Og</h3>

			    <div class="form-group">
			        <label>Título <small>(og:title)</small></label>
		            <input type="text" value="<?=$pagina['meta_og_title']?>" name="meta_og_title" class="form-control">
			    </div>

			    <div class="form-group">
			        <label>Site Name <small>(og:site_name)</small></label>
		            <input type="text" value="<?=$pagina['meta_og_site_name']?>" name="meta_og_site_name" class="form-control">
			    </div>



			    <div class="form-group">
		    		<div class="imagem-padrao imagem-1">
		    			<?php 
		    			if(file_exists('../source/assets/og-image/'.$pagina['meta_og_imagem'])){ ?>
		    			<img src="<?=HOST?>source/assets/og-image/<?=$pagina['meta_og_imagem']?>" alt="">
		    			<?php }else{ ?>
		    			<img src="<?=HOST_GERENCIADOR?>source/images/user.webp" alt="">
		    			<?php } ?>
		    			<aside>
		    				<button type="button" class="btn btn-danger remover-imagem" data-imagem-nova="user.webp"><i class="fa fa-close"></i> Remover Imagem</button>
		    				<button type="button" class="btn btn-success adicionar-imagem"><i class="fa fa-plus"></i> Adicionar Imagem</button>						
		    			</aside>
		            	<input name="meta_og_imagem" type="file" class="form-control imagem" data-receptor="imagem-1" accept=".webp,.jpg,.png">
		            	<input type="hidden" name="meta_og_imagem_antiga" value="<?=$pagina['meta_og_imagem']?>">
		    		</div>
		    		<code class="x_panel">
		    			A imagem <b>precisa</b> ser 500x500 e ter peso menor ou igual a 500kb <b>Precisa ser jpg / png</b>
		    		</code>
	    		</div>


			    <div class="form-group">
			        <label>Descrição <small>(og:description)</small></label>
		            <input type="text" value="<?=$pagina['meta_og_description']?>" id="meta_og_description" name="meta_og_description" class="form-control">
			    </div>
			</article>
			<!-- \\ ================================================================================= //  -->


			<article>
			    <div class="form-group">
			        <label>Url Configurável</label>
		            <input type="text" value="<?=$pagina['url_configuravel']?>" name="url_configuravel" class="form-control">
			    </div>
			</article>


			<footer>
				<button class="btn btn-success">
					<i class="fa-solid fa-check"></i> Salvar
				</button>
				<input type="hidden" value="<?=$pagina['id']?>" name="id_pagina">
				<a class="btn btn-default" href="<?=HOST_GERENCIADOR?>listar_pagina/<?=$pagina['id_idioma']?>">
					<i class="fas fa-long-arrow-left"></i> Retornar
				</a>
			</footer>
			
		</form>

	</main>
</section>
<!-- \\ ======================================================================================== // -->

