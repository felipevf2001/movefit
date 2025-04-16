<?php 
include('../includes/control-core-gerenciador.php');


// // ========================================= | CRUD | ========================================= \\
$lead  = $banco->query('select * from lead        where id = "'.$_POST['id_lead'].'"')->fetch();
$etapa = $banco->query('select * from etapa_funil where id = "'.$lead['id_etapa'].'"')->fetch();

$sql['id_usuario']     = $_SESSION['ID_GERENCIADOR'];
$sql['id_etapa']       = $etapa['id'];
$sql['id_lead']        = $lead['id'];
$sql['comentario']     = $_POST['comentario'];
$sql['data_cadastro']  = date('Y-m-d H:i:s',strtotime('+4 hours'));
$sql['data_alteracao'] = date('Y-m-d H:i:s',strtotime('+4 hours'));

$action = $banco->prepare('insert into lead_comentario
        (
            id_usuario,
            id_etapa,
            id_lead,
            comentario,
            data_cadastro,
            data_alteracao
        )
  values(
            :id_usuario,
            :id_etapa,
            :id_lead,
            :comentario,
            :data_cadastro,
            :data_alteracao
        )')->execute($sql);
// \\ ============================================================================================ //




// // =================================== | MOSTRAR COMENTÁRIOS | ================================ \\
$ls_comentario = $banco->query('select * from lead_comentario where id_lead = "'.$lead['id'].'" order by data_cadastro desc')->fetchAll();
foreach($ls_comentario as $comentario){
    $usuario = $banco->query('select * from usuario where id = "'.$comentario['id_usuario'].'"')->fetch(); ?>
    <article>
        <header>
            <img 
                src="<?=HOST_GERENCIADOR?>imagens_usuario/<?=$usuario['imagem']?>" 
                alt="Usuario: <?=$usuario['id']?> - <?=$usuario['nome']?>"
                title="Usuario: <?=$usuario['id']?> - <?=$usuario['nome']?>"
            >
            <h2><?=$usuario['nome']?></h2>
            <small><?=date("d/m/Y | H:i:s", strtotime($comentario['data_cadastro']))?></small>
        </header>
        <p>
            <?=$comentario['comentario']?>
        </p>
    </article>
<?php }
// \\ ============================================================================================ // ?>

