
<?php

if(isset($_POST['submit'])){

include 'Config.php';


$product_name= $_POST['namexd'];
$product_price= $_POST['price'];
$product_image= $_POST['imagexd'];
$image_loc = $_FILES['imagexd']['tmp_name'];
$image_name=$_FILES['imagexd']['name'];
$product_stock= $_POST['stock'];
$img_des='UploadImage/'.$image_name;

move_uploaded_file($image_loc,'UploadImage/'.$image_name);
$product_category=$_POST['Pages'];



mysqli_query($con,"INSERT INTO `producto`(`name`,`price`,
`image`,`categoria`,`stock`) 
VALUES('$product_name','$product_price',
'$img_des','$product_category','$product_stock')");

header("location:post-delete-admin.php");




}







?>