<?php include('includes/header.php') ?>



<!-- // ================================== | MAIN CONTAINER | ================================== \\ -->
<section class="section-container">
	<?php include('includes/main-header.php'); ?>
	<main class="main-container">
		<h1>Cadastros Gerais | Usuário | Cadastrar</h1>
		<hr>
		<form action="<?=HOST_GERENCIADOR?>core/cadastrar_usuario.php" method="post" enctype="multipart/form-data">
			<div class="col-lg-6">
				<div class="imagem-padrao imagem-1">
					<img src="<?=HOST_GERENCIADOR?>images/user.webp" alt="">
					<aside>
						<button type="button" class="btn btn-danger remover-imagem" data-imagem-nova="user.webp"><i class="fa fa-close"></i> Remover Imagem</button>
						<button type="button" class="btn btn-success adicionar-imagem"><i class="fa fa-plus"></i> Adicionar Imagem</button>						
					</aside>
		        	<input name="imagem" type="file" class="form-control imagem" data-receptor="imagem-1" accept=".webp,.jpg,.png">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label>Nome</label>
					<input name="nome" type="text" required minlength="4" class="form-control">
				</div>
				<div class="form-group">
					<label>Cargo</label>
					<input name="cargo" type="text" minlength="4" class="form-control">
				</div>
				<div class="form-group">
					<label>E-Mail</label>
					<input name="email" type="email" minlength="4" class="form-control">
				</div>
				<div class="form-group">
					<label>Telefone</label>
					<input name="telefone" type="tel" minlength="4" class="form-control">
				</div>				
			</div>

			<div class="form-group">
				<label>Login</label>
				<input name="login" data-tabela-para-verificar="usuario" type="text" required minlength="4" class="form-control">
				<span></span>
			</div>
			<div class="form-group">
				<label>Senha</label>
				<div class="d-flex w-100 flex-wrap flex-lg-nowrap">
					<input name="senha" type="text" required minlength="4" class="form-control">
					<button type="button" class="btn btn-danger gerar-senha">
						<i class="fa fa-lock"></i> Gerar senha aleatória
					</button>
					<script>
						$(".gerar-senha").click(function(){
							$(this).parent(".w-100").children("input").val(Math.random().toString(36).substring(0, 7));
						});
					</script>
				</div>
			</div>


			<div class="form-group">
				<label>Permissões</label>
				<?php 
				$ls_permissao = $banco->query('select * from permissao order by nivel asc')->fetchAll();
				foreach($ls_permissao as $permissao){ ?>
				<div class="x_panel d-flex justify-content-between align-items-center">
					<label for="permissao_<?=$permissao['id']?>"><?=$permissao['nome']?></label>
					<input id="permissao_<?=$permissao['id']?>" name="permissao" type="radio" required value="<?=$permissao['id']?>">
				</div>
				<?php } ?>
			</div>







			<footer>
				<button class="btn btn-success">
					<i class="fa-solid fa-check"></i> Salvar
				</button>
				<a class="btn btn-default" href="<?=HOST_GERENCIADOR?>etapa-do-funil">
					<i class="fas fa-long-arrow-left"></i> Retornar
				</a>
			</footer>
			
		</form>

	</main>
</section>
<!-- \\ ======================================================================================== // -->

