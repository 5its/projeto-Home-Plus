function adcElemento () {
  // cria um novo elemento div

  var divCont = document.createElement("div");

  	divCont.setAttribute("Class", "row");

  var divA = document.createElement("div");

  	divA.setAttribute("Class", "col");

  var inputValor = document.createElement("input");

   inputValor.setAttribute("name", "valor[]");

  	inputValor.setAttribute("type", "text");

  	inputValor.setAttribute("Class", "form-control");

  	inputValor.setAttribute("placeholder", "Valor");


  	inputValor.setAttribute("required","true");

  var simb = document.createElement("span");


  divA.appendChild(inputValor);

  var divB = document.createElement("div");

  	divB.setAttribute("Class", "col");

  var inputSe = document.createElement("input");

    inputSe.setAttribute("name", "servico[]");

  	inputSe.setAttribute("type", "text");

  	inputSe.setAttribute("Class", "form-control");

  	inputSe.setAttribute("placeholder", "Serviço");

  	inputSe.setAttribute("required","true");

  divB.appendChild(inputSe);
  
  divCont.appendChild(divB);
  divCont.appendChild(divA);
  // adiciona o novo elemento criado e seu conteúdo ao DOM

  var newDiv = document.createElement("div");

    newDiv.setAttribute("Class", "newDiv");

    newDiv.appendChild(divCont);

  var local = document.getElementById("nw");

  local.appendChild(newDiv);

  var pointer = document.getElementById('add');
}