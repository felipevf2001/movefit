<!-- // =================================== | LOGIN | =================================== \\ -->
<style>
	html,body{
		height: 100%;
	}
	.login{
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		background-image: url('<?=HOST_GERENCIADOR?>source/images/bg-login.webp');
		background-position: center;
		background-size: cover;
		height: 100%;
		transition: 0.3s;
	}
	.login *{
		transition: 0.3s;
	}
	.login main{
		width: 100%;
		height: 100%;
		display: flex;
		align-items: center;		
		justify-content: center;

	}
	.login main form{
		width: 90%;
		max-width: 550px;
		background: <?=$cor_background?>;
		border-radius: 32px;
		display: flex;
		flex-wrap: wrap;
		padding: 1rem;
	}
	.login main form > *{
		width: 100%;
	}
	.login main form img{
		max-height: 70px;
		max-width: 100%;
		object-fit: contain;
		object-position: center;
	}
	.login main form figure{
		text-align: center;
	}
	.login main form hr{
		width: 100%;
		background: rgb(0, 0, 0, 70%);
		height: 1px;
		opacity: 1;
		margin: 1rem 0rem;
	}
	.login main form span{
		background: <?=$cor_1?>;
		padding: 0.4rem 1.6rem;
		margin-right: 1rem;
		border-radius: 12px 12px 0px 0px;
	}
	.login main form a{
		color: #FC6D00;
	}
	.login main form a:hover,
	.login main form a:focus,
	.login main form a:active{
		transform: scale(1.01);
		font-weight: bold;
	}

	.login main form label{
		min-width: 50px;
		max-width: 50px;
		text-align: right;
		font-weight: 600;
		margin-right: 0.8rem;
	}
	.login .menu{
		display: flex;
		align-items: center;
	}
	.login .form-group{
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		justify-content: center;
	}

	.login .acesso{
		padding: 2rem;
		background: #001447;
		border-radius: 12px;
	}
	.login .acesso button{
		background: #FC6D00;
		border-radius: 4px;
		padding: 0.4rem 2rem;
		color: white;
		min-width: 50px;
		display: flex;
		justify-content: center;
		align-items: center;
		font-weight: bold;
		border: none;
		text-transform: uppercase;
		color: white;
	}
	.login .acesso button:hover,
	.login .acesso button:focus,
	.login .acesso button:active{
		background: white;
		color: #FC6D00;
	}
	.login .form-control{
		border-radius: 4px;
		padding-left: 1.5rem;
		border: none;
	}
	.login .form-control:hover,
	.login .form-control:focus,
	.login .form-control:active{
		box-shadow: none;
		transform: scale(1.01);
	}
	.login input,
	.login button{
		height: 45px;
	}

	@media(min-width: 992px){
		.login input,
		.login button{
			height: 40px;
		}
		.login main form hr{
			margin: 1.5rem 0rem;
		}

		.login main form img{
			max-height: 90px;
		}

		.login main form{
			padding: 3rem;
		}

		.login .form-group{
			display: flex;
			flex-wrap: nowrap;
		}
	}
</style>
<section class="login">
	<main>
		<form action="<?=HOST_GERENCIADOR?>core/login.php" method="post">
			<figure>
				<img src="<?=HOST?>source/assets/logo/<?=$dados_site['imagem_logo']?>" class="logo" alt="<?=$dados_site['nome']?>">
			</figure>
			
			<div class="acesso">
				<div class="form-group mb-2">
					<input type="text" placeholder="Usuário" class="form-control" name="usuario" required>
				</div>
				<div class="form-group mb-3">
					<input type="password" placeholder="********" class="form-control" name="senha" required>
				</div>
				<div class="form-group">
					<button>
						<i class="fas fa-lock me-3"></i> Login
					</button>
				</div>
			</div>
		</form>
	</main>
</section>
<!-- \\ ================================================================================= // -->