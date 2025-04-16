<?php include('includes/header.php'); ?>





<!-- // ================================= | TRANSFORME SUA JORNADA FITNESS | ================================ \\ -->
<style type="text/css">


.transforme > main{
	flex-wrap: nowrap;
	flex-direction: column;
	align-items: center;
}

.transforme h1{
	width: 100%;
	text-align: center;
	font-weight: 700;
	color: #D6DDE6;
	margin: 0rem;
	margin-bottom: 2rem;
	text-wrap: balance;
	font-size: 2.5rem;
	line-height: 100%;
}


.transforme p{
	width: 100%;
	text-align: center;
	text-wrap: balance;
	color: #D6DDE6;
	margin-bottom: 0rem;
}



.transforme nav{
	display: flex;
	flex-wrap: nowrap;
	align-items: center;
	margin-top: 3rem;
}

.transforme nav > *:first-child{
	margin-right: 1rem;
}






/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */
@media(min-width: 992px){	


	.transforme h1{
		font-size: 4.5rem;
	}

	.transforme p{
		width: 90%;
		font-size: 1.35rem;
	}

	.transforme nav{
		margin-top: 6rem;
	}


}

</style>
<section id="inicio" class="interna transforme">
	<main>
		

		<h1>Transforme sua jornada fitness</h1>

		<p>
			Descubra nossos planos personalizados, elaborados especialmente para se adequar ao seu estilo de vida. 
			Esses planos são projetados não apenas para atender às suas necessidades, mas também para te capacitar 
			em sua jornada rumo à realização de seus objetivos com facilidade e eficiência.
		</p>

		<nav>
			<a class="teste-gratis" href="">
				Teste Grátis
			</a>

			<a class="fale-conosco" href="">
				Fale Conosco
			</a>
		</nav>

	</main>
</section>
<!-- \\ ===================================================================================================== // -->


<script type="text/javascript">
	$(document).ready(function(){

		$(".fale-conosco, .teste-gratis").click(function(e){

			e.preventDefault();
			e.stopPropagation();

			Swal.fire({
				title: "O Botão está Funcionando!",
				text: "Só está sem link por enquanto!!",
				icon: "success"
			});

		});

	});
</script>







<!-- // ========================================== | UI MOVEFIT | =========================================== \\ -->
<style type="text/css">

.ui-movefit{
	position: relative;
}
.ui-movefit *{
	transition: 0.3s;
}
.ui-movefit:before{
	content: '';
	z-index: -1;
	width: 150%;

	aspect-ratio: 16 / 16;
	position: absolute;
	bottom: 35%;
	background: #ffffff;

	background: linear-gradient(180deg, rgb(8, 15, 23, 15%) 42%, rgba(137, 235, 0, 35%) 230%);
}


.ui-movefit a{
	width: 100%;
	max-width: 1066px;
}

.ui-movefit a img{
	width: 100%;
	border: 1px solid #323941;
	border-radius: 12px;
}
.ui-movefit a:hover{
	transform: scale(1.02);
	filter: saturate(120%);
}


/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */
@media(min-width: 992px){	


	.ui-movefit:before{

		background: radial-gradient(circle, rgb(8, 15, 23, 15%) 42%, rgba(137, 235, 0, 35%) 230%);

	}


}

</style>
<section id="inicio" class="interna ui-movefit">
	<main>
		
		<a href="<?=HOST?>source/home/ui-movefit.webp" data-fancybox="ui-movefit" data-caption="UI Movefit, Veja nosso Aplicativo!">
			<img src="<?=HOST?>source/home/ui-movefit.webp" alt="Movefit UI">
		</a>

	</main>
</section>
<!-- \\ ===================================================================================================== // -->
















<!-- // =========================================== | BENEFÍCIOS | ========================================== \\ -->
<style type="text/css">

.titulo-movefit{
	width: 100%;
 	color: #E4DAD7;
 	text-align: center;
}


.card-beneficio{
	padding-bottom: 1rem;
	display: flex;
}
.card-beneficio,
.card-beneficio *{
	transition: 0.3s;
}

.card-beneficio:hover main{
	transform: scale(1.03) translateY(-2px);
}
.card-beneficio:hover h2{
	color: <?=$cor_verde?>;
}

.card-beneficio > main{
	width: 100%;
	height: 100%;
	display: flex;
	flex-wrap: wrap;
	align-items: start;
	padding: 1.5rem;
	background: <?=$cor_preto_fraco?>;
	border-radius: 12px;
	border: 1px solid #FFFFFF29

}

.card-beneficio h2{
	width: 100%;
	font-size: 1.5rem;
	line-height: 100%;
	margin-bottom: 1rem;
	color: #E4DAD7;
}

.card-beneficio p{
	margin-bottom: 0rem;
}

.card-beneficio img{
	width: 48px;
	margin-bottom: 1rem;
}


/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */
@media(min-width: 992px){	


	.titulo-movefit{
		text-align: left;
		font-size: 2.5rem;
	}


	.card-beneficio{
		padding: 1rem;
		padding-left: 0rem;
	}

	.card-beneficio > main{
		padding: 2rem;
		border-radius: 22px;
	}

}

