<!-- // ================================== | HEADER MAIN | ===================================== \\ -->
<div class="row m-0 justify-content-end px-3 mb-3">


	<button class="logout">
		Sair <i class="fas fa-close ms-2"></i>
	</button>
</div>
<script>
	$(".logout").click(function () {
	    const swalWithBootstrapButtons = Swal.mixin({
	        customClass: {
	            confirmButton: "btn btn-success",
	            cancelButton: "btn btn-danger",
	        },
	        buttonsStyling: false,
	    });

	    swalWithBootstrapButtons
	        .fire({
	            title: "Você quer realmente sair?",
	            text: "",
	            icon: "warning",
	            showCancelButton: true,
	            confirmButtonText: "Sim, desejo sair",
	            cancelButtonText: "Não, cancelar",
	            reverseButtons: true,
	        })
	        .then((result) => {
	            if (result.isConfirmed) {
	                let timerInterval;
	                Swal.fire({
	                    title: "Estamos te deslogando!",
	                    html: "Aguarde <b></b> milisegundos.",
	                    timer: 3500,
	                    timerProgressBar: true,
	                    didOpen: () => {
	                        Swal.showLoading();
	                        const b = Swal.getHtmlContainer().querySelector("b");
	                        timerInterval = setInterval(() => {
	                            b.textContent = Swal.getTimerLeft();
	                        }, 100);
	                    },
	                    willClose: () => {
	                        clearInterval(timerInterval);
	                    },
	                }).then((result) => {
	                    /* Read more about handling dismissals below */
	                    if (result.dismiss === Swal.DismissReason.timer) {
	                        window.location.href = "<?=HOST_GERENCIADOR?>core/logout.php";
	                        console.log("I was closed by the timer");
	                    }
	                });
	            } else if (
	                /* Read more about handling dismissals below */
	                result.dismiss === Swal.DismissReason.cancel
	            ) {
	                swalWithBootstrapButtons.fire("Ok", "Você pode permanecer no gerenciador", "success");
	            }
	        });
	});

</script>
<!-- \\ ======================================================================================== // -->