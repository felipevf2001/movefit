<?php 
include('../includes/control-core-gerenciador.php');

// // ================================================ | LOGIN | ================================================ \\
$usuario = anti_injection($_POST['usuario']);
$senha   = sha1(md5($_POST['senha']));


$usuario_gerenciador = $banco->query("select * from usuario where login = '".$usuario."' and senha = '".$senha."'")->fetch();

if($usuario_gerenciador){

	$_SESSION['ACESSO_GERENCIADOR'] = true;
	$_SESSION['ID_GERENCIADOR']     = $usuario_gerenciador['id'];


	// // ================ | GRAVA LOGIN NO BD | ================ \\
	$sql_historico_gerenciador['id_usuario'] = $usuario_gerenciador['id'];
	$sql_historico_gerenciador['acao']       = "Login";
	$sql_historico_gerenciador['ip']         = get_ip();

	$insert_historico_gerenciador = $banco->prepare('insert into historico_gerenciador (
																							id_usuario,
																							acao,
																							ip
																						)
																				 values(
																							:id_usuario,
																							:acao,
																							:ip
																						)')->execute($sql_historico_gerenciador);
	// \\ ======================================================= //


}
// \\ =========================================================================================================== //




// // =============== | ACTION == TRUE | =============== \\
if($usuario_gerenciador){ 
	$titulo   = "Logado com sucesso!";
	$location = HOST_GERENCIADOR;
	$icon     = "success";
}
// \\ ================================================== //
// // =============== | ACTION == FALSE | ============== \\
else{
	$titulo   = "Credênciais incorretas!";
	$location = HOST_GERENCIADOR."login";
	$icon     = "error";
}
// \\ ================================================== // ?>





<script>
    $(window).on("load",function(){
        let timerInterval;
        Swal.fire({
            title: "<?=$titulo?>",
            html: "Você será redirecionado em <b></b> milisegundos.",
            timer: 2000,
            timerProgressBar: true,
            icon: '<?=$icon?>',        
            didOpen: () => {
                Swal.showLoading();
                const b = Swal.getHtmlContainer().querySelector("b");
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft();
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
                window.location.href = "<?=$location?>";
            },
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                
            }
        });


    });


</script>
