<?php

$Id= $_GET['ID'];



include 'Config.php';


mysqli_query($con,"DELETE FROM `producto`WHERE id = $Id");

header('location:post-delete-admin.php')





?>