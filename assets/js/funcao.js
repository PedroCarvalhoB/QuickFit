// Função que verifica se o navegador tem suporte AJAX
function AjaxF(){
	var ajax;
	try{
		ajax = new XMLHttpRequest();
	}catch(e){
		try{
			ajax = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e){
			try{
				ajax = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e){
				alert("Seu browser n�o da suporte � AJAX!");
				return false;
			}
		}
	}
	return ajax;
}

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
	
		ajax.open("GET", "content/usuario/crud/filtro_usu.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html");
		ajax.send();
	}
}

// Função pesquisa TREINO
function PesquisaConteudoTreino(){
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			document.getElementById('bloco-list-pag').innerHTML = ajax.responseText;
		}
	}
	
	// Variável com os dados que serão enviados ao PHP
	if(document.getElementById('search_usu').value!=''){
		var dados = "nome="+document.getElementById('search_usu').value;
	
		ajax.open("GET", "content/professor/crud/filtro_treino.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html");
		ajax.send();
	}
}

// Função pesquisa AVALIAÇÃO
function PesquisaConteudoAva(){
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			document.getElementById('bloco-list-pag').innerHTML = ajax.responseText;
		}
	}
	
	// Variável com os dados que serão enviados ao PHP
	if(document.getElementById('search_usu').value!=''){
		var dados = "nome="+document.getElementById('search_usu').value;
	
		ajax.open("GET", "content/professor/crud/filtro_ava.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html");
		ajax.send();
	}
}