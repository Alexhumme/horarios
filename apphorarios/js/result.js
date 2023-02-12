const params = new URLSearchParams(window.location.href);

const toast = Swal.mixin({
	toast: true,
	position: "top-right",
	showConfirmButton: false,
	timer: 3000,
	timerProgressBar: true,
});
if (params.get("su") == "1") {
	toast.fire({
		icon: "success",
		title: "solicitud exitosa",
	});
} else if (params.get("er") == "1") {
	toast.fire({
		icon: "error",
		title: "no se pudo realizar la solicitud",
	});
}
