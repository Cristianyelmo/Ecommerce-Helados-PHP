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

$product_category=$_POST['Pages'];


include 'Config.php';


mysqli_query($con,"UPDATE `producto` SET
`name`='$product_name', `price`='$product_price',
`image`='$img_des',`categoria`='$product_category' WHERE id=$idxd");

header('location:post-delete-admin.php');






}








?>