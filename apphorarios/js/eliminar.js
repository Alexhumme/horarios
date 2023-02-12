function confirmarDelete(id, tabla, s) {
	Swal.fire({
		title: "Eliminar el registro?",
		text: `El registro (${id}) de (${tabla}) no lo podras recuperar!`,
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: `<a href="../../php/${tabla}/del.php?id=${id}&s=${s}" method="get" name="id" id=${id} class="confirm-del">Eliminar</a>`,
		cancelButtonText: "Cancelar",
	});
}
