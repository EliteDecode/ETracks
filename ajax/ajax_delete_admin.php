<?php

include('../includes/db.php');

$id = $_POST['id'];

 $result = delete('admin', $id);

 if ($result) {
    echo 'Admin Deletaed Successfully';
 }