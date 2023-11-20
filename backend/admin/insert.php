
<?php
session_start();
if(isset($_POST['submit'])){

include '../../config/Config.php';

/* trae la informacion que trae post por name */
$product_name= $_POST['namexd'];
$product_price= $_POST['price'];
$product_image= $_POST['imagexd'];
$image_loc = $_FILES['imagexd']['tmp_name'];
$image_name=$_FILES['imagexd']['name'];
$product_stock= $_POST['stock'];
$img_des='UploadImage/'.$image_name;






$parametros=[$product_name,$product_price,$image_loc,$product_stock];


move_uploaded_file($image_loc,'UploadImage/'.$image_name);
$product_category=$_POST['Pages'];
/* configura para guardar la foto y el nombre que se le dara a la foto */





$_SESSION['errors-admin']=[];
/* se guarda en un valor un array con los valores de post */

/* se itera esos valores y si se hace una condicional para ver si no estan vacios,si los estan se agrega
a la session un error */

$llenar=false;
foreach($parametros as $parametro){
if(strlen(trim($parametro))<1){
   $llenar=true;
}
}

/* se crea una variable llenar en false, para asi si existe en el array parametros alguno vacio se cambie la variable llenar a true y
solo te muestre la informacion una vez  */
if($llenar == true){
    $_SESSION['errors-admin'][]='Debe llenar todos los campos';
    header('location:../../views/admin/post-delete-admin.php');
}

if (!is_numeric($product_stock)) {
    $_SESSION['errors-admin'][]='Stock tiene que hacer valor numerico';
    header('location:../../views/admin/post-delete-admin.php');
}

if (!is_numeric($product_price)) {
    $_SESSION['errors-admin'][]='Price tiene que hacer valor numerico';
    header('location:../../views/admin/post-delete-admin.php');
}


if(count( $_SESSION['errors-admin']) == 0){

/* llamas a la base de datos y agregas el producto */
mysqli_query($Con,"INSERT INTO `producto`(`name`,`price`,
`image`,`categoria`,`stock`) 
VALUES('$product_name','$product_price',
'$img_des','$product_category','$product_stock')");
/* redireccionas devuelta a la vista */
header("location:../../views/admin/post-delete-admin.php");


}

}







?>