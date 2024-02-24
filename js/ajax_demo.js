$(document).ready(function (e) {
    // $("#myform").on('submit',(function(e) {
    //  e.preventDefault();

    // var fname = $("#firstname").val();
    // var lname = $("#lastname").val();
    // var email = $("#email").val();
    // var password = $("#password").val();
    // var confirm_password = $("#confirm_password").val();
    // var image = $('#image').val();
    
    // if (fname === "" ||lname === "" ||email === "" ||password === "" ||confirm_password === "" || image ==='') {
    //   $('#result').text("All  filed are required").css({'color':'red'});
    // }else if(password !== confirm_password){
    //   $('#result').text("password are not same").css({'color':'red'});
    // }
    //  else{
    //  $.ajax({
    //   url: "register_process.php",
    //   type: "POST",
    //   data:  new FormData(this),
    //   contentType: false,
    //   cache: false,
    //   processData:false,
    //   beforeSend : function(){
    //   $("#result").fadeOut();
    //    },
    //   success: function(data){
    //     if(data === '1'){
    //       $('#result').text("Registered succesfully, you can Login!!!").css({'color':'green'})
    //     }else{
    //       $('#result').text(data).css({'color':'red'});
    //     }
    //      },
    //     error: function(data){
    //       $('#result').text(data).css({'color':'red'});
    //      }          
    //    });
    // }
    // }));

    //delete........................
    $('.delete').on('click',function(){
      var id= $(this).data('id');
      var confirm_alert= confirm("are you sure?");
      if(confirm_alert == true){
        $.ajax({
          url: 'delete.php',
          type: 'post',
          data:{id:id},
          success: function(response){
            if(response === "1"){
              window.location.reload();
              // $(this).closest("tr").fadeout();
            }else{
              alert("can't delete");
            }
            
            // window.location.reload();
          }
        });
      }
    });

    $('.edit').on('click',function(){
      var id= $(this).data('id');
      $.ajax({
        url: 'update.php',
        type: 'post',
        data:{id:id},
        success: function(response){
        }
        });
    });
   });