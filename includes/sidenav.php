<?php

include ('includes/connect.php');

$ad = $_SESSION['admin'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    .countad {
        border: 1px solid #00c3ff;
        background: #00c3ff;
        font-weight: bolder;
        font-size: 8px;
        border-radius: 100px;
        padding: 0% 2%;
        margin-left: 1.5%;
        position: absolute;
        color: #fff;
    }

    .sidenav {
        border: 1px solid #085e79;
        height: 860px;
        background-color: var(--white);
        z-index: 1111;
        display: block;

    }

    .sidenav ul a li {
        list-style-type: none;
    }

    .show {
        display: block;
    }

    .sidenav ul {
        text-align: center;
        padding-top: 15%;
    }

    .sidenav ul a {
        display: flex;
        flex-direction: row;
        border-top: 1px solid #f7f7f72a;
        border-bottom: 1px solid #f7f7f72a;
        padding: 7% 0% 7% 8%;
        color: var(--white);
        font-size: 14px;
        text-decoration: none;
    }

    .sidenav ul a:hover {
        background-color: #008cba;
        border-bottom: 1px solid #008cba;
        color: #fff;
    }

    .sidenav ul a i {
        font-size: 14px;
        margin-left: 4%;
        margin-top: 3%;
    }

    #open,
    #close {
        display: none;
        margin: 3%;
        position: absolute;
        z-index: 1111;
    }

    @media (min-width: 768px) and (max-width: 969px) {
        .sidenav {
            display: none;
            position: absolute;
            width: 100%;
            z-index: 1;
            height: 600px;
            background-color: #fff;
        }

        #open {
            display: block;
        }

        .sidenav ul {
            text-align: center;
            margin-top: 16% !important;
            padding-top: 0% !important;
        }
    }

    @media (min-width: 0px) and (max-width: 767px) {
        .sidenav {
            display: none;
            position: absolute;
            width: 60%;
            z-index: 1;
            height: 600px;
            background-color: #fff;
        }

        #open {
            display: block;
        }

        .sidenav ul {
            text-align: center;
            margin-top: 16% !important;
            padding-top: 0% !important;
        }


    }
    </style>
</head>

<body>

    <i class="fa fa-bars" style="color: #085e79; font-size: 25px;" id='open'></i>
    <i class="fa fa-close" style="color: #085e79; font-size: 25px;" id='close'> </i>


    <div class="sidenav shadow" style="background-color:#fff; border:none; " id="nav">

        <ul>
            <a href="index.php" style="color: #085e79; font-weight:bolder;">
                <i class="fa fa-dashboard" style="margin-right:5%"></i>
                <li>Dashboard
                </li>
            </a>

            <?php 
            $result = selectOne('admin', ['Email' => $ad]);
            if($result['Admin_status'] != 'main'):
            ?>
            <?php else:?>
            <a href="view_admins.php" style="color: #085e79; font-weight:bolder;">
                <i class="fa fa-dashboard" style="margin-right:5%"></i>
                <li>Administrators <?php $row =selectAll('admin', ['Admin_status' => 'Sub-Admin']);
                                 if($num =count($row)){
                                $show = "<span class='countad'>$num</span>";
                                 }else{
                                     $show = '';
                                 }

                                 echo $show;
                               ?>
                </li>
            </a>
            <?php  endif; ?>
            <a href="tracks.php" style="color: #085e79; font-weight:bolder;">
                <i class="fa fa-file" style="margin-right:5%"></i>
                <li>Completed Tracks
                    <?php 
                    $result = selectOne('admin', ['Email' => $ad]);
                    $name = $result['Fullname'];
                    if($result['Admin_status'] != 'main'):
                    ?>
                    <?php $row =selectAll('track', ['stats' => 'yes', 'added_by' => $name]);
                        if($num =count($row)){
                        $show = "<span class='countad'>$num</span>";
                        }else{
                            $show = '';
                        }
                        echo $show;
                    ?>
                    <?php else:?>
                    <?php $row =selectAll('track', ['stats' => 'yes']);
                        if($num =count($row)){
                        $show = "<span class='countad'>$num</span>";
                        }else{
                            $show = '';
                        }
                        echo $show;
                    ?>
                    <?php endif; ?>
                </li>
            </a>

            <a href="tracks.php" style="color: #085e79; font-weight:bolder;">
                <i class="fa fa-file" style="margin-right:5%"></i>
                <li>Pending Tracks
                    <?php 
                    $result = selectOne('admin', ['Email' => $ad]);
                    $name = $result['Fullname'];
                    if($result['Admin_status'] != 'main'):
                    ?>
                    <?php $row =selectAll('track', ['stats' => 'no', 'added_by' => $name]);
                        if($num =count($row)){
                        $show = "<span class='countad'>$num</span>";
                        }else{
                            $show = '';
                        }
                        echo $show;
                    ?>
                    <?php else:?>
                    <?php $row =selectAll('track', ['stats' => 'no']);
                        if($num =count($row)){
                        $show = "<span class='countad'>$num</span>";
                        }else{
                            $show = '';
                        }
                        echo $show;
                    ?>
                    <?php endif; ?>
                </li>
            </a>

            <a href="add_track.php" style="color: #085e79; font-weight:bolder;">
                <i class="fa fa-computer" style="margin-right:5%"></i>
                <li>Add Tracks</li>
            </a>

            <a href="settings.php" style="color: #085e79; font-weight:bolder;">
                <i class="fa fa-gears" style="margin-right:5%"></i>
                <li>Settings</li>
            </a>
            <a href="logout.php" style="color: #085e79; font-weight:bolder;">
                <i class="fa fa-sign-out" style="margin-right:5%"></i>
                <li>Logout</li>
            </a>


        </ul>
    </div>
    <script>
    var open = document.getElementById('open').addEventListener('click', e => {
        var nav = document.getElementById('nav');
        nav.style.display = 'block';
        document.getElementById('open').style.display = 'none';
        document.getElementById('close').style.display = 'block';

    })

    var close = document.getElementById('close').addEventListener('click', e => {
        var nav = document.getElementById('nav');
        nav.style.display = 'none';
        document.getElementById('open').style.display = 'block';
        document.getElementById('close').style.display = 'none';

    })
    </script>
</body>

</html>