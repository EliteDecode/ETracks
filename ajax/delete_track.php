<?php

include('../includes/db.php');

$id = $_POST['id'];

 $result = delete('track', $id);

 if ($result) {
    echo ' <script>
    function hide(){
       var error = document.getElementById("error").style.display="none";
    }
    setTimeout("hide()", 3000)
    </script>
    
    <div style="top:10%; left:5%; position:absolute; z-index:111; width:90%" id="error">
    <h6 style="font-size:12px;" class="alert alert-danger text-dark" >Information Deleted succesfully</h6></div>';
 }