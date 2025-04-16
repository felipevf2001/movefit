<?php 
// // ===================== | VERIFICA USUÁRIO DUPLICADO | ===================== \\
if($_POST['verifica_usuario'] == "true"){
include('../adm-controle/lib/config.php');

$cliente_exist = $banco->query('select * from cliente where email = "'.anti_injection($_POST['email']).'"')->fetch();
if($cliente_exist){ ?>

	<script>
		$(".email").val("");

		Swal.fire({
			title: "Já Existe um Usuário com este e-mail!",
			text: "Utilize outro ou resgate sua senha!",
			icon: "warning"
		});
	</script>

	<?php }
die(); 
}
// \\ ========================================================================== // ?>




<!-- // ================================= | TRANSFORME SUA JORNADA FITNESS | ================================ \\ -->
<style type="text/css">

.formulario-movefit{
	position: fixed;
	left: 0%;
	top: 0%;
	width: 100%;
	height: 100%;
	background: rgb(0, 0, 0, 25%);
	display: none;
	align-content: center;
	align-items: center;
	justify-content: center;
	padding: 2rem 1rem;
	z-index: 9999;
}

.swal2-container{
	z-index: 99999;
}

.formulario-movefit[style*="display: block;"]{
	display: flex !important;
}

.formulario-movefit > main{
	width: 100%;
	max-width: 600px;
	max-height: 100%;
	overflow-y: auto;
	padding: 2rem 1.5rem;
	background: white;
	position: relative;
	border-radius: 12px;
}

.formulario-movefit *{
	color: <?=$cor_preto?>;
}

/* // ================ | HEADER | ================ \\ */
.formulario-movefit header{
	width: 100%;
	display: flex;
	flex-wrap: nowrap;
	justify-content: center;
	margin-bottom: 1rem;
}

.formulario-movefit header div{
	width: auto;
	padding: 0.35rem 1.25rem;
	border: 1px solid #666;
	color: black;
	font-weight: bold;
	cursor: pointer;
	border-collapse: collapse;
	border-radius: 0px 6px 6px 0px;
}

.formulario-movefit header div:first-child{
	border-radius: 6px 0px 0px 6px;
	border-right: none;
}

.formulario-movefit .selected{
	background: <?=$cor_verde_contraste?>;
}
/* \\ ============================================ // */


.formulario-movefit h2{
	text-align: center;
}


.formulario-movefit form *{
	transition: 0.3s;
}

.formulario-movefit .form-group{
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
}

.formulario-movefit .form-group:not(:last-child){
	margin-bottom: 1rem;
}

.formulario-movefit .form-control{
	min-height: 50px;
}


.formulario-movefit .form-group label{
	width: 100%;
}

.formulario-movefit button{
	background: <?=$cor_preto?>;
	border-radius: 4px;
	padding: 0.5rem 1rem;
	border: 2px solid <?=$cor_preto?>;
	border-radius: 10px;
	color: white;
	font-weight: bold;
}

.formulario-movefit button i{
	color: white;
	margin-right: 0.5rem;
}

.formulario-movefit button:not([disabled="disabled"]):hover{
	background: transparent;
	border: 2px solid <?=$cor_verde_contraste?>;
	color: <?=$cor_preto?>;
}

.formulario-movefit button[disabled="disabled"]{
	opacity: 50%;
}

.formulario-movefit button:hover i{
	color: <?=$cor_preto?>;
}	

.formulario-movefit .inscreva-se{
	display: none;
}

.formulario-movefit .fechar{
	position: sticky;
	left: 100%;
	top: 0rem;
	cursor: pointer;
	font-size: 1.5rem;
}

.formulario-movefit .image-preview{
	width: 100px;
	margin-bottom: 0.5rem;

}
.formulario-movefit .image-preview img{
	aspect-ratio: 16 / 16;
	object-fit: cover;
	object-position: center;
	border-radius: 180px;
}

/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */
@media(min-width: 992px){	

	.formulario-movefit > main{
		padding: 2rem;
	}

}
</style>


