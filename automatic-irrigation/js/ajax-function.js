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
   
       // Removing row from HTML Table
       $(elemento).closest('tr').css('background','tomato');
       $(elelemento).closest('tr').fadeOut(800, function(){ 
       $(this).remove();
       });
   
      }
     });
   
    });
   
   });