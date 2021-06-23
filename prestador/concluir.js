// concluir.js

/**
  * Função para criar um objeto XMLHTTPRequest
  */
 function CriaRequest() {
     try{
         request = new XMLHttpRequest();
     }catch (IEAtual){

         try{
             request = new ActiveXObject("Msxml2.XMLHTTP");
         }catch(IEAntigo){

             try{
                 request = new ActiveXObject("Microsoft.XMLHTTP");
             }catch(falha){
                 request = false;
             }
         }
     }

     if (!request)
         alert("Seu Navegador não suporta Ajax!");
     else
         return request;
 }

 /**
  * Função para enviar os dados
  */
 function concluir(value) {

     // Declaração de Variáveis

     var result = document.getElementById("Resultado");
     var xmlreq = CriaRequest();

     // Exibi a imagem de progresso
     result.innerHTML = '<div class="text-center"> <div class="spinner-grow m-5" role="status" style="width: 10rem; height: 10rem;"> <span class="visually-hidden" >Loading...</span> </div> </div>';

     // Iniciar uma requisição
     xmlreq.open("GET", "conclui.php?conclui=" + value, true);

     

     // Atribui uma função para ser executada sempre que houver uma mudança de ado
     xmlreq.onreadystatechange = function(){

     	setTimeout(function(){
     		location.reload();
     	},1000);
     	

         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
         if (xmlreq.readyState == 4) {

             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "Erro: " + xmlreq.statusText;
             }
         }
     };
     xmlreq.send(null);

 }