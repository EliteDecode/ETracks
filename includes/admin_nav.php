<?php 
 $ad = $_SESSION['admin'];
 $row = selectOne('admin', ['Email' => $ad]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    * {

        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;

    }

    /*--------------------------NAVBAR-------------------------------*/
    nav {
        z-index: 10;
    }

    .navbar-toggler-icon {
        position: relative;
        color: #fff;
        outline: none;
    }

    @media(max-width: 767px) {
        .navbar-toggler-icon>i {
            font-size: 17px !important;
        }

    }

    .menu {
        border: 1px solid #05232c;
        width: 20%;
        color: #fff;
        min-height: 672px;
        background: #05232c;
        position: absolute;
        z-index: 10;
        margin-top: -60px;
        display: none;
    }

    @media(max-width: 767px) {
        .menu {
            width: 100%;
            min-height: 370px;
        }

        .menu-content>ul>i>li {
            list-style-type: none;
            margin-bottom: 10px;
        }
    }

    .display {
        display: block;
    }

    .hide {
        display: none;
    }

    .menu>.close>button>i {
        font-size: 20px;
        width: 30px;
        height: 25px;
        color: #fff;
    }

    .menu>.close>button {
        margin-right: 15px;
        margin-top: 30px;
        border: none;
        outline: none;

        ;
    }

    .menu-content>ul {
        margin-top: 70px;
        margin-left: 40px;
    }

    .menu-content>ul>li {
        list-style-type: none;
        margin-bottom: 30px;
    }

    .menu-content>ul>li>a {
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        color: #fff;
    }

    .menu-content>ul>li>a:hover {
        transition: .5s ease all;
        color: #17a2b8;
    }

    .menu-content>ul>li>a>i {
        padding-right: 3%;
        color: #fff;
    }

    .menu-content>ul>button {
        margin-top: 20px;
    }



    .active {
        color: #007bff !important;
    }

    .navbar {
        display: none;
    }

    .navbar .logo {
        margin-top: 4%;
        margin-left: 3%;
    }



    @media(max-width: 767px) {
        .navbar-desk {
            display: none;
        }

        .navbar {
            display: block;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    }


    .navbar-desk {
        width: 100%;
        height: 90px;
        padding: 2% 2%;
        z-index: 10 !important;
        position: relative;
    }

    .navbar-desk .container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }



    .logo h6 {
        font-size: 18px;
        color: #05232cc6;
    }

    .nav-links {
        margin-right: 0%;
        width: 60%;

    }

    .nav-links ul {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
    }

    .nav-links ul a {
        text-decoration: none;
        margin-left: 2%;
        font-size: 14px;
        font-weight: 600;
        padding: 0% 2%;

    }

    .nav-links ul a li:hover {
        color: #17a2b8;
        transition: .3s ease all;
    }

    .nav-links ul a li {
        list-style-type: none;
        color: #05232cc6;
    }
    </style>
</head>

<body>
    <section class="navbar-desk shadow">
        <div class="container">
            <div class="logo">
                <h6>Oconnects<span style='color: #17a2b8; font-family:cursive;'>Tracks.</span></h6>
            </div>

            <div>

                <h6> <i class="fa fa-user-md"></i> <?php 
                     echo $row['Fullname']; ?></h6>
            </div>

        </div>
    </section>



    <!--===================Navigation Section for Mobile=========================-->
    <nav class="navbar shadow">
        <div class="logo">
            <h6>Oconnects<span style='color: #17a2b8; font-family:cursive;'>Tracks.</span></h6>
        </div>

        <button class="navbar-toggler" type="button" style="outline: none;">
            <span>
                <i class="fa fa-bars" style="color: #fff; font-size: 25px;"></i>
            </span>
        </button>
    </nav>


    </div>
    <!--===================END Navigation Section=========================-->