window.onload = function() {
    var botoes = document.getElementsByTagName("button");
    for(var i in botoes) {
	botoes[i].onclick = function() {
	    window.location += this.name;
	}
    }
}