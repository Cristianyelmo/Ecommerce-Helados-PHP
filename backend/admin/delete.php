<?php

$Id= $_GET['ID'];



include '../../config/Config.php';

/* obtenes el id del producto y llamas a la base de datos que coicida con el id */
mysqli_query($Con,"DELETE FROM `producto`WHERE id = $Id");

header('location:../../views/admin/post-delete-admin.php')





?>