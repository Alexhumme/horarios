class Cabecera {
	constructor(icon, titulo, itemsArray, linksArray, index = false) {
		if (index) {
			self.index = index;
		}
		self.icon = icon;
		self.titulo = titulo;
		self.items = itemsArray;
		self.links = linksArray;
		self.estructura = `<header class="header">
            <i><a href="/index.php"> ${self.icon} </a></i>
            <div>
                <ul>
        `;
		for (let itemId in self.items) {
			self.estructura += `<li><a href="${self.links[itemId]}">${self.items[itemId]}</a></li>`;
		}
		self.estructura += `
                </ul>
            </div>
        </header>
        `;
	}
	imprimir() {
		document.write(self.estructura);
	}
}

class Menu {
	constructor(icon, usuario, titulo, itemsArray, linksArray, index = false) {
		self.index = index;
		self.icon = icon;
		self.usuario = usuario;
		self.titulo = titulo;
		self.items = itemsArray;
		self.links = linksArray;
		self.estructura = `
        <aside class="container-sect menu">
            <div>
                <div class="avatar">${self.icon}</div>
                <span><b>${self.usuario}</b></span>
                <span>${self.titulo}</span>
            </div>
            <ul>
        `;
		for (let itemId in self.items) {
			self.estructura += `
            <a href="${self.links[itemId]}">
                <li class="${self.index == itemId ? "selected" : ""}">${
				self.items[itemId]
			}</li>
            </a>
            `;
		}
		self.estructura += `</ul></aside><div class="contrast"></div>`;
	}
	imprimir() {
		document.write(self.estructura);
		this.componente = document.getElementById("aside-menu");
	}
}

class Pie {
	constructor() {
		self.estructura = `
        <footer class="footer">
        <section class="bottom"> <b>© 2022 CENTRO INDUSTRIAL Y DE ENERGIAS ALTERNATIVAS -</b>  todos los derechos reservados</section>
        <section> Riohacha (La Guajira) - Colombia </section>
        </footer>
        `;
	}
	imprimir() {
		document.write(self.estructura);
	}
}

function crear_cabecera(index) {
	new Cabecera(
		"icono",
		"",
		["ingresar", "Horarios", "Contacto"],
		["#", "#", "#"],
		index
	).imprimir();
}
function crear_pie() {
	new Pie().imprimir();
}
function crear_coordinador_menu(index) {
	new Menu(
		"icono",
		"nombre del coordinador",
		"coordinador",
		["Asignaciones", "Instructores", "Ambientes", "Fichas", "Programas"],
		[
			"coordinador-asignaciones.php",
			"coordinador-instructores.php",
			"coordinador-ambientes.php",
			"coordinador-fichas.php",
			"coordinador-programas.php",
		],
		index
	).imprimir();
}