<section class="formulario-movefit">
	<main>
		<i class="fas fa-times fechar"></i>
		<header>
			<div data-formulario="login" class="selected">
				Login
			</div>
			<div data-formulario="inscreva-se">
				Inscreva-se
			</div>
		</header>


		<form action="<?=HOST?>core/login.php" method="post" class="login">
			
			<h2>Faça o Login</h2>
			

			<div class="form-group">
				<label>E-Mail</label>
				<input type="email" name="email" required class="form-control">
			</div>

			<div class="form-group">
				<label>Senha</label>
				<input type="password" name="senha" required class="form-control">
			</div>

			<div class="form-group">
				<button><i class="fas fa-sign-in-alt"></i> Entrar</button>
			</div>

		</form>


		<form action="<?=HOST?>core/inscreva-se.php" method="post" class="inscreva-se" enctype="multipart/form-data">

			<h2>Inscreva-se</h2>

			<div class="form-group">
				<div class="image-preview"></div>
				<label>Adicione uma Imagem <small>(Coloque sua foto!)</small></label>
				<input type="file" name="imagem" accept=".png, .jpg, .webp" required class="form-control adicionar-imagem">
			</div>

			<div class="form-group">
				<label>Nome</label>
				<input type="nome" name="nome" required class="form-control">
			</div>

			<div class="form-group">
				<label>E-Mail</label>
				<input type="email" name="email" required class="form-control email">
			</div>

			<div class="form-group">
				<label>Senha</label>
				<input type="password" name="senha" required class="form-control senha">
			</div>

			<div class="form-group">
				<label>Confirme sua Senha</label>
				<input type="password" name="confirmar_senha" required class="form-control">
			</div>

			<div class="form-group">
				<button><i class="fas fa-user-plus"></i> Cadastrar</button>
			</div>

		</form>



	</main>
</section>
<!-- \\ ===================================================================================================== // -->






<script type="text/javascript">
	// // =================== | SELECIONA FORMULÁRIO | =================== \\
	$(".formulario-movefit header div").click(function(){
		var elemento = $(this);

		$(".formulario-movefit header div").removeClass();
		elemento.addClass("selected");

		$(".formulario-movefit form").fadeOut(0);
		$("."+elemento.data("formulario")).fadeIn(100);


	});

	$(".formulario-movefit .fechar").click(function(){

		$(".formulario-movefit").fadeOut(150);

	});
	// \\ ================================================================ //


	// // ================== | MUDA IMAGEM SELECINADA | ================== \\
	$(document).ready(function () {
	    $('.adicionar-imagem').on('change', function (e) {
	        const arquivo = e.target.files[0];

	        if (arquivo && arquivo.type.startsWith('image/')) {
	            const leitor = new FileReader();

	            leitor.onload = function (event) {
	                $('.image-preview').html(`<img src="${event.target.result}" alt="Pré-visualização">`);
	            };

	            leitor.readAsDataURL(arquivo);
	        } else {
	            $('.image-preview').html('<p>Por favor, selecione uma imagem válida.</p>');
	        }
	    });
	});
	// \\ ================================================================ //

	// // ================ | VERIFICA SENHAS DIFERENTES | ================ \\
	$('[name="confirmar_senha"]').on("change", function(){
		var elemento = $(this);		
		if(elemento.val() != $('.senha').val()){
			
			Swal.fire({
				title: "Senhas não Coicidem!",
				text: "Confira as senhas, e confirme novamente!",
				icon: "warning"
			});
			$(".formulario-movefit .inscreva-se button").attr("disabled", true);

		}else{

			$(".formulario-movefit .inscreva-se button").attr("disabled", false);

		}	

	});
	// \\ ================================================================ //


	// // ================ | VERIFICA E-MAIL EXISTENTE | ================= \\
	$('.email').on("change", function(){

		var elemento = $(this);
		
		$.ajax({
			type: "POST",
			url:"<?=HOST?>includes/formulario-movefit.php",
			data: {
				'email': elemento.val(),
				'verifica_usuario': "true",
			},
			success:function(result){			
				$(".receptor_geral").html(result);       
			}
		});

	});
	// \\ ================================================================ //


</script>