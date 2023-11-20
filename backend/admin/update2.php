<?php
session_start();
if(isset($_POST['update'])){

$idxd=$_POST['id'];
$product_name=$_POST['namexd'];
$product_price=$_POST['price'];
$product_image=$_FILES['imagexd'];
$image_loc=$_FILES['imagexd']['tmp_name'];
$image_name=$_FILES['imagexd']['name'];
$stock=$_POST['stock'];
$img_des='UploadImage/'.$image_name;

move_uploaded_file($image_loc,'UploadImage/'.$image_name);
/* trae informacion del post a traves del name */
$product_category=$_POST['Pages'];


include '../../config/Config.php';


$parametros=[$product_name,$product_price,$stock];

$llenar=false;
foreach($parametros as $parametro){
if(strlen(trim($parametro))<1){
   $llenar=true;
}
}
$_SESSION['errors-update']=[];

/* se crea una variable llenar en false, para asi si existe en el array parametros alguno vacio se cambie la variable llenar a true y
solo te muestre la informacion una vez  */
if($llenar == true){
    $_SESSION['errors-update'][]='Debe llenar  los campos';
    header('location:../../views/admin/update.php');
}

if (!is_numeric($stock)) {
    $_SESSION['errors-update'][]='Stock tiene que hacer valor numerico';
    header('location:../../views/admin/update.php');
}

if (!is_numeric($product_price)) {
    $_SESSION['errors-update'][]='Price tiene que hacer valor numerico';
    header('location:../../views/admin/update.php');
}



if(count( $_SESSION['errors-update']) == 0){

if (empty($image_name)) {
    mysqli_query($Con,"UPDATE `producto` SET
    `name`='$product_name', `price`='$product_price',
    `categoria`='$product_category',stock = '$stock' WHERE id=$idxd");
    
    header('location:../../views/admin/post-delete-admin.php');
    
}else{
    mysqli_query($Con,"UPDATE `producto` SET
    `name`='$product_name', `price`='$product_price',
    `image`='$img_des',`categoria`='$product_category',stock = '$stock' WHERE id=$idxd");
    
    header('location:../../views/admin/post-delete-admin.php');

}


}



}








?>