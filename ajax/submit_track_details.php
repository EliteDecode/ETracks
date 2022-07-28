<?php

include('../includes/db.php');

$added_by = $_POST['added_by']; 
$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname']; 
$email = $_POST['email']; 
$phone = $_POST['phone']; 
$location = $_POST['location']; 
$project_name = $_POST['project_name']; 
$project_link = $_POST['project_link']; 
$cpanel_username = $_POST['cpanel_username'];
$cpanel_password = $_POST['cpanel_password']; 
$hosting_date = $_POST['hosting_date']; 
$expiry_date = $_POST['expiry_date']; 
$hosting_company = $_POST['hosting_company']; 
$hosting_email = $_POST['hosting_email']; 
$hosting_email_password = $_POST['hosting_email_password'];
$domain_company = $_POST['domain_company']; 
$domain_email = $_POST['domain_email']; 
$domain_email_password = $_POST['domain_email_password']; 
$server_link = $_POST['server_link']; 
$status = $_POST['stats']; 

$error = array();


if (empty($firstname)) {
   $error['empty'] = 'Clients Firstname Is Required';
}elseif (empty($lastname)) {
    $error['empty'] = 'Clients Lastname Is Required';
 }elseif (empty($email)) {
    $error['empty'] = 'Clients Email Is Required';
 }elseif (empty($phone)) {
    $error['empty'] = 'Clients Phone Number Is Required';
 }elseif (empty($location)) {
    $error['empty'] = 'Clients Location Is Required';
 }elseif (empty($project_name)) {
    $error['empty'] = 'Project Name Is Required';
 }elseif (empty($project_link)) {
    $error['empty'] = 'Project Link Is Required';
 }elseif (empty($cpanel_username)) {
    $error['empty'] = 'Cpanel Username Is Required';
 }elseif (empty($cpanel_password)) {
    $error['empty'] = 'Cpanel Password Is Required';
 }elseif (empty($hosting_date)) {
    $error['empty'] = 'Hosting Date Is Required';
 }elseif (empty($expiry_date)) {
   $error['empty'] = 'Expiring Date Is Required';
}elseif (empty($hosting_company)) {
    $error['empty'] = 'Hosting Company Is Required';
 }elseif (empty($hosting_email)) {
    $error['empty'] = 'Hosting Email Is Required';
 }elseif (empty($hosting_email_password)) {
    $error['empty'] = 'Hosting Email Password Is Required';
 }elseif (empty($domain_company)) {
    $error['empty'] = 'Domain Company Is Required';
 }elseif (empty($domain_email)) {
    $error['empty'] = 'Domain Email Is Required';
 }elseif (empty($domain_email_password)) {
    $error['empty'] = 'Domain Email Passowrd Is Required';
 }elseif (empty($server_link)) {
    $error['empty'] = 'Server Link Is Required';
 }



 $data = [
    'project_name' => $project_name,
 ];
 
 $result = selectOne('track', $data);

 if ($result) {
    $error['empty'] = 'Project with This Name Exits Already';
 }

 if (count($error) == 0) {
    insert('track', $_POST);
    echo ' <script>
    function hide(){
       var error = document.getElementById("error").style.display="none";
    }
    setTimeout("hide()", 3000)
    </script>
    
    <div style="top:.8%; left:5%; position:absolute; width:90%" id="error">
    <h6 style="font-size:12px;" class="alert alert-success text-dark" >Information Added succesfully</h6></div>';
 }


 
if (isset($error['empty'])) {
    $er = $error['empty'];
    $display = ' <script>
    function hide(){
       var error = document.getElementById("error").style.display="none";
    }
    setTimeout("hide()", 3000)
    </script>
    
    <div style="top:.8%; left:5%; position:absolute; width:90%" id="error">
    <h6 class="alert alert-danger" style="font-size:12px;">'.$er.'</h6></div>';

 }else{
     $display = '';
 }

 echo $display;