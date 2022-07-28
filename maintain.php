<?php

session_start();

$ad = $_SESSION['admin'];
if (!isset($_SESSION['admin'])) {
    header('location: adminLogin.php');
  }
include ('includes/db.php');
include ('includes/header.php');

//get added by using session variables

$query = selectOne('admin', ['Email' => $ad]);
$name = $query['Fullname'];


$limit = 7;
$page =isset( $_GET['page']) ? $_GET['page'] : 1;

$start=($page -1) * $limit;
$rowcount = selectAll('track', ['added_by' => $name]);
$count = count($rowcount);
$totalPages = ceil($count / $limit);

if ($page == 1) {
    $disabledPrev = 'disabled';
}else{
    $disabledPrev = '';
}
if($page == $totalPages){
    $disabledNext = 'disabled';
}else{
    $disabledNext = '';
}
$first = 1;
$last = $totalPages;
$previous = $page -1;
$next = $page +1;



$text = 'Filter By';



//I am doing checks here if admin is main

$result = selectOne('admin', ['Email' => $ad]);
$name = $result['Fullname'];
if($result['Admin_status'] != 'main'):


if (isset($_POST['search_term'])) {
    $term = $_POST['search_term'];
   $rows = searchTrack('track', $term);
}elseif(isset($_POST['select'])){
    $filter = $_POST['select'];
    if ($filter == 'hosting_date'){
       $rows = selectPageCondspecific('track', 'yes', $name, 'hosting_date', $start , $limit);
       $text = 'You Filtered By Hosting Date';
    }elseif ($filter == 'expiry_date'){
        $rows = selectPageCondspecific('track', 'yes', $name, 'expiry_date', $start , $limit);
        $text = 'You Filtered By Expiry Date';
    }elseif ($filter == 'name'){
        $rows = selectPageCondspecific('track', 'yes', $name, 'project_name', $start , $limit);
        $text = 'You Filtered By Project Name';
    }
}
else{
    $rows = selectPageSpecific('track', 'yes', $name, $start, $limit); 
}


else:  

