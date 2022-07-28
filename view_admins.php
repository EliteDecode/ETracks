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
    margin-left: 70%;
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

                <div id="msg_p"></div>
                <div class="container mt-5">
                    <table class='table table-bordered  text-center' style='z-index:0;margin-top:1%; color:#085e79;'>
                        <tr>
                            <th style='font-size:13px'>Serial No</th>
                            <th style='font-size:13px'>Fullname</th>
                            <th style='font-size:13px'>Email</th>
                            <th style='font-size:13px'>Phone</th>
                            <th style='font-size:13px'>Status</th>

                            <th style='font-size:13px'>Action</th>


                        </tr>

                        <?php
                        $rows = selectAll('admin', ['Admin_status'=> 'Sub-Admin']);
                        if($rows): 
                        ?>
                        <?php
                        foreach($rows as $key=> $ro): ?>
                        <tr>
                            <td style='font-size:13px' class="bold"><?php echo $key+1 ?></td>
                            <td style='font-size:13px' class="bold"><?php echo $ro['Fullname'] ?></td>
                            <td style='font-size:13px' class="bold"><?php echo $ro['Email'] ?></td>
                            <td style='font-size:13px' class="bold"><?php echo $ro['Phone'] ?></td>
                            <td style='font-size:13px' class="bold"><?php echo $ro['Admin_status'] ?></td>


                            <td style='font-size:13px' class="bold"><a
                                    href="edit_admin.php?editid=<?php echo $ro['id']?>"><button
                                        style="font-weight:bold;" class='btn btn-info'>Edit</button></a></td>

                            <td style='font-size:13px' class="bold"><button style="font-weight:bold;"
                                    class='btn btn-danger' onclick="deleteid(this)"
                                    id="<?php echo $ro['id']?>">Delete</button></td>

                        </tr>

                        <?php endforeach; ?>
                        <?php else: ?>

                        <tr>
                            <td colspan="18" style="font-weight: bold;"> No Admin Currently on List. </td>
                        </tr>

                        <?php endif; ?>


                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>





    <script>
    function deleteid(e) {
        var id = e.id;
        var vars = 'id=' + id;


        var delete_track = new XMLHttpRequest();
        var method = 'POST';
        var url = 'ajax/ajax_delete_admin.php';

        delete_track.open(method, url, true);
        delete_track.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        delete_track.onreadystatechange = function() {
            if (delete_track.readyState == 4 && delete_track.status == 200) {
                var data = delete_track.responseText;
                console.log(data);
                alert(data);
                window.location.href = 'view_admins.php'

            }
        }

        delete_track.send(vars);
    }
    </script>


</body>

</html>