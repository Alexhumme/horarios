function autoGenUID() {
	const uuid = Math.floor(Math.random() * 9999999999);
	document.getElementById("id-input").value = uuid;
	console.log(uuid);
}
