<?php

include('../includes/db.php');

$id = $_POST['id'];

$result = selectOne('track', ['id' => $id]);

$stats = $result['stats'];

if($stats=='yes'){
    $res = update('track', $id, ['stats' => 'no']);
    if ($res) {
        echo ' <script>
        function hide(){
           var error = document.getElementById("error").style.display="none";
        }
        setTimeout("hide()", 3000)
        </script>
        
        <div style="top:10%; left:5%; position:absolute; z-index:111; width:90%" id="error">
        <h6 style="font-size:12px;" class="alert alert-info text-dark" >Track Moved To Maintaiance Tab succesfully</h6></div>';
     }
}elseif($stats == 'no'){
    $res = update('track', $id, ['stats' => 'yes']);
    if($res){
    echo ' <script>
    function hide(){
       var error = document.getElementById("error").style.display="none";
    }
    setTimeout("hide()", 3000)
    </script>
    
    <div style="top:10%; left:5%; position:absolute; z-index:111; width:90%" id="error">
    <h6 style="font-size:12px;" class="alert alert-info text-dark" >Track Maintaiance Completed succesfully</h6></div>';
 }
}

 