window.onload = function() {
   
    var lis = document.getElementsByTagName("li");
    var ultimoLIClicado = lis[0];

    var funcao = function() {
	ultimoLIClicado.className = "";
	this.className = "selecionado";

	try {
	    this.getElementsByTagName("input")[0].click();
	    if(ultimoLIClicado != this) {
		this.getElementsByTagName("*")[2].focus();
	    }
	} catch(e) {}
	ultimoLIClicado = this;
    }

    for(var i = 0; i < lis.length; i++) {
	lis[i].onclick = funcao;
    }

    lis[0].click();
}