// definir les boutons des catégories
let btnAll = document.getElementById("All");
let btnHtmlCss = document.getElementById("btnHtmlCss");
let btnJS = document.getElementById("btnJS");
let btnPhp = document.getElementById("btnPhp");

//definir les projets par langage

let hc1 = document.getElementById("HtmlCss1");
let hc2 = document.getElementById("HtmlCss2");
let hc3 = document.getElementById("HtmlCss3");
let js1 = document.getElementById("Js1");
let js2 = document.getElementById("Js2");
let php = document.getElementById("Php");


btnHtmlCss.addEventListener("click", function() {
	hc1.style.display = "contents";
	hc2.style.display = "contents";
	hc3.style.display = "contents";
	js1.style.display = "none";
	js2.style.display = "none";
	php.style.display = "none";
});

btnJS.addEventListener("click", function() {
  hc1.style.display = "none";
	hc2.style.display = "none";
	hc3.style.display = "none";
	js1.style.display = "contents";
	js2.style.display = "contents";
	php.style.display = "none";

});

btnPhp.addEventListener("click", function(){
  hc1.style.display = "none";
	hc2.style.display = "none";
	hc3.style.display = "none";
	js1.style.display = "none";
	js2.style.display = "none";
	php.style.display = "contents";

});

btnAll.addEventListener("click", function(){
  hc1.style.display = "block";
	hc2.style.display = "block";
	hc3.style.display = "block";
	js1.style.display = "block";
	js2.style.display = "block";
	php.style.display = "block";
});
