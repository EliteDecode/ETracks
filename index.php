<?php

session_start();

$ad = $_SESSION['admin'];
if (!isset($_SESSION['admin'])) {
    header('location: adminLogin.php');
  }
include ('includes/db.php');
include ('includes/header.php');

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
.tabss {
    overflow-x: scroll;

}

.wrap {
    overflow: hidden;
}

.track {
    margin-top: 4%;
}

:root {
    --white: #fff;

}

.col-3 {
    margin-top: 3%;
    margin-bottom: 1%;
}

.white {
    color: #fff;

}


a {
    text-decoration: none !important;
}

a:hover {
    color: #fff;
}

.bold {
    font-weight: bold;
}

.font-16 {
    font-size: 16px;
}

.font-14 {
    font-size: 14px;
}

.font-12 {
    font-size: 12px;
}

.font-20 {
    font-size: 20px;
}

.font-22 {
    font-size: 22px;
}

.font-30 {
    font-size: 30px;
}


@media (min-width: 0px) and (max-width: 969px) {

    .tabss {
        overflow: scroll;
        margin-top: 7%;
    }

    .wrap {
        overflow: visible;
    }

    .track {
        margin-top: 9%;
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
                <div class="container mt-3">
                    <div class="row">
                        <?php 
                    $result = selectOne('admin', ['Email' => $ad]);
                    $id = $result['id'];
                    ?>
                        <!-- My profile -->
                        <div class="col-3">
                            <a href="profile.php?editid=<?php echo $id ?>" class="white d-flex   bg-primary "
                                style="justify-content: space-between ; padding:13.5% 7%;">
                                <div class="content">
                                    <h4 class="font-30">My <br> Profile</h4>
                                </div>
                                <div class="font">
                                    <i class="fa fa-user font-30 mt-3"></i>
                                </div>
                            </a>
                        </div>

                        <!-- Total Tracks -->
                        <div class="col-3">
                            <a href="tracks.php" class="white d-flex   bg-danger "
                                style="justify-content: space-between ; padding:13.5% 7%; ">
                                <div class="content">
                                    <h4 class="font-30">Total Tracks<br>
                                        <?php 
                                    $result = selectOne('admin', ['Email' => $ad]);
                                    $name = $result['Fullname'];
                                    if($result['Admin_status'] != 'main'):
                                    ?>
                                        <?php echo count(selectAll('track', ['stats' => 'yes', 'added_by' => $name])); ?>
                                        <?php else: ?>
                                        <?php echo count(selectAll('track', ['stats' => 'yes'])); ?>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                                <div class="font">
                                    <i class="fa fa-file font-30 mt-3"></i>
                                </div>
                            </a>
                        </div>

                        <!-- Pending Tracks -->
                        <div class="col-3 ">
                            <a href="maintain.php" class="white d-flex  bg-warning"
                                style="justify-content: space-between ; padding:13.5% 7%;">
                                <div class="content">
                                    <h4 class="font-30">Pending<br>
                                        <?php 
                                    $result = selectOne('admin', ['Email' => $ad]);
                                    $name = $result['Fullname'];
                                    if($result['Admin_status'] != 'main'):
                                    ?>
                                        <?php echo count(selectAll('track', ['stats' => 'no', 'added_by' => $name])); ?>
                                        <?php else: ?>
                                        <?php echo count(selectAll('track', ['stats' => 'no'])); ?>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                                <div class="font">
                                    <i class="fa fa-file-contract font-30 mt-3"></i>
                                </div>
                            </a>
                        </div>

                        <!--Add Tracks -->
                        <div class="col-3 ">
                            <a href="add_track.php" class="white d-flex  bg-secondary"
                                style="justify-content: space-between ; padding:13.5% 7%;">
                                <div class="content">
                                    <h4 class="font-30">Add <br> Tracks</h4>
                                </div>
                                <div class="font">
                                    <i class="fa fa-plus font-30 mt-3"></i>
                                </div>
                            </a>
                        </div>

                        <!-- Total Admins -->
                        <?php 
                        $result = selectOne('admin', ['Email' => $ad]);
                        $name = $result['Fullname'];
                        if($result['Admin_status'] != 'main'):
                        ?>
                        <?php else: ?>
                        <div class="col-3 ">
                            <a href="view_admins.php" class="white d-flex  bg-dark"
                                style="justify-content: space-between ; padding:13.5% 7%;">
                                <div class="content">
                                    <h4 class="font-30">Total Admins
                                        <br><?php echo count(selectAll('admin', ['Admin_status' =>'Sub-Admin'])); ?>
                                    </h4>
                                </div>
                                <div class="font">
                                    <i class="fa fa-user-md font-30 mt-3"></i>
                                </div>
                            </a>
                        </div>
                        <?php  endif; ?>

                        <!-- Add admin -->
                        <?php 
                        $result = selectOne('admin', ['Email' => $ad]);
                        $name = $result['Fullname'];
                        if($result['Admin_status'] != 'main'):
                        ?>
                        <?php else: ?>
                        <div class="col-3 ">
                            <a href="add_admin.php" class="white d-flex  bg-info"
                                style="justify-content: space-between ; padding:13.5% 7%;">
                                <div class="content">
                                    <h4 class="font-30">Add <br> Admin</h4>
                                </div>
                                <div class="font">
                                    <i class="fa fa-plus font-30 mt-3"></i>
                                </div>
                            </a>
                        </div>
                        <?php  endif; ?>

                        <!-- settings     -->
                        <div class="col-3 ">
                            <a href="settings.php" class="white d-flex  bg-primary"
                                style="justify-content: space-between ; padding:13.5% 7%;">
                                <div class="content">
                                    <h4 class="font-30">Admin <br> Settings</h4>
                                </div>
                                <div class="font">
                                    <i class="fa fa-gears font-30 mt-3"></i>
                                </div>
                            </a>
                        </div>

                        <!--Logout-->
                        <div class="col-3 ">
                            <a href="logout.php" class="white d-flex  bg-danger"
                                style="justify-content: space-between ; padding:13.5% 7%;">
                                <div class="content">
                                    <h4 class="font-30">Logout <br> Admin</h4>
                                </div>
                                <div class="font">
                                    <i class="fa fa-sign-out font-30 mt-3"></i>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="styling/js/jquery-1.12.4.min.js"></script>

</body>

</html>