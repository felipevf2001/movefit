
<!-- // ============================== | ALERTA QUE APARECERÁ EM TODOS OS CORE | ============================== \\ -->

<?php 
error_reporting(0);
ini_set('display_errors', 0); ?>
<script>
    $(window).on("load", function () {
        let timerInterval;
        Swal.fire({
            title: "<?=$titulo?>",
            html: "Você será redirecionado em <b></b> milisegundos.",
            timer: 2000,
            timerProgressBar: true,
            icon: "<?=$icon?>",
            didOpen: () => {
                Swal.showLoading();
                const b = Swal.getHtmlContainer().querySelector("b");
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft();
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
                <?php 
                if(!$voltar){ ?>
                window.location.href = "<?=$location?>";
                <?php }else{ ?>
                window.location.replace(document.referrer);
                <?php } ?>

            },
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
            }
        });
    });



</script>

<!-- \\ ======================================================================================================= // -->