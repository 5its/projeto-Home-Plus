$(document).ready(function(){
      $('#form1').validate({
      	 errorElement:"el",
      errorPlacement: function(error,element){
        element.parent("div").next("div").html(error);
      },
      
      submitHandler: function(form){
        form.submit();
      },
        rules : {

          name : {
            required : true,
            minlength : 4
          },

          cpf : {
            required : true,
            minlength : 12
          },

          datanasc: {
          	required : true,
          },

          cidade : {
          	required : true,
          	minlength : 2
          },

          email : {
            required : true,
            email : true
          },

          telefone : {
          	required : true,
          	minlength : 14,
          },

          senha : {
            required : true,
            minlength : 5,
            maxlength : 30
          },

          csenha : {
            required : true,
            equalTo : '#senha'
          }
        },
        messages : {

          name : {
            required : 'Digite o seu nome.',
            minlength : 'O seu nome deve ter no mínimo 4 caracteres.'
          },

          cpf : {
            required : 'Digite o seu CPF.',
            minlength : 'O seu CPF deve ter no mínimo 11 caracteres.'
          },

          datanasc :{
          	required : "Digite sua data de Nascimento"
           },

           cidade : {
           	required : "Digite sua cidade",
           	minlength : "A sua cidade deve ter pelo menos 2 caracteres."
           },

          email : {
            required : 'Informe o seu e-mail.',
            email : 'Informe um e-mail válido.'
          },

          telefone : {
          	required : "Digite seu telefone/Celular",
          	minlength : "Digite um número valido",
          },

          senha : {
            required : 'Informe a sua senha.',
            minlength : 'A senha deve ter, no mínimo, 5 caracteres.',
            maxlength : 'A senha deve ter, no máximo, 30 caracteres.'
          },
          csenha : {
            required : 'Confirme a sua senha.',
            equalTo : 'As senhas não se correspondem.'
          }
        }
      });
    });




