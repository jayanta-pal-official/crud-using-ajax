<?php
include 'db/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regester</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


</head>

<body>
    <center>
        <strong class="mt-5" id="result"></strong>

        <h1>UPDATE</h1>
        <?PHP
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE id='$id'";
        $result = $conn->query($sql);
        foreach ($result as $value) { ?>
            <form id="update_form">
                <input type="hidden" name="id" id="id" value="<?= $value['id'] ?>">

                <label>First name :</label>
                <input type="text" name="first_name" id="first_name" value="<?= $value['firstname'] ?>" placeholder="please enter first name"><br><br>
                <label>Last name :</label>
                <input type="text" name="last_name" id="last_name" value="<?= $value['lastname'] ?>" placeholder="please enter last name"><br><br>
                <label>Email :</label>
                <input type="email" name="email" id="email" value="<?= $value['email'] ?>" placeholder="please enter email"><br><br>
               
                <label>Image :</label>
                <input type="file" name="new_image" id="new_image">
                <img src="upload/<?php echo  $value['image'] ?>" width="100px" height="100px"><br><br>
                <input type="hidden"  id="old_image" name="old_image" value="<?php echo $value['image'] ?>" >

                <input type="submit" value="Update" id="update" name="update">
            </form>
            &nbsp&nbsp&nbsp<a href="welcome.php">Back</a>
        <?php  }


        ?>


    </center>
    <script>
        $(document).ready(function(e) {
            $('#update_form').on('submit', (function(e) {
                e.preventDefault();
                var id = $("#id").val();
                var fname = $("#firstname").val();
                var lname = $("#lastname").val();
                var email = $("#email").val();

                var old_image = $('#old_image').val();

                if (fname === "" || lname === "" || email === "") {
                    $('#result').text("All  filed are required").css({
                        'color': 'red'
                    });
                } else {
                    $.ajax({
                        url: "update_process.php",
                        type: "post",
                        data: new FormData(this),
                        contentType: false,
                        // cache: false,
                        processData: false,
                        success: function(data) {
                            if(data==="can't accpeted more then 2mb"){
                                alert(data);
                            }else if(data==="allow image only!!!"){
                                alert(data);
                            }else{
                                alert(data);
                            window.location = 'welcome.php';
                            }
                            
                        },
                    });
                }

            }));
        });
    </script>
</body>

</html>