</style>
<section id="beneficios" class="interna">
	<main>

		<h2 class="titulo-movefit mb-4 mb-lg-0">Benefícios</h2>
		
		<?php 
		// // ========================= | BENEFÍCIO | ========================= \\
		$ls_beneficio = array(
			array(
				"imagem"    => "mallet.svg",
				"nome"      => "Transações rápidas e seguras",
				"descricao" => "Uma ferramenta notável com suporte excepcional. Não poderia pedir mais.",
			),
			array(
				"imagem"    => "info.svg",
				"nome"      => "Interface amigável ao usuário",
				"descricao" => "Uma ferramenta notável com suporte excepcional. Não poderia pedir mais.",
			),
			array(
				"imagem"    => "info.svg",
				"nome"      => "Suporte 24 horas",
				"descricao" => "Uma ferramenta notável com suporte excepcional. Não poderia pedir mais.",
			),
			array(
				"imagem"    => "info.svg",
				"nome"      => "Planos de preços flexíveis",
				"descricao" => "Uma ferramenta notável com suporte excepcional. Não poderia pedir mais.",
			),
			array(
				"imagem"    => "info.svg",
				"nome"      => "Integração sem costura",
				"descricao" => "Uma ferramenta notável com suporte excepcional. Não poderia pedir mais.",
			),
			array(
				"imagem"    => "analise.svg",
				"nome"      => "Análises abrangentes",
				"descricao" => "Uma ferramenta notável com suporte excepcional. Não poderia pedir mais.",
			),
		);
		foreach($ls_beneficio as $beneficio){ ?>
		<section class="card-beneficio col-12 col-lg-4">
			<main>
				<img src="<?=HOST?>source/home/beneficio/<?=$beneficio['imagem']?>" alt="<?=$beneficio['nome']?>">
				<h2><?=$beneficio['nome']?></h2>
				<p><?=$beneficio['descricao']?></p>
			</main>
		</section>
		<?php }
		// \\ ================================================================= // ?>


	</main>
</section>
<!-- \\ ===================================================================================================== // -->














<!-- // ========================================== | DEPOIMENTOS | ========================================== \\ -->
<style type="text/css">
.container-depoimento{
	width: 100%;
	display: flex;
	flex-wrap: nowrap;
	user-select: none;
	margin-top: 2rem;
	position: relative;
}

.depoimento h2{z-index: 2}

