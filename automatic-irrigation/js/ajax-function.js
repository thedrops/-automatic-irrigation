$(document).ready(function(){

    // Delete 
    $('.delete').click(function(){
     var elemento = this;
     var id = this.id;
     
 
     // AJAX Request
     $.ajax({
      url: 'excluir.php',
      type: 'POST',
      data: { id:id },
      success: function(response){
   
       // Removendo a tupla 
       $(elemento).closest('tr').css('background','tomato');
       $(elemento).closest('tr').fadeOut(800, function(){ 
       $(this).remove();
       });
   
      }
     });
   
    });
   
   
    $('.cadastro-usuario').click(function(){
        var nomeUsuario =  $("input[type=text][name=nome_usuario]").val();
        var nomeLogin =  $("input[type=text][name=nome_login]").val();
        var senha =  $("input[type=password][name=senha]").val();
        var email =  $("input[type=text][name=email]").val();
        var endereco =  $("input[type=text][name=endereco]").val();
        var validacao= false;

        var regExp = /^[\w]+@[\w]+\.[\w|\.]+$/;
        
        $('#resposta').children().remove();
        //Verificando cadastro
        if(nomeUsuario == ""){
            validacao = true;
            $('#resposta').append("<p class=' lime accent-1 blue-text text-darken-2 '>Preencha o campo Nome Completo</p>");
        }

        if(nomeLogin== ""){
            validacao = true;
            $('#resposta').append("<p class=' lime accent-1 blue-text text-darken-2 '>Preencha o campo Nome de Usuário</p> ");
        }

        if(senha == ""){
            validacao = true;
            $('#resposta').append("<p class=' lime accent-1 blue-text text-darken-2 '>Preencha o campo Senha</p>");
        }

        if(regExp.test(email) == false){
            validacao = true;
            $('#resposta').append("<p class=' lime accent-1 blue-text text-darken-2 '>Formato de email inválido</p>");
        }
        else if(email == ""){
            validacao = true;
            $('#resposta').append("<p class=' lime accent-1 blue-text text-darken-2 '>Preencha o campo Email</p>");
        }

        if(endereco == ""){
            validacao = true;
            $('#resposta').append("<p class=' lime accent-1 blue-text text-darken-2 '> Preencha o campo Endereço</p>");
        }
    
    if(validacao == false){
    // AJAX Request
     $.ajax({
        url: 'cadastro-usuario-sql.php',
        type: 'POST',
        data: { nome_usuario:nomeUsuario , nome_login:nomeLogin , senha:senha,email:email,endereco:endereco },
        success: function(response){
            if(response == "sucesso"){
            alert("Cadastro realizado com sucesso!");
        }
        else{
            
            $('#resposta').append("<p class=' red accent-1 blue-text text-darken-2 '>Não foi possivel realizar o cadastro,tente novamente Completo</p>");
         
    
        } 
    }

       });
    }

    });

   });
