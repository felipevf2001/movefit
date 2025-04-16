<?php include('includes/header.php'); ?>


<!-- // ========================================== | MOVEFIT APP | ========================================== \\ -->
<style type="text/css">
	.nao-logado{
		min-height: 68svh;
		justify-content: center;
	}



	.form-movefit{
		width: 100%;
		display: flex;
		flex-wrap: wrap;
		max-width: 450px;
	}

	.form-movefit .form-group{
		width: 100%;
		margin-bottom: 1rem;
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}

	.form-movefit .form-control{
		background: transparent;
		color: white;
		min-height: 50px;
		border: 1px solid #fff;
	}

	.form-movefit *{
		transition: 0.3s;
	}

	.form-group .image-preview{
		width: 200px;
		aspect-ratio: 16 / 16;
		margin-bottom: 1rem;
	}

	.form-movefit label{
		width: 100%;
	}

	.form-movefit h2{
		width: 100%;
		text-align: center;
		margin-bottom: 1.5rem;
	}

	.form-movefit p{
		width: 100%;
		line-height: 100%;
		padding: 0.25rem 0rem;
		margin-bottom: 0rem;
		color: <?=$cor_verde?>;
	}

	.form-movefit .image-preview img{
		width: 100%;
		border: 2px solid <?=$cor_verde?>;
		height: 100%;
		border-radius: 198px;
		object-fit: cover;
		object-position: center;
	}

	.form-movefit h2:not(:first-child){
		margin-top: 3rem;

	}

	.form-movefit button.atualizar{
		width: 100%;
		text-align: center;
		background: <?=$cor_verde_contraste?>;
		border: 2px solid <?=$cor_verde_contraste?>;
		color: <?=$cor_preto?>;
		border-radius: 8px;
		font-weight: bold;
		font-size: 1.35rem;
		padding: 0.75rem 2rem;
	}
	.form-movefit button.atualizar:hover{
		background: transparent;
		color: white;
	}

	.form-movefit select option{
		color: <?=$cor_preto?>;
	}

	.form-movefit .adicionar-depoimento{
		width: auto;
		border-radius: 4px;
		background: <?=$cor_verde_contraste?>;
		font-size: 1rem;
		border: none;
		padding: 0.5rem 0.95rem;
		font-weight: bold;
		color: <?=$cor_preto?>;
	}
	.form-movefit .adicionar-depoimento i{
		color: <?=$cor_preto?>;
	}

	/* // ============== | FORM-DEPOIMENTO | ============== \\	*/
	.form-depoimento{
		padding: 1rem;
		border-radius: 16px;
		background: #132840;
		justify-content: end !important;
	}
	
	.form-depoimento button{
		width: 50px;
		background: crimson;
		aspect-ratio: 16 / 13;
		color: white;
		border: none;
		border-radius: 4px;
	}
	/* \\ ================================================= //	*/



