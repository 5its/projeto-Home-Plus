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
            minlength : 11
          },

          datanasc: {
            required : true,
          },

          email : {
            required : true,
            email : true
          },

          numR : {
            required : true,
            minlength : 2,
          },

          logradouro : {
            required : true,
            minlength : 3
          },

          ge : {
            required: true
          },

          bairoC : {
            required : true,
            minlength : 2
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

          email : {
            required : 'Informe o seu e-mail.',
            email : 'Informe um e-mail válido.'
          },

           logradouro : {
            required : 'Digite seu logradouro.',
            minlength : 'O logradouro deve ter pelo menos 3 caracteres.'
           },

          numR : {
            required:'Digite seu número residencial',
            minlength : 'Número minimo 01'
          },

          ge : {
            required: 'Selecione um género'
          },

          bairoC : {
            required : 'Digite seu Bairro.',
            minlength : 'Digite um bairro valido.'
          },

          telefone : {
            required : "Digite seu telefone/Celular",
            minlength : "Digite um número valido"
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