<?php

session_start();

include ('includes/connect.php');


 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styling/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../styling/fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--bootsrap-->
    <link rel="stylesheet" href="styling/css/bootstrap.min.css">
    <title>Admin Login</title>
</head>

<style>
.submit_btn {
    background-color: #0066ff;
    font-size: 14px;
    font-weight: bold;

}



.form {
    box-shadow: 2px 4px 13px #008cba;
    width: 40%;
    margin: 10% 30%;
    padding: 5% 5%;
    border-radius: 10px;
    position: relative;
}

@media (min-width: 0px) and (max-width: 969px) {

    .form {
        box-shadow: 2px 4px 13px #008cba;
        width: 90%;
        margin: 50% 5%;
        padding: 5% 5%;
        border-radius: 10px;
        position: relative;

    }
}



.adminLoginForm label {
    font-size: 13px;
    font-weight: 600;
}
</style>

<body>


    <section class="admin_wrap container-fluid">


        <!---Php script for login-->
        <div class="form">
            <div id="msg"></div>
            <form method="post" enctype="multipart/form-data" class="adminLoginForm">

                <div class="form-group">
                    <label for="email">Admin Email</label>
                    <input type="email" name="email" class="form-control" id='email' value=""
                        placeholder="Your Admin Email..." />
                </div>
                <div class="form-group">
                    <label for="password">Admin Password</label>
                    <input type="password" name="password" class="form-control" id='password' value=""
                        placeholder="Your Admin password..." />
                </div>



            </form>
            <button class="btn text-white submit_btn" name="submit" onclick='verifyadmin()'>
                LOGIN
            </button>
        </div>




    </section>




    <script>
    function verifyadmin() {



        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        var vars = 'email=' + email + '&password=' + password;


        var verify = new XMLHttpRequest();
        var method = 'POST';
        var url = 'ajax/verify_admin.php';

        verify.open(method, url, true);
        verify.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        verify.onreadystatechange = function() {
            if (verify.readyState == 4 && verify.status == 200) {
                var data = verify.responseText;
                console.log(data);
                document.getElementById('msg').innerHTML = data;
                window.location.href = data;


            }
        }

        verify.send(vars);

    }
    </script>
</body>

</html>