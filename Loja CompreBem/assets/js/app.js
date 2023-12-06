var MenuItens = document.getElementsById("MenuItens");

MenuItens.style.maxHeight = "0px";

function menucelular(){
    if(MenuItens.style.maxHeight == "0px"){
        MenuItens.style.maxHeight = "200px";
    }else{
        MenuItens.style.maxHeight = "0px";
    }
}

var produtoImg = document.getElementsById("produtosImg");
var produtoMiniatura = document.getElementsByClassName("produtosMiniatura");

produtoMiniatura[0].onclick = function(){
    produtosImg.src = produtosMiniatura[0].src;
}

produtoMiniatura[1].onclick = function(){
    produtosImg.src = produtosMiniatura[1].src;
}

produtoMiniatura[2].onclick = function(){
    produtosImg.src = produtosMiniatura[2].src;
}

produtoMiniatura[3].onclick = function(){
    produtosImg.src = produtosMiniatura[3].src;
}