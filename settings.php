<?php
session_start();
$ad = $_SESSION['admin'];

include ('includes/db.php');
include ('includes/header.php');
if (!isset($_SESSION['admin'])) {
    header('location: adminLogin.php');
  }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../styling/fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../styling/admin.css" />
    <link rel="stylesheet" href="../styling/header.css" />
    <title>nav</title>
</head>

<style>
.method {
    border: 1px solid #17a3b84e;
    box-shadow: 2px 1px 5px 5px #17a3b84e;
    height: 240px;
    width: 50%;
    margin: 5% 25%;
    padding: 2% 5%;
    text-align: center;
}

.method h6 {
    font-size: 15px;
    opacity: .8;
}

.boxes {
    width: 90%;
    margin: 15% 5%;
    padding: 4% 6%;
    color: #fff;
    border-radius: 10px;

}

.boxes h4 {
    font-weight: 600;
}

.i i {
    font-size: 30px;
}

.i {
    margin-top: 10%;
}

.wrap {
    overflow: hidden;
    width: 100%;

}

@media (min-width: 0px) and (max-width: 969px) {

    .wrap {
        height: 500px;
    }

    .wrap_form {
        width: 100% !important;
        padding: 7%;
        margin: 15% 0% 0% 0% !important;
        box-shadow: 2px 4px 13px grey;
        border-radius: 10px;
    }
}
</style>

<body>
    <?php include ('includes/admin_nav.php') ?>
    <div class="wrap">
        <div class="row">
            <div class="col-md-2 col-lg-2 col-xl-2">
                <?php include('includes/sidenav.php') ?>
            </div>
            <div class="col-md-10 col-lg-10 col-xl-10">
                <div class="container">

                    <?php
                        
                        $result = selectOne('admin', ['Email' => $ad]);

                        $id = $result['id'];
                       
                    ?>

                    <!--Change Password-->
                    <div class='wrap_form' style=' margin-top:8%; width:70%' id='update_password' style=''>
                        <div id="msg_p"></div>
                        <form action="" method="post" enctype="multipart/form-data" class='form'>
                            <input type="hidden" name='id' value='<?php echo $id ?>' id='id'>
                            <div class="form-group">
                                <label for="payment" style="font-size:14px; font-weight:bold;">Old Password</label>
                                <input type="password" name="method" class="form-control"
                                    placeholder="Your Old password..." id='old_password' />
                            </div>
                            <div class="form-group">
                                <label for="payment" style="font-size:14px; font-weight:bold;">New Password</label>
                                <input type="password" name="method" class="form-control"
                                    placeholder="Your New password..." id='new_password' />
                            </div>
                            <div class="form-group">
                                <label for="payment" style="font-size:14px; font-weight:bold;">Retype New
                                    Password</label>
                                <input type="password" name="method" class="form-control"
                                    placeholder="Retype your New password..." id='new_password2' />
                            </div>

                        </form>
                        <button type='submit' id='submit' class='btn btn-info'
                            onclick='update_password() '>Update</button>
                    </div>

                    <div class="payment_display" id='p_display' style='display:none'>
                        <div class="payment">
                            <div class="container">
                                <div class="method " id='p_msg'>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>







    <script>
    function update_password() {
        var old = document.getElementById('old_password').value;
        var newpassword = document.getElementById('new_password').value;
        var newpassword2 = document.getElementById('new_password2').value;
        var id = document.getElementById('id').value;

        var vars = 'old_password=' + old + '&new_password=' + newpassword + '&new_password2=' + newpassword2 + '&id=' +
            id;


        var update_password = new XMLHttpRequest();
        var method = 'POST';
        var url = 'ajax/update_password.php';

        update_password.open(method, url, true);
        update_password.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        update_password.onreadystatechange = function() {
            if (update_password.readyState == 4 && update_password.status == 200) {
                var data = update_password.responseText;
                console.log(data);
                document.getElementById('msg_p').innerHTML = data;



            }
        }

        update_password.send(vars);
    }
    </script>

</body>

</html>