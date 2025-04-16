<?php include('includes/header.php') ?>



	



<!-- // ================================== | MAIN CONTAINER | ================================== \\ -->
<section class="section-container">
	<?php include('includes/main-header.php'); ?>
	<main class="main-container">
		<?php 
		if($usuario['permissao'] == "1"){ ?>
		<h1>Configurações | Tema | Alterar</h1>
		<hr>
		<form action="<?=HOST_GERENCIADOR?>core/alterar_tema.php" method="post" enctype="multipart/form-data">

			
			<style>
				.temas article img{
					width: 100%;
				}
				.temas hgroup{
					display: flex;
					align-items: center;
					justify-content: center;
				}
				.temas article h2{
					font-size: 1.5rem;
					color: black;
					margin-bottom: 0;
					margin-left: 1rem;
				}
			</style>
			<section class="temas row m-0">
				<?php 
				$dados_site = $banco->query('select * from dados_site where id = "1"')->fetch();
				$ls_tema = $banco->query('select * from tema')->fetchAll();
				foreach($ls_tema as $tema){ ?>
					<article class="col-lg-4 p-3">
						<figure>
							<img src="<?=HOST_GERENCIADOR?>source/tema/imagem/<?=$tema['imagem']?>" alt="<?=$tema['nome']?>">
						</figure>
						<hgroup>
							<input type="radio" <?php if($tema['id'] == $dados_site['id_tema']){echo"checked";} ?> name="id_tema" value="<?=$tema['id']?>">
							<h2><?=$tema['nome']?><h2>
						</hgroup>
					</article>
				<?php } ?>
			</section>




			<footer>
				<button class="btn btn-success">
					<i class="fa-solid fa-check"></i> Salvar
				</button>
			</footer>
			
		</form>
		<?php }else{ ?>
			<h1><b>Você não possui acesso a essa página</b></h1>
		<?php } ?>


	</main>
</section>
<!-- \\ ======================================================================================== // -->

