<?php

session_start();

$ad = $_SESSION['admin'];
if (!isset($_SESSION['admin'])) {
    header('location: adminLogin.php');
  }
include ('includes/db.php');
include ('includes/track_control.php');
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
    margin-left: 80%;
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

                    <?php 
                  if (isset($_GET['editid'])) {
                     $id = $_GET['editid'];

                     $row = selectOne('track', ['id' => $id]);
                  }
                ?>

                    <div class="form">
                        <div id="msg"></div>

                        <!-- beginning of form1 -->
                        <div id="form1">
                            <h6>Client's Details</h6>
                            <form method="post" enctype="multipart/form-data" class="adminLoginForm"
                                style='margin-top:3%'>
                                <input type="hidden" value='<?php echo $id?>' id='id'>
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" name="firstname" class="form-control" id='firstname'
                                        value="<?php echo $row['firstname'] ?>"
                                        placeholder="Add Client's Firstname..." />
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" name="lastname" class="form-control" id='lastname'
                                        value="<?php echo $row['lastname'] ?>"
                                        placeholder="Add Client's Lastname......" />
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="email" name="email" class="form-control" id='email'
                                        data-validate="Valid email is required: ex@abc.xyz"
                                        value="<?php echo $row['email'] ?>" placeholder="Add Client's Email......" />
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" name="phone" class="form-control" id='phone'
                                        value="<?php echo $row['phone'] ?>"
                                        placeholder="Add Client's Phone Number......" />
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" class="form-control" id='location'
                                        value="<?php echo $row['location'] ?>"
                                        placeholder="Add Client's Location......" />
                                </div>
                            </form>
                            <button class="btn text-white submit_btn" name="submit" id='next_details'>
                                &nbsp Next &nbsp
                            </button>
                        </div>
                        <!-- end of form1 -->
                        <!-- beginning of form2 -->
                        <div id="form2" style='display:none'>
                            <h6><span id='show_details' style='cursor:pointer;'><i class="fa fa-arrow-left"></i></span>
                                &nbspProject Details</h6>
                            <form method="post" enctype="multipart/form-data" class="adminLoginForm"
                                style='margin-top:3%'>

                                <div class="form-group">
                                    <label for="project_name">Project Name</label>
                                    <input type="text" name="project_name" class="form-control" id='project_name'
                                        value="<?php echo $row['project_name'] ?>" placeholder="Add Project Name..." />
                                </div>
                                <div class="form-group">
                                    <label for="project_link">Project Link</label>
                                    <input type="text" name="project_link" class="form-control" id='project_link'
                                        value="<?php echo $row['project_link'] ?>"
                                        placeholder="Add Project Link......" />
                                </div>
                                <div class="form-group">
                                    <label for="cpanel_username">Cpanel Username</label>
                                    <input type="text" name="cpanel_username" class="form-control" id='cpanel_username'
                                        value="<?php echo $row['cpanel_username'] ?>"
                                        placeholder="Add Cpanel Username......" />
                                </div>
                                <div class="form-group">
                                    <label for="cpanel_password">Cpanel Password</label>
                                    <input type="password" name="cpanel_password" class="form-control"
                                        id='cpanel_password' value="<?php echo $row['cpanel_password'] ?>"
                                        placeholder="Add Cpanel Password......" />
                                </div>

                            </form>
                            <button class="btn text-white submit_btn" name="submit" id='next_project'>
                                &nbsp Next &nbsp
                            </button>
                        </div>
                        <!-- end of form2 -->
                        <!-- beginning of form3 -->
                        <div id="form3" style='display:none'>
                            <h6><span id='show_project' style='cursor:pointer'><i class="fa fa-arrow-left"></i></span>
                                &nbspHosting Details
                            </h6>
                            <form method="post" enctype="multipart/form-data" class="adminLoginForm"
                                style='margin-top:3%'>

                                <div class="form-group">
                                    <label for="hosting_date">Hosting Date</label>
                                    <input type="date" name="hosting_date" class="form-control" id='hosting_date'
                                        value="<?php echo $row['hosting_date'] ?>" placeholder="Add Hosting Date..." />
                                </div>
                                <div class="form-group">
                                    <label for="expiry_date">Expiry Date</label>
                                    <input type="date" name="expiry_date" class="form-control" id='expiry_date'
                                        value="<?php echo $row['expiry_date'] ?>" placeholder="Add expiry Date..." />
                                </div>
                                <div class="form-group">
                                    <label for="hosting_company">Hosting Comapny</label>
                                    <input type="text" name="hosting_company" class="form-control" id='hosting_company'
                                        value="<?php echo $row['hosting_company'] ?>"
                                        placeholder="Add Hosting Comapny......" />
                                </div>
                                <div class="form-group">
                                    <label for="hosting_email">Hosting Email</label>
                                    <input type="email" name="hosting_email" class="form-control" id='hosting_email'
                                        data-validate="Valid email is required: ex@abc.xyz"
                                        value="<?php echo $row['hosting_email'] ?>"
                                        placeholder="Add Hosting Email......" />
                                </div>
                                <div class="form-group">
                                    <label for="hosting_email_password">Hosting Email Password</label>
                                    <input type="password" name="hosting_email_password" class="form-control"
                                        id='hosting_email_password' value="<?php echo $row['hosting_email_password'] ?>"
                                        placeholder="Add Hosting Email Password......" />
                                </div>

                            </form>
                            <button class="btn text-white submit_btn" name="submit" id='next_host'>
                                &nbsp Next &nbsp
                            </button>
                        </div>
                        <!-- end of form3 -->
                        <!-- beginning of form4 -->
                        <div id="form4" style='display:none'>
                            <h6><span id='show_host' style='cursor:pointer'><i class="fa fa-arrow-left"></i></span>
                                &nbsp Domain Details</h6>
                            <form method="post" enctype="multipart/form-data" class="adminLoginForm"
                                style='margin-top:3%'>

                                <div class="form-group">
                                    <label for="domain_company">Domain Comapany</label>
                                    <input type="text" name="domain_company" class="form-control" id='domain_company'
                                        value="<?php echo $row['domain_company'] ?>"
                                        placeholder="Add Domain Comapany..." />
                                </div>
                                <div class="form-group">
                                    <label for="domain_email">Domain Email</label>
                                    <input type="email" name="domain_email" class="form-control" id='domain_email'
                                        data-validate="Valid email is required: ex@abc.xyz"
                                        value="<?php echo $row['domain_email'] ?>"
                                        placeholder="Add Domain Email......" />
                                </div>
                                <div class="form-group">
                                    <label for="domain_email_password">Domain Email Password</label>
                                    <input type="password" name="domain_email_password" class="form-control"
                                        id='domain_email_password' value="<?php echo $row['domain_email_password'] ?>"
                                        placeholder="Add Domain Email Password......" />
                                </div>
                                <div class="form-group">
                                    <label for="server_link">Server Link</label>
                                    <input type="text" name="server_link" class="form-control" id='server_link'
                                        value="<?php echo $row['server_link'] ?>" placeholder="Add Server Link......" />
                                </div>


                            </form>

                            <button class="btn text-white submit_btn" name="submit" onclick='update()'>
                                Update
                            </button>
                        </div>
                        <!-- end of form4 -->
                    </div>

                </div>
            </div>
        </div>
    </div>





    <script>
    document.getElementById('next_details').addEventListener('click', e => {
        document.getElementById('form1').style.display = 'none';
        document.getElementById('form2').style.display = 'block';
        document.getElementById('form3').style.display = 'none';
        document.getElementById('form4').style.display = 'none';
    })
    document.getElementById('next_project').addEventListener('click', e => {
        document.getElementById('form1').style.display = 'none';
        document.getElementById('form2').style.display = 'none';
        document.getElementById('form3').style.display = 'block';
        document.getElementById('form4').style.display = 'none';
    })
    document.getElementById('next_host').addEventListener('click', e => {
        document.getElementById('form1').style.display = 'none';
        document.getElementById('form2').style.display = 'none';
        document.getElementById('form3').style.display = 'none';
        document.getElementById('form4').style.display = 'block';
    })

    document.getElementById('show_host').addEventListener('click', e => {
        document.getElementById('form1').style.display = 'none';
        document.getElementById('form2').style.display = 'none';
        document.getElementById('form3').style.display = 'block';
        document.getElementById('form4').style.display = 'none';
    })

    document.getElementById('show_project').addEventListener('click', e => {
        document.getElementById('form1').style.display = 'none';
        document.getElementById('form2').style.display = 'block';
        document.getElementById('form3').style.display = 'none';
        document.getElementById('form4').style.display = 'none';
    })
    document.getElementById('show_details').addEventListener('click', e => {
        document.getElementById('form1').style.display = 'block';
        document.getElementById('form2').style.display = 'none';
        document.getElementById('form3').style.display = 'none';
        document.getElementById('form4').style.display = 'none';
    })



    function update() {



        var firstname = document.getElementById('firstname').value;
        var lastname = document.getElementById('lastname').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var location = document.getElementById('location').value;
        var project_name = document.getElementById('project_name').value;
        var project_link = document.getElementById('project_link').value;
        var cpanel_username = document.getElementById('cpanel_username').value;
        var cpanel_password = document.getElementById('cpanel_password').value;
        var hosting_date = document.getElementById('hosting_date').value;
        var expiry_date = document.getElementById('expiry_date').value;
        var hosting_company = document.getElementById('hosting_company').value;
        var hosting_email = document.getElementById('hosting_email').value;
        var hosting_email_password = document.getElementById('hosting_email_password').value;
        var domain_company = document.getElementById('domain_company').value;
        var domain_email = document.getElementById('domain_email').value;
        var domain_email_password = document.getElementById('domain_email_password').value;
        var server_link = document.getElementById('server_link').value;
        var id = document.getElementById('id').value;
        var stats = 'yes';





        var vars = 'firstname=' + firstname + '&lastname=' + lastname + '&email=' + email + '&phone=' + phone +
            '&location=' + location + '&project_name=' + project_name + '&project_link=' + project_link +
            '&cpanel_username=' + cpanel_username + '&cpanel_password=' + cpanel_password + '&hosting_date=' +
            hosting_date + '&hosting_company=' + hosting_company + '&hosting_email=' + hosting_email +
            '&hosting_email_password=' + hosting_email_password + '&domain_company=' + domain_company +
            '&domain_email=' + domain_email + '&domain_email_password=' + domain_email_password + '&server_link=' +
            server_link + "&id=" + id + '&expiry_date=' + expiry_date + '&stats=' + stats;

        console.log(vars);
        var submit = new XMLHttpRequest();
        var method = 'POST';
        var url = 'ajax/update_track_details.php';

        submit.open(method, url, true);
        submit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        submit.onreadystatechange = function() {
            if (submit.readyState == 4 && submit.status == 200) {
                var data = submit.responseText;


                document.getElementById('firstname').value = firstname;
                document.getElementById('lastname').value = lastname;
                document.getElementById('email').value = email;
                document.getElementById('phone').value = phone;
                document.getElementById('location').value = location;
                document.getElementById('project_name').value = project_name;
                document.getElementById('project_link').value = project_link;
                document.getElementById('cpanel_username').value = cpanel_username;
                document.getElementById('cpanel_password').value = cpanel_password;
                document.getElementById('hosting_date').value = hosting_date;
                document.getElementById('expiry_date').value = expiry_date;
                document.getElementById('hosting_company').value = hosting_company;
                document.getElementById('hosting_email').value = hosting_email;
                document.getElementById('hosting_email_password').value = hosting_email_password;
                document.getElementById('domain_company').value = domain_company;
                document.getElementById('domain_email').value = domain_email;
                document.getElementById('domain_email_password').value = domain_email_password;
                document.getElementById('server_link').value = server_link;



                console.log(data);
                document.getElementById('msg').innerHTML = data;



            }
        }

        submit.send(vars);

    }
    </script>


</body>

</html>