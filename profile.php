<?php

session_start();

$ad = $_SESSION['admin'];
if (!isset($_SESSION['admin'])) {
    header('location: adminLogin.php');
  }


include ('includes/db.php');
include ('includes/header.php')


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
.submit_btn {
    background-color: #0066ff;
    font-size: 14px;
    font-weight: bold;
    margin-left: 65%;
}

.bold {
    font-weight: bold;
}


.form {
    box-shadow: 2px 4px 13px grey;
    width: 45%;
    margin: 1.5% 30% 0% 0%;
    padding: 5% 5% 2% 5%;
    border-radius: 10px;
    position: relative;
}

.form-group {
    margin-top: -1.5%;
}

@media (min-width: 0px) and (max-width: 969px) {


    .form {
        box-shadow: 2px 4px 13px grey;
        width: 100%;
        margin: 12% 0%;
        padding: 15% 5% 2% 5%;
        border-radius: 10px;
        position: relative;
    }

    .form-group {
        margin-top: -4%;
    }

    .wrap {
        overflow: hidden;
    }

    .submit_btn {
        background-color: #0066ff;
        font-size: 14px;
        font-weight: bold;
        margin-left: 70%;
    }
}

.adminLoginForm label {
    font-size: 13px;
    font-weight: 600;
}

.wrap {
    overflow: hidden;
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
                <div class="container tabss">

                    <div class="form">
                        <div id="msg"></div>

                        <!-- beginning of form1 -->
                        <?php 
                        if(isset($_GET['editid'])){
                            $id = $_GET['editid'];
                        }
                        $data = selectOne('admin', ['id' => $id]) ?>

                        <h6>Admin Details</h6>
                        <form method="post" enctype="multipart/form-data" class="adminLoginForm" style='margin-top:3%'>

                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" name="fullname" class="form-control bold" id='fullname'
                                    value="<?php  echo $data['Fullname'] ?>" placeholder="Add Admin's Fullname..."
                                    disabled />

                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control bold" id='email'
                                    data-validate="Valid email is required: ex@abc.xyz"
                                    value="<?php  echo $data['Email'] ?>" placeholder="Add Admin's Email......"
                                    disabled />
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" class="form-control bold" id='phone'
                                    value="<?php  echo $data['Phone'] ?>" placeholder="Add Admin's Phone Number......"
                                    disabled />
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control bold" id='password'
                                    value="<?php  echo $data['Pwd'] ?>" placeholder="Add Admin's Password ......"
                                    disabled />
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>



</body>

</html>