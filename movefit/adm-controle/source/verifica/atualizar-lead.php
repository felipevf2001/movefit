<?php 
include('../includes/control-core-gerenciador.php');

error_reporting(0);

// // ========================================= | CRUD | ========================================= \\
$sql['id_etapa']       = $_POST['id_etapa'];
$sql['id_motivo']      = $_POST['id_motivo'];
$sql['id']             = $_POST['id_lead'];

$action = $banco->prepare('update lead set
        id_etapa       = :id_etapa,
        id_motivo      = :id_motivo
        where id = :id')->execute($sql);
// \\ ============================================================================================ //


// // ========================================= | CRUD | ========================================= \\
$sql_historico['id_etapa']  = $_POST['id_etapa'];
$sql_historico['id_motivo'] = $_POST['id_motivo'];
$sql_historico['id_lead']   = $_POST['id_lead'];
$sql_historico['ip']        = get_ip();

$action = $banco->prepare('insert into lead_historico
                (
                        id_etapa,
                        id_motivo,
                        id_lead,
                        ip
                )
         values(
                        :id_etapa,
                        :id_motivo,
                        :id_lead,
                        :ip
                )')->execute($sql_historico);
// \\ ============================================================================================ //

?>

<script src="<?=HOST?>js/jquery-ui-1.13.1/jquery-ui.min.js"></script>
<script src="<?=HOST?>js/funcoes.js"></script>