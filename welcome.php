<?php
session_start();
include "db/database.php";
include './authentication.php';
echo "<center>";
echo "<h1>Welcome Page</h1>";

if(isset($_SESSION['name'])){
    echo "<h3>Welcome : ".$_SESSION['name']."</h3>";
}
echo "<a href='logout.php'>Logout</a>";
echo "</center>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  </head>
<body>
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <h1>
        all details
    </h1>
    <table class="table text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Email</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
     $sql="SELECT * FROM  user";
    $result= $conn->query($sql);
    foreach($result as $value){ ?>
        <tr>
        <td><?= $value['id'] ?></td>
        <td><?= $value['firstname'] ?></td>
        <td><?= $value['lastname'] ?></td>
        <td><?= $value['email'] ?></td>
        <td><img src="upload/<?php echo $value['image']  ?>" width="100px" height="100px" ></td>
        <td>
          <a href="update.php?id=<?php echo $value['id'] ; ?>" class="btn btn-info" >Edit</a>
          <button  name="delete"  class="btn btn-danger btn-sm delete" data-id="<?php echo $value['id']  ?>" >Delete</button>
        </td>
      </tr>
    <?php }
    ?> 
  </tbody>
</table>
<script>
$(document).ready(function(){
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
            }else{
              alert("can't delete");
            }
          }
        });
      }
    });
});
</script>


</body>
</html>
