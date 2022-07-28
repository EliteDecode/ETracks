<?php
session_start();
include('../includes/db.php');


$fullname = $_POST['fullname']; 
$password = $_POST['password']; 
$email = $_POST['email']; 
$phone = $_POST['phone']; 
$status = $_POST['admin_status']; 
$error = array();


if (empty($fullname)) {
   $error['empty'] = 'Admin Fullname Is Required';
}elseif (empty($password)) {
    $error['empty'] = 'Admin Passowrd Is Required';
 }elseif (empty($email)) {
    $error['empty'] = 'Admin Email Is Required';
 }elseif (empty($phone)) {
    $error['empty'] = 'Admin Phone Number Is Required';
 }


 $data = [
    'Email' => $email,
 ];
 
 $result = selectOne('admin', $data);

 if ($result) {
    $error['empty'] = 'Admin With This Email Exits Already';
 }

 if (count($error) == 0) {

   $datas = [
    'Fullname' => $fullname,
    'Email' => $email,
    'Phone' => $phone,
    'Admin_status' => $status,
    'Pwd' => $password
   ];
    insert('admin', $datas);
  
    echo ' <script>
    function hide(){
       var error = document.getElementById("error").style.display="none";
    }
    setTimeout("hide()", 3000)
    </script>
    
    <div style="top:.8%; left:5%; position:absolute; width:90%" id="error">
    <h6 style="font-size:12px;" class="alert alert-success text-dark" >Admin  Created succesfully</h6></div>';
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