if (isset($_POST['search_term'])) {
    $term = $_POST['search_term'];
   $rows = searchTrack('track', $term);
}elseif(isset($_POST['select'])){
    $filter = $_POST['select'];
    if ($filter == 'hosting_date'){
       $rows = selectPageConds('track', 'yes', 'hosting_date', $start , $limit);
       $text = 'You Filtered By Hosting Date';
    }elseif ($filter == 'expiry_date'){
        $rows = selectPageConds('track', 'yes', 'expiry_date', $start , $limit);
        $text = 'You Filtered By Expiry Date';
    }elseif ($filter == 'name'){
        $rows = selectPageConds('track', 'yes', 'project_name', $start , $limit);
        $text = 'You Filtered By Project Name';
    }
}
else{
    $rows = selectPage('track', 'yes', $start, $limit); 
}
endif;



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
                <div id="msg_p"></div>
                <div class="container tabss">
                    <h6 class='track'>Total Track On Maintainance: <?php $row = selectAll('track', ['stats' => 'no']);
                                                   $num =count($row);
                                                  echo $num?></h6>
                    <form action="maintain.php" method='post'>
                        <div class="form-group">
                            <input type="search" name="search_term" class="form-control" id='search' value=""
                                placeholder="Search For A track Record by Project Name" required />
                        </div>
                    </form>
                    <form action="maintain.php" method='post'>
                        <div class="form-group">
                            <label for="exampleInputEmail1"
                                style="font-weight:bold; color:#085e79"><?php echo $text ?></label>
                            <select name="select" id="" class="form-control" style=' font-weight:bold;'
                                onchange="this.form.submit()" required>
                                <option value="" selected disabled>Filter By</option>
                                <option value="hosting_date">Hosting Date</option>
                                <option value="expiry_date">Expiry Date</option>
                                <option value="name"> Name</option>
                            </select>
                        </div>
                    </form>

                    <table class='table table-bordered  text-center' style='z-index:0;margin-top:1%; color:#085e79;'>
                        <tr>
                            <th style='font-size:13px'>Serial No</th>
                            <th style='font-size:13px'>Firstname</th>
                            <th style='font-size:13px'>Lastname</th>
                            <th style='font-size:13px'>Email</th>
                            <th style='font-size:13px'>Phone</th>
                            <th style='font-size:13px'>Location</th>
                            <th style='font-size:13px'>Project Name</th>
                            <th style='font-size:13px'>ProjectLink</th>
                            <th style='font-size:13px'>Cpanel Username</th>
                            <th style='font-size:13px'>Cpanel Password</th>
                            <th style='font-size:13px'>Hosting Date</th>
                            <th style='font-size:13px'>Expiry Date</th>
                            <th style='font-size:13px'>Hosting Company</th>
                            <th style='font-size:13px'>Hosting Email</th>
                            <th style='font-size:13px'>Domain Company</th>
                            <th style='font-size:13px'>Domain Email</th>
                            <th style='font-size:13px'>Server Link</th>
                            <th style='font-size:13px'>Action</th>


                        </tr>

                        <?php if($rows): ?>
                        <?php
                        foreach($rows as $key=> $ro): ?>
                        <tr>
                            <td style='font-size:13px'><?php echo $key+1 ?></td>
                            <td style='font-size:13px'><?php echo $ro['firstname'] ?></td>
                            <td style='font-size:13px'><?php echo $ro['lastname'] ?></td>
                            <td style='font-size:13px'><?php echo $ro['email'] ?></td>
                            <td style='font-size:13px'><?php echo $ro['phone'] ?></td>
                            <td style='font-size:13px'><?php echo $ro['location'] ?></td>
                            <td style='font-size:13px'><?php echo $ro['project_name'] ?></td>
                            <td style='font-size:13px'><a
                                    href='<?php echo $ro['project_link'] ?>'><?php echo $ro['project_link'] ?></a></td>
                            <td style='font-size:13px'><?php echo $ro['cpanel_username'] ?></td>
                            <td style='font-size:13px'><?php echo $ro['cpanel_password'] ?></td>
                            <td style='font-size:13px'><?php echo date('F j, Y', strtotime($ro['hosting_date'])) ?></td>
                            <td style='font-size:13px'><?php echo date('F j, Y', strtotime($ro['expiry_date'])) ?></td>
                            <td style='font-size:13px'><?php echo $ro['hosting_company'] ?></td>
                            <td style='font-size:13px'><?php echo $ro['hosting_email'] ?></td>
                            <td style='font-size:13px'><?php echo $ro['domain_company'] ?></td>
                            <td style='font-size:13px'><?php echo $ro['domain_email'] ?></td>
                            <td style='font-size:13px'><a
                                    href='<?php echo $ro['server_link'] ?>'><?php echo $ro['server_link'] ?></a></td>
                            <td style='font-size:13px'><a href="edit.php?editid=<?php echo $ro['id']?>"><button
                                        style="font-weight:bold" class='btn btn-info'>Edit</button></a></td>
                            <td style='font-size:13px;'><button style="font-weight:bold" class='btn btn-warning'
                                    onclick="maintain(this)" id="<?php echo $ro['id']?>">Complete</button></td>
                            <td style='font-size:13px'><button style="font-weight:bold" class='btn btn-danger'
                                    onclick="deleteid(this)" id="<?php echo $ro['id']?>">Delete</button></td>


                        </tr>

                        <?php endforeach; ?>
                        <?php else: ?>

                        <tr>
                            <td colspan="18" style="font-weight: bold;"> No track Currently on Maintaince. </td>
                        </tr>

                        <?php endif; ?>

                    </table>


                    <?php if($rows): ?>
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item <?php echo $disabledFirst?> ">
                                <a class="page-link" href="maintain.php?page=<?php echo $first ?>"
                                    tabindex="-1">First</a>
                            </li>
                            <li class="page-item  <?php echo $disabledPrev?> ">
                                <a class="page-link " href="maintain.php?page=<?php echo $previous ?>" tabindex="-1"><i
                                        class="fa fa-caret-left" style='cursor:pointer'></i></a>
                            </li>

                            <!-- Looping through pages to print numbers -->
                            <?php for ($i=1; $i <= $totalPages ; $i++) :?>
                            <li class="page-item"><a class="page-link " id='active'
                                    href="maintain.php?page=<?php echo $i ?>"
                                    value='<?php echo $i ?>'><?php echo $i ?></a>
                            </li>
                            <?php endfor; ?>
                            <!-- End Looping through pages to print numbers -->

                            <li class="page-item <?php echo $disabledNext?>">
                                <a class="page-link" href="maintain.php?page=<?php echo $next ?>"><i
                                        class="fa fa-caret-right" style='cursor:pointer'></i></a>
                            </li>
                            <li class="page-item <?php echo $disabledLast?> ">
                                <a class="page-link" href="maintain.php?page=<?php echo $last ?>" tabindex="-1">Last</a>
                            </li>
                        </ul>
                    </nav>
                    <?php else: ?>
                    <?php endif; ?>





                    </tr>
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
        var url = 'ajax/delete_track.php';

        delete_track.open(method, url, true);
        delete_track.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        delete_track.onreadystatechange = function() {
            if (delete_track.readyState == 4 && delete_track.status == 200) {
                var data = delete_track.responseText;
                console.log(data);
                document.getElementById('msg_p').innerHTML = data;

            }
        }

        delete_track.send(vars);
    }

    function maintain(e) {
        var id = e.id;
        var vars = 'id=' + id;


        var maintain_track = new XMLHttpRequest();
        var method = 'POST';
        var url = 'ajax/maintain_track.php';

        maintain_track.open(method, url, true);
        maintain_track.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        maintain_track.onreadystatechange = function() {
            if (maintain_track.readyState == 4 && maintain_track.status == 200) {
                var data = maintain_track.responseText;
                console.log(data);
                window.location.href = 'maintain.php';
                window.scrollTo(0, 0);

            }
        }

        maintain_track.send(vars);
    }
    </script>
</body>

</html>