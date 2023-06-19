// Função pesquisa USUÁRIO
function PesquisaConteudoUsu(){
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			document.getElementById('bloco-list-pag').innerHTML = ajax.responseText;
		}
	}
	
	// Variável com os dados que serão enviados ao PHP
	if(document.getElementById('search_usu').value!=''){
		var dados = "nome="+document.getElementById('search_usu').value;
	
		ajax.open("GET", "filtro_usu.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html");
		ajax.send();
	}
}