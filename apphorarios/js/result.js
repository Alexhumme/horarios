const toast = Swal.mixin({
	toast: true,
	position: "top-right",
	showConfirmButton: false,
	timer: 3000,
	timerProgressBar: true,
});
function resultadoToast(nResultado = 0) {
	if (nResultado) {
		toast.fire({
			icon: "success",
			title: "solicitud exitosa",
		});
	} else {
		toast.fire({
			icon: "error",
			title: "no se pudo realizar la solicitud",
		});
	}
}
function getResultadoToast() {
	const params = new URLSearchParams(window.location.href);
	if (params.get("su") == "1") {
		resultadoToast(1);
	} else if (params.get("er") == "1") {
		resultadoToast(0);
	}
}