</style>
<?php 
// // ============================== | CLIENTE LOGADO | ============================== \\
if($cliente_logado){ ?>
<section class="interna">
	<main>


		<form action="<?=HOST?>core/movefit-app.php" method="post" enctype="multipart/form-data" class="form-movefit">
			
			<h2>Informações Pessoais</h2>

			<div class="form-group">
				<div class="image-preview">
					<img src="<?=HOST?>source/cliente/imagem/<?=$cliente_logado['imagem']?>" alt="Cliente">
				</div>
				<label>Adicione uma Imagem <small>(Coloque sua foto!)</small></label>
				<input type="file" name="imagem" accept=".png, .jpg, .webp" class="form-control adicionar-imagem">
				<input type="hidden" value="<?=$cliente_logado['imagem']?>" name="imagem_antiga">
			</div>

			<div class="form-group">
				<label>Nome</label>
				<input type="nome" name="nome" value="<?=$cliente_logado['nome']?>" required class="form-control">
			</div>

			<div class="form-group">
				<label>E-Mail</label>
				<input type="email" name="email" value="<?=$cliente_logado['email']?>" readonly class="form-control email">
			</div>

			<div class="form-group">
				<label>Senha</label>
				<input type="password" name="senha" class="form-control senha">
				<p>
					*Deixe os campos <b>senha</b> e <b>confirmar senha</b> em branco para manter a senha atual.
				</p>
				<input type="hidden" name="senha_antiga" value="<?=$cliente_logado['senha']?>">
			</div>

			<div class="form-group">
				<label>Confirme sua Senha</label>
				<input type="password" name="confirmar_senha" class="form-control">
			</div>


			<hr>


			<h2>Meus Depoimentos</h2>

			<button class="adicionar-depoimento mb-3" type="button">
				<i class="fas fa-plus"></i> Adicionar
			</button>
			<div class="container-depoimentos">
				
				<?php 
				// // =================== | DEPOIMENTO | =================== \\
				$ls_depoimento = $banco->query('
					select * from depoimento
						where
							id_cliente = "'.$cliente_logado['id'].'"
								order by id asc')->fetchAll();

				foreach($ls_depoimento as $depoimento){ ?>
				<div class="form-depoimento form-group">
					<div class="form-group">
						<label>Nota</label>
						<select name="depoimento_nota[]" required class="form-control">
							<option value="" selected disabled>Selecione uma Nota</option>
							<?php 
							for($i = 0; $i <= 10; ++$i){ ?>
							<option value="<?=$i?>" <?=$depoimento['nota'] == $i ? "selected" : ""?>><?=$i/2?> Estrelas</option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label>Título</label>
						<input type="text" name="depoimento_titulo[]" value="<?=$depoimento['titulo']?>" required class="form-control">
					</div>

					<div class="form-group">
						<label>Descrlção</label>
						<textarea name="depoimento_descricao[]" required class="form-control" rows="4"><?=$depoimento['descricao']?></textarea>
					</div>
					<button type="button" class="excluir-depoimento"><i class="fas fa-times"></i></button>
				</div>
				<?php }
				// \\ ====================================================== // ?>


			</div>

			<div class="form-group mt-4">
				<button class="atualizar">Atualizar</button>
			</div>

		</form>


		
	</main>
</section>
<?php }
// \\ ================================================================================ //

// // ============================ | CLIENTE NÃO LOGADO | ============================ \\
else{ ?>
<section class="interna nao-logado">
	<main>

		<h2 class="text-center">
			Não está <b>Logado</b>? 
			<br>
			Logue ou crie sua conta acessando nosso menu! <b>Login</b> <i class="fas fa-arrow-right"></i> <b>Inscreva-se</b>
		</h2>		

	</main>
</section>
<?php }
// \\ ================================================================================ // ?>
<!-- \\ ===================================================================================================== // -->



<script type="text/javascript">
	$(".excluir-depoimento").click(function(){

		var elemento = $(this);

		Swal.fire({
			title: "Deseja realmente Excluir Este depoimento? É uma ação permanente",
			showDenyButton: true,
			showCancelButton: false,
			confirmButtonText: "Excluir",
			denyButtonText: `Não Excluir`
		}).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.isConfirmed) {
		  	Swal.fire("Lembre-se de Atualizar para confirmar a Exclusão", "", "success");
		  	elemento.parent(".form-depoimento").remove();
			}
		});


	});


	$(".adicionar-depoimento").click(function(){
		Swal.fire("Card adicionado ao fim da seção de Depoimetos! Preencha as informações ou faça sua exclusão!", "", "success");



		$(".container-depoimentos").append(`

			<div class="form-depoimento form-group">
				<div class="form-group">
					<label>Nota</label>
					<select name="depoimento_nota[]" required class="form-control">
						<option value="" selected disabled>Selecione uma Nota</option>
						<?php 
						for($i = 0; $i <= 10; ++$i){ ?>
						<option value="<?=$i?>" ><?=$i/2?> Estrelas</option>
						<?php } ?>
					</select>
				</div>

				<div class="form-group">
					<label>Título</label>
					<input type="text" name="depoimento_titulo[]" required class="form-control">
				</div>

				<div class="form-group">
					<label>Descrlção</label>
					<textarea name="depoimento_descricao[]" required class="form-control" rows="4"></textarea>
				</div>
				<button type="button" class="excluir-depoimento"><i class="fas fa-times"></i></button>
			</div>

		`);


	});

</script>

<?php include('includes/footer.php'); ?>