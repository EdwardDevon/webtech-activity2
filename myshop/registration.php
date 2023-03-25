<?php
require_once('config.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <style>
        .container{
            
            margin-top: 30px;

            }
        
        .col-sm-3 {

            padding: 15px;
            border-radius: 5px;
            background: rgb(238,174,202);
            background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
            }
    </style>

</head>
<body>
    
    <div>
        <?php
                       
        ?>
    </div>
    <div>
        <form action="registration.php" method="POST">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-3">
                        <h2>Registration Form</h2>
                        <p>Fill up form with correct values.</p>
                        <hr class="mb-3">
                        <label for="firstname"><b>First Name</b></label>
                        <input class="form-control" id="firstname" type="text" name="firstname"  required><br>

                        <label for="lastname"><b>Last Name</b></label>
                        <input class="form-control" id="lastname" type="text" name="lastname" required><br>

                        <label for="email"><b>Email</b></label>
                        <input class="form-control" id="email" type="email" name="email" required><br>

                        <label for="phonenumber"><b>Phone Number</b></label>
                        <input class="form-control" id="phonenumber" type="text" name="phonenumber" required><br>

                        <label for="password"><b>Password</b></label>
                        <input class="form-control" id="password" type="password" name="password" required>
                        <hr class="mb-3">
                        
                        <input class="btn btn-primary" type="submit" id="register" name="submit" value="Sign Up"><br><br>
                        <p>Already have an account?<a href="login.php"> Click here</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function(){
            $('#register').click(function(e){

                var valid = this.form.checkValidity();
                if(valid) {

                var firstname   = $('#firstname').val();
                var lastname    = $('#lastname').val();
                var email       = $('#email').val();
                var phonenumber = $('#phonenumber').val();
                var password    = $('#password').val();
                    
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: {firstname: firstname, lastname: lastname, email: email, phonenumber: phonenumber, password:
                        password},
                        success: function(data){
                            Swal.fire({
                            'title': 'Successful',
                            'text': data,
                            'type': 'success'
                            })
                        },
                        error: function(data){
                            Swal.fire({
                            'title': 'Errors',
                            'text': 'There were errors while saving the data.',
                            'type': 'error'
                            })
                        }
                    });                  
                } else{
                    
                }
            });           
        });

    </script>
</body>
</html>