.depoimento > main{
	overflow-x: hidden;
	position: relative;
}
.depoimento > main:before,
.depoimento > main:after{
	content: '';
	width: 80px;
	height: 100%;
	background: linear-gradient(90deg, transparent, #080F17);

	z-index: 1;
	position: absolute;
	right: 0;
	top: 0;
}

.depoimento > main:after{
	right: initial;
	left: 0;
	transform: rotateY(180deg);
}


.container-depoimento::-webkit-scrollbar {
  display: none;
}

.depoimento{
	border-bottom: 2px solid #383D44;
}


.card-depoimento{
	width: 100%;
	display: flex;
	min-width: 300px;
	padding-right: 1rem;
}

.card-depoimento > main{
	width: 100%;
	display: flex;
	flex-wrap: wrap;
	border: 1px solid #383D44;
	padding: 1rem;
	background: <?=$cor_preto_fraco?>;
	border-radius: 8px;
}


/* // ========= | HEADER | ========= \\ */
.card-depoimento header{
	width: 100%;
	display: flex;
	flex-wrap: nowrap;
	align-items: center;
	margin-bottom: 1.5rem;
}

.card-depoimento header figure{
	width: 25%;
	aspect-ratio: 16 / 16;
	border-radius: 180px;
	margin-bottom: 0rem;
	margin-right: 1rem;
	overflow: hidden;
}
.card-depoimento header figure img{
	width: 100%;
	height: 100%;
	object-fit: cover;
	object-position: center;
}

.card-depoimento header aside{
	width: 100%;
	display: flex;
	flex-wrap: wrap;
	align-items: center;
}

.card-depoimento header p{
	width: 100%;
	margin-bottom: 0.5rem;
	line-height: 100%;
	color: white;
	font-weight: 500;
}

.card-depoimento header .nota{
	width: 100%;
	display: flex;
	flex-wrap: nowrap;
}
.card-depoimento header .nota img{
	width: 15px;
	margin-right: 0.15rem;
}
/* \\ ============================== // */

.card-depoimento .titulo{
	width: 100%;
	color: <?=$cor_verde?>;
	font-size: 1.10rem;
	margin-bottom: 0.75rem;
}

.card-depoimento p{
	font-weight: 400;
}


/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */
@media(min-width: 992px){	


	.card-depoimento > main{
		border-radius: 16px;
		padding: 1.5rem;
	}

}

</style>
<section id="depoimentos" class="interna depoimento">
	<main>

		<h2 class="titulo-movefit">Depoimentos</h2>


		<section class="container-depoimento">
			<?php 
			// // ================ | NOTA | ================ \\
			function nota_depoimento($nota){
				if(is_numeric($nota)){

					$quantidade_inteiro = $nota / 2;

					/*
						Pega a nota (de 0 a 10), e divide por dois, pois a cada dois, temos uma estrela
						enquanto o número do contador for menor que o número arredondado para baixo
						coloca estrelas, caso não, ele para, e após verifica se falta colocar meia 
						estrela depois
					*/
					for($i = 0; $i < floor($quantidade_inteiro); ++$i){ ?>
					<img src="<?=HOST?>source/cliente/imagem/nota.svg" alt="Depoimento <?=$dados_site['nome']?>">
					<?php }

					/*
						Se o número arrendondado para baixo, for diferente do número original, 
						significa que ele é um número float
					*/
					if(floor($quantidade_inteiro) != $quantidade_inteiro){ ?>
					<img src="<?=HOST?>source/cliente/imagem/meia-nota.svg" alt="Depoimento <?=$dados_site['nome']?>">
					<?php }

					return true;
				}else{
					return array(false, 'Um Número precisa ser passado');
				}


			}
			// \\ ========================================== //

			// // ======================= | DEPOIMENTO | ====================== \\
			$ls_depoimento = $banco->query('
				select * from depoimento
					where
						publicar = "1"
							order by posicao asc')->fetchAll();
			foreach($ls_depoimento as $depoimento){
			$cliente = $banco->query('
				select * from cliente
					where
						id = "'.$depoimento['id_cliente'].'"')->fetch(); ?>
			<section class="card-depoimento">
				<main>
					<header>
						<figure>
							<img 
								src="<?=HOST?>source/cliente/imagem/<?=$cliente['imagem']?>" 
								alt="Depoimento na <?=$dados_site['nome']?>. <?=$depoimento['nome']?> | <?=$depoimento['descricao']?>"
							>
						</figure>
						<aside>
							<p><?=$cliente['nome']?></p>
							<div class="nota">
								<?php nota_depoimento($depoimento['nota']); ?>
							</div>
						</aside>
					</header>
					<p class="titulo"><?=$depoimento['titulo']?></p>
					<p><?=$depoimento['descricao']?></p>
				</main>
			</section>
			<?php }
			// \\ ============================================================= // ?>
		</section>

	</main>
</section>



<script>
$(document).ready(function() {
  const $track = $('.container-depoimento');
  const speed = 0.5; // pixels por frame (mude para controlar a velocidade)

  // Duplicar os itens para simular o loop
  $track.append($track.html());

  let x = 0;

  function animate() {
    x -= speed;
    if (Math.abs(x) >= $track[0].scrollWidth / 2) {
      x = 0; // reinicia a posição
    }

    $track.css('transform', `translateX(${x}px)`);

    requestAnimationFrame(animate);
  }

  animate();
});
</script>
<!-- \\ ===================================================================================================== // -->















<!-- // ============================================ | GALERIA | ============================================ \\ -->
<style type="text/css">


.galeria a{
	width: 40%;
	padding: 0.25rem;
	aspect-ratio: 16 / 12;
	flex: 1 0 auto;
	max-height: 50vh;
}

.galeria *{
	transition: 0.3s;
}

.galeria a img{
	width: 100%;
	height: 100%;
	filter: saturate(0%) brightness(40%);
	border-radius: 8px;
	border: 1px solid #777777;
	object-fit: cover;
	object-position: center;
}

.galeria a:hover img{
	transform: scale(1.03);
	filter: saturate(40%) brightness(70%);
}

.galeria a:nth-of-type(4n + 1) {
  width: 60%;
}
.galeria a:nth-of-type(4n + 2) {
  width: 40%;
}
.galeria a:nth-of-type(4n + 3) {
  width: 40%;
}
.galeria a:nth-of-type(4n + 4) {
  width: 60%;
}


/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */
@media(min-width: 992px){	

	.galeria a{
		padding: 0.75rem;
		padding-right: 1.5rem;
		padding-left: 0rem;
		aspect-ratio: 16 / 12;
	}

	.galeria a img{
		border: 2px solid #777777;
		border-radius: 16px;
	}

}


</style>
<section id="galeria" class="interna galeria">
	<main>
		
		<h2 class="titulo-movefit">Galeria</h2>

		<?php 
		// // ======================== | GALERIA | ======================== \\
		$ls_galeria = $banco->query('
			select * from galeria
				order by posicao asc')->fetchAll();
		foreach($ls_galeria as $galeria){
		$alt = $galeria['nome'] ? $galeria['nome'] : $dados_site['nome']; ?>
		<a 
			href="<?=HOST?>source/galeria/<?=$galeria['imagem']?>" 
			data-fancybox="galeria"
			data-caption="<?=$alt?>"
		>
			<img 
				src="<?=HOST?>source/galeria/<?=$galeria['imagem']?>" 
				alt="<?=$alt?>"
				title="<?=$alt?>"
			>
		</a>
		<?php }
		// \\ ============================================================= // ?>


	</main>
</section>
<!-- \\ ===================================================================================================== // -->





<?php include('includes/footer.php'); ?>