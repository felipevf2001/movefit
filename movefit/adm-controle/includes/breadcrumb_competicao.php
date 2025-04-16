
<!-- // =============================== | BREADCRUMB COMPETIÇÃO | ============================== \\ -->
<style>
	.breadcrumb-competicao{
		width: 100%;
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		margin-bottom: 1.5rem;
	}
	.breadcrumb-competicao *{
		transition: 0.3s;
	}

	.breadcrumb-competicao .selected{
		background: <?=$cor_azul?>;
		color: white;
	}


	.breadcrumb-competicao > small{
		display: none;
		margin: 0.5rem 0rem;
		width: 100%;
		text-align: center;
	}
	.breadcrumb-competicao > a{
		width: 100%;
		background: #eee;
		box-shadow: none;
		border-radius: 4px;
		padding: 0.5rem 0.75rem;
		margin-bottom: 0;
		margin: 0.25rem 0rem;
		font-size: 0.80rem;
		display: block;
		line-height: 130%;
	}
	.breadcrumb-competicao > a > span{
		font-weight: bold;
		font-size: 0.90rem;
		display: block;
	}

	.breadcrumb-competicao > *:last-child{
		display: none;
	}
	.breadcrumb-competicao > *:nth-last-child(2){
		background: <?=$cor_2?>;
		color: white
	}

	/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */
	@media(min-width: 992px){

		.breadcrumb-competicao > small{
			width: auto;
			display: block;
			margin: 0rem 0.5rem;
		}
		.breadcrumb-competicao > a{
			width: auto;
		}

	}
</style>
<section class="breadcrumb-competicao">
	<?php 
	// // ====================== | JOGO ABERTO | ====================== \\
	if($competicao_jogo_aberto){ ?>
	<a href="<?=HOST_GERENCIADOR?>alterar_competicao_jogo_aberto/<?=$competicao_jogo_aberto['id']?>">
		Jogo Aberto:
		<span><?=$competicao_jogo_aberto['nome']?></span>
	</a>
	<small>/</small>
	<?php }
	// \\ ====================== | JOGO ABERTO | ====================== // 



	// // ====================== | COMPETIÇÃO | ======================= \\
	if($competicao){ ?>
	<a href="<?=HOST_GERENCIADOR?>alterar_competicao/<?=$competicao['id']?>">
		Competição:
		<span><?=$competicao['nome']?></span>
	</a>
	<small>/</small>
	<?php }
	// \\ ====================== | COMPETIÇÃO | ======================= //



	// // =================== | COMPETIÇÃO EQUIPE | =================== \\
	if(
		$site == "listar_competicao_equipe"
		||
		$site == "alterar_competicao_equipe"
	){ ?>
	<a href="<?=HOST_GERENCIADOR?>listar_competicao_equipe/<?=$competicao['id']?>">
		Competição:
		<span>Equipes</span>
	</a>
	<small>/</small>
	<?php }
	// \\ =================== | COMPETIÇÃO EQUIPE | =================== //



	// // =================== | COMPETIÇÃO EQUIPE | =================== \\
	if($competicao_equipe){ ?>
	<a href="<?=HOST_GERENCIADOR?>listar_competicao_equipe/<?=$competicao['id']?>">
		Equipe:
		<span><?=$competicao_equipe['nome']?></span>
	</a>
	<small>/</small>
	<?php }
	// \\ =================== | COMPETIÇÃO EQUIPE | =================== //



	// // ==================== | COMPETIÇÃO FASE | ==================== \\
	if($competicao_fase){ ?>
	<a href="<?=HOST_GERENCIADOR?>alterar_competicao_fase/<?=$competicao_fase['id']?>">
		Fase:
		<span><?=$competicao_fase['nome']?></span>
	</a>
	<small>/</small>
	<?php }
	// \\ ==================== | COMPETIÇÃO FASE | ==================== //



	// // ================== | COMPETIÇÃO GRUPO | ===================== \\
	if($competicao_grupo){ ?>
	<a href="<?=HOST_GERENCIADOR?>alterar_competicao_grupo/<?=$competicao_grupo['id']?>">
		Grupo:
		<span><?=$competicao_grupo['nome']?></span>
	</a>
	<small>/</small>
	<?php }
	// \\ ================== | COMPETIÇÃO GRUPO | ===================== //



	// // ================ | COMPETIÇÃO GRUPO TABELA | ================ \\
	if($site == "listar_competicao_equipe_grupo"){ ?>
	<a href="<?=HOST_GERENCIADOR?>listar_competicao_equipe_grupo/<?=$competicao_grupo['id']?>">
		Equipes do Grupo:
		<span><?=$competicao_grupo['nome']?></span>
	</a>
	<small>/</small>
	<?php }
	// \\ ================ | COMPETIÇÃO GRUPO TABELA | ================ /



	// // ================ | COMPETIÇÃO GRUPO TABELA | ================ \\
	if($site == "alterar_competicao_grupo_tabela"){ ?>
	<a href="<?=HOST_GERENCIADOR?>alterar_competicao_grupo_tabela/<?=$competicao_grupo['id']?>">
		Tabelas do Grupo:
		<span><?=$competicao_grupo['nome']?></span>
	</a>
	<small>/</small>
	<?php }
	// \\ ================ | COMPETIÇÃO GRUPO TABELA | ================ //



	// // ================== | COMPETIÇÃO RODADA | ==================== \\
	if($competicao_rodada){ ?>
	<a href="<?=HOST_GERENCIADOR?>alterar_competicao_rodada/<?=$competicao_rodada['id']?>">
		Rodada:
		<span><?=$competicao_rodada['nome']?></span>
	</a>
	<small>/</small>
	<?php }
	// \\ ================== | COMPETIÇÃO RODADA | ==================== //


	
	// // =================== | COMPETIÇÃO JOGO | ===================== \\
	if($competicao_jogo){ ?>
	<a href="<?=HOST_GERENCIADOR?>alterar_competicao_jogo/<?=$competicao_jogo['id']?>">
		Jogo:
		<span><?=$competicao_jogo['nome']?></span>
	</a>
	<small>/</small>
	<?php }
	// \\ =================== | COMPETIÇÃO JOGO | ===================== // ?>	

</section>
<!-- \\ ======================================================================================== // -->
