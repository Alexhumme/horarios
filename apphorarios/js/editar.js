function editarRegistro(id, tbl) {
	// esta funcion solo funciona si los datos estan dentro de un tag cada uno, y estos a su vez dentro del tag principal del registro
	const data = document.querySelector("#" + id);
	let form = `<form method = "POST" action = "../../php/${tbl}/edit.php">`;
	for (let child of data.children) {
		child.classList[0] != "opt"
			? (form += `
                <div>
                    <label>${child.classList[0]}</label>
                    <input 
                        name = "${child.classList[0].toLowerCase()}"
                        class = "swal2-input" 
                        type = "${
							child.classList.length == 1
								? "text"
								: child.classList[1]
						}" 
                        id = "${child.classList[0]}"
                        placeholder = "${child.classList[0]}" 
                        value = ${
							child.classList[1] == "checkbox"
								? child.innerHTML == "1" || child.innerHTML == 1
									? "'1' checked"
									: "'1'"
								: child.innerHTML
						}
                        ${child.classList[0] == "Id" ? "readonly" : ""}
                        >
                </div>
                `)
			: stop;
	}
	form +=
		"<input class='swal2-confirm swal2-styled' type='submit' value='actualizar'><input class='swal2-cancel swal2-styled' type='reset' value='reset'></form>";
	console.log(form);

	Swal.fire({
		title: "editar",
		html: form,
		showConfirmButton: false,
	});
}
