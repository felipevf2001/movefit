<?php include('includes/header.php') ?>



<!-- // ================================== | MAIN CONTAINER | ================================== \\ -->
<section class="section-container">
	<?php include('includes/main-header.php'); ?>
	<main class="main-container">
		<h1>Configurações | Configurações Geral</h1>
		<hr>
		<?php 
		$dados_site = $banco->query('select * from dados_site where id = "1"')->fetch(); ?>
		<form action="<?=HOST_GERENCIADOR?>core/dados_site.php" method="post" enctype="multipart/form-data">



			<div class="form-group col-lg-6">
				<h3>Logo</h3>
				<div class="imagem-padrao imagem-1">
					<?php
					if(file_exists("../source/assets/logo/".$dados_site['imagem_logo'])){ ?>
						<img src="<?=HOST?>source/assets/logo/<?=$dados_site['imagem_logo']?>" alt="">
					<?php }else{ ?>
						<img src="<?=HOST_GERENCIADOR?>source/images/user.webp" alt="">
					<?php } ?>
					<aside>
						<button type="button" class="btn btn-danger remover-imagem" data-imagem-nova="user.webp"><i class="fa fa-close"></i> Remover Imagem</button>
						<button type="button" class="btn btn-success adicionar-imagem"><i class="fa fa-plus"></i> Adicionar Imagem</button>						
					</aside>
		        	<input name="imagem" type="file" class="form-control imagem" data-receptor="imagem-1" accept=".webp,.jpg,.png">
		        	<input type="hidden" value="<?=$dados_site['imagem_logo']?>" name="imagem_antiga">
				</div>
				<code class="x_panel">
				    A imagem <b>precisa</b> ser 500x500 e ter peso menor ou igual a 500kb <b>Precisa ser jpg / png</b>
				</code>
			</div>

			<div class="form-group col-lg-6">
				<h3>Ícone</h3>
				<div class="imagem-padrao imagem-100">
					<?php
					if(file_exists("../source/assets/icone/".$dados_site['imagem_icone'])){ ?>
						<img src="<?=HOST?>source/assets/icone/<?=$dados_site['imagem_icone']?>" alt="">
					<?php }else{ ?>
						<img src="<?=HOST_GERENCIADOR?>source/images/user.webp" alt="">
					<?php } ?>
					<aside>
						<button type="button" class="btn btn-danger remover-imagem" data-imagem-nova="user.webp"><i class="fa fa-close"></i> Remover Imagem</button>
						<button type="button" class="btn btn-success adicionar-imagem"><i class="fa fa-plus"></i> Adicionar Imagem</button>						
					</aside>
		        	<input name="imagem_icone" type="file" class="form-control imagem" data-receptor="imagem-100" accept=".png">
		        	<input type="hidden" value="<?=$dados_site['imagem_icone']?>" name="imagem_icone_antiga">
				</div>
				<code class="x_panel">
				    A imagem <b>precisa</b> ser 350x350 e ter peso menor ou igual a 30kb <b>png</b>
				</code>
			</div>


			<div class="form-group">
				<label>Nome</label>
				<input name="nome" value="<?=$dados_site['nome']?>" type="text" class="form-control">
			</div>

			<h3 class="mt-4">Redes Sociais</h3>
			<div class="form-group">
				<label>Email</label>
				<input name="email" value="<?=$dados_site['email']?>" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label>Facebook</label>
				<input name="facebook" value="<?=$dados_site['facebook']?>" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label>Facebook ID</label>
				<div class="d-flex w-100">
					<div class="w-100">
						<input name="facebook_id" value="<?=$dados_site['facebook_id']?>" type="text" class="form-control">
					</div>
					<a target="_blank" onclick="return confirm('Ao confirmar você será redirecionado para um software que permite pegar o id!')" href="https://pt.piliapp.com/facebook/id/" class="btn btn-primary ms-1">
						<i class="fa fa-external-link"></i>
					</a>
				</div>
			</div>
			<div class="form-group col-lg-6">
				<label>Instagram</label>
				<input name="instagram" value="<?=$dados_site['instagram']?>" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label>Linkedin</label>
				<input name="linkedin" value="<?=$dados_site['linkedin']?>" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label>Twitter</label>
				<input name="twitter" value="<?=$dados_site['twitter']?>" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label>Youtube</label>
				<input name="youtube" value="<?=$dados_site['youtube']?>" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label>Tripadvisor</label>
				<input name="tripadvisor" value="<?=$dados_site['tripadvisor']?>" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label>Discord</label>
				<input name="discord" value="<?=$dados_site['discord']?>" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label>Whatsapp</label>
				<input name="whatsapp" value="<?=$dados_site['whatsapp']?>" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label>Telefone</label>
				<input name="telefone" value="<?=$dados_site['telefone']?>" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label>Endereço</label>
				<input name="endereco" value="<?=$dados_site['endereco']?>" type="text" class="form-control">
			</div>

			<h3 class="mt-4">Recaptcha</h3>
			<div class="form-group row m-0 mt-3 justify-content-center">
				<input name="recaptcha_ativo" value="1" <?php if($dados_site['recaptcha_ativo'] == "1"){echo"checked";} ?> type="checkbox" style="transform: scale(1.5); width: auto;">
				<h2 class="text-center mt-3">Ativo</h2>
			</div>
			<div class="form-group col-lg-6">				
				<label>Recaptcha Chave Site</label>
				<input name="recaptcha_chave_site" value="<?=$dados_site['recaptcha_chave_site']?>" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">				
				<label>Recaptcha Chave Secreta</label>
				<input name="recaptcha_chave_secreta" value="<?=$dados_site['recaptcha_chave_secreta']?>" type="text" class="form-control">
			</div>


			<h3 class="mt-4">Indexações</h3>
			<div class="col-lg-6 form-group">				
				<label>Sitemap</label>
				<input name="sitemap" type="file" accept="text/xml" class="form-control col-md-7 col-xs-12" />
		        <?php 
		        if(file_exists('../sitemap.xml')){ ?>
		        <a target="_blank" class="btn btn-primary" href="<?=HOST?>sitemap.xml">
		            <i class="fa fa-external-link"></i> Veja o Sitemap
		        </a>
		        <?php } ?>
			</div>
			<div class="col-lg-6 form-group">				
				<label>Robots</label>
				<input name="robots" type="file" accept="text/plain" class="form-control col-md-7 col-xs-12" />
				<?php 
				if(file_exists('../robots.txt')){ ?>
				<a target="_blank" class="btn btn-primary" href="<?=HOST?>robots.txt">
				    <i class="fa fa-external-link"></i> Veja o Robots
				</a>
				<?php } ?>
			</div>

			<div class="form-group">
			    <label>Google Analytics</label>
		        <textarea name="google_analytics" placeholder="Cole aqui o código do Google Analytics" rows="13" class="form-control"><?=$dados_site['google_analytics']?></textarea>
			</div>



			<h3 class="mt-4">Google Tag Manager</h3>

			<div class="col-lg-6 form-group">
			    <label>Head</label>
		        <textarea name="google_tag_manager_head" placeholder="Cole aqui o código do Google Tag Manager Head" rows="16" class="form-control"><?=$dados_site['google_tag_manager_head']?></textarea>
			</div>
			<div class="col-lg-6 form-group">
				<label>Body</label>
		        <textarea name="google_tag_manager_body" placeholder="Cole aqui o código do Google Tag Manager Body" rows="16" class="form-control"><?=$dados_site['google_tag_manager_body']?></textarea>
			</div>



			<article class="mt-4">
				<h3>Configurar SEO</h3>

				<div class="form-group">
				    <label>Title</label>
			        <input type="text" value="<?=$dados_site['meta_title']?>" name="meta_title" class="form-control">
				</div>

				<div class="form-group">
				    <label>Description</label>
			        <input type="text" value="<?=$dados_site['meta_description']?>" name="meta_description" class="form-control">
				</div>

				<div class="form-group">
				    <label>Keywords</label>
			        <input type="text" value="<?=$dados_site['meta_keywords']?>" name="meta_keywords" class="form-control">
				</div>

				<hr>

				<div class="form-group">
				    <label>Título <small>(og:title)</small></label>
			        <input type="text" value="<?=$dados_site['meta_og_title']?>" name="meta_og_title" class="form-control">
				</div>

				<div class="form-group">
				    <label>Site Name <small>(og:site_name)</small></label>
			        <input type="text" value="<?=$dados_site['meta_og_site_name']?>" name="meta_og_site_name" class="form-control">
				</div>



				<div class="form-group">
					<div class="imagem-padrao imagem-2">
						<?php
						if(is_file("../source/assets/og-image/".$dados_site['meta_og_imagem'])){ ?>
							<img src="<?=HOST?>source/assets/og-image/<?=$dados_site['meta_og_imagem']?>" alt="">
						<?php }else{ ?>
							<img src="<?=HOST_GERENCIADOR?>source/images/user.webp" alt="">
						<?php } ?>
						<aside>
							<button type="button" class="btn btn-danger remover-imagem" data-imagem-nova="user.webp"><i class="fa fa-close"></i> Remover Imagem</button>
							<button type="button" class="btn btn-success adicionar-imagem"><i class="fa fa-plus"></i> Adicionar Imagem</button>						
						</aside>
			        	<input name="meta_og_imagem" type="file" class="form-control imagem" data-receptor="imagem-2" accept=".jpg,.png">
			        	<input type="hidden" value="<?=$dados_site['meta_og_imagem']?>" name="imagem_og_antiga">
					</div>
					<code class="x_panel">
					    A imagem <b>precisa</b> ser 500x500 e ter peso menor ou igual a 500kb <b>Precisa ser jpg / png</b>
					</code>
				</div>
				

				<div class="form-group">
				    <label>Descrição <small>(og:description)</small></label>
			        <textarea name="meta_og_description" rows="6" class="form-control"><?=$dados_site['meta_og_description']?></textarea>
				</div>


				
			</article>


			<article>
				<h3>
					Enviar E-Mail
					<small>Configurações de envios de e-mail dos formulários</small>
				</h3>
				<div class="form-group">
					<div class="form-group col-lg-6">
						<label>E-Mail</label>
						<input 
							name="enviar_email_email" 
							value="<?=$dados_site['enviar_email_email']?>" 
							type="email" 
							class="form-control"
						>
					</div>
					<div class="form-group col-lg-6">
						<label>Senha</label>
						<input 
							name="enviar_email_senha" 
							value="<?=$dados_site['enviar_email_senha']?>" 
							type="password" 
							class="form-control"
						>
					</div>
					<div class="form-group col-lg-8">
						<label>SMTP</label>
						<input 
							name="enviar_email_smtp" 
							value="<?=$dados_site['enviar_email_smtp']?>" 
							type="text" 
							class="form-control"
						>
					</div>
					<div class="form-group col-lg-4">
						<label>Porta</label>
						<input 
							name="enviar_email_porta" 
							value="<?=$dados_site['enviar_email_porta'] ? $dados_site['enviar_email_porta'] : "587"?>" 
							type="nuber" 
							class="form-control"
						>
					</div>
				</div>
			</article>

			
			<footer>
				<button class="btn btn-success">
					<i class="fa-solid fa-check"></i> Salvar
				</button>
				<a class="btn btn-default" href="<?=HOST_GERENCIADOR?>listar_lead">
					<i class="fas fa-long-arrow-left"></i> Retornar
				</a>
			</footer>
			
		</form>

	</main>
</section>
<!-- \\ ======================================================================================== // -->

