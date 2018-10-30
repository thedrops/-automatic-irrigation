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
        var campoNullo= false;
        
        $('#resposta').children().remove();
        //Verificando cadastro
        if(nomeUsuario == ""){
            campoNullo = true;
            $('#resposta').append("<p class=' lime accent-1 blue-text text-darken-2 '>Preencha o campo Nome Completo</p>");
        }

        if(nomeLogin== ""){
            campoNullo = true;
            $('#resposta').append("<p class=' lime accent-1 blue-text text-darken-2 '>Preencha o campo Nome de Usuário</p> ");
        }

        if(senha == ""){
            campoNullo = true;
            $('#resposta').append("<p class=' lime accent-1 blue-text text-darken-2 '>Preencha o campo Senha</p>");
        }

        if(email == ""){
            campoNullo = true;
            $('#resposta').append("<p class=' lime accent-1 blue-text text-darken-2 '>Preencha o campo Email</p>");
        }

        if(endereco == ""){
            campoNullo = true;
            $('#resposta').append("<p class=' lime accent-1 blue-text text-darken-2 '> Preencha o campo Endereço</p>");
        }
    
    if(campoNullo == false){
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
