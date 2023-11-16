<?php

if(isset($_POST['update'])){

$idxd=$_POST['id'];
$product_name=$_POST['namexd'];
$product_price=$_POST['price'];
$product_image=$_FILES['imagexd'];
$image_loc=$_FILES['imagexd']['tmp_name'];
$image_name=$_FILES['imagexd']['name'];

$img_des='UploadImage/'.$image_name;

move_uploaded_file($image_loc,'UploadImage/'.$image_name);
/* trae informacion del post a traves del name */
$product_category=$_POST['Pages'];


include '../../config/Config.php';

/* llamar a la base de datos y actualizar que coincida con el id */
mysqli_query($Con,"UPDATE `producto` SET
`name`='$product_name', `price`='$product_price',
`image`='$img_des',`categoria`='$product_category' WHERE id=$idxd");

header('location:../../views/admin/post-delete-admin.php');






}








?>