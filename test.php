<?php
session_start();
include_once "S3Service.php";
?>

<form method="post" name='form1' action='' enctype="multipart/form-data">
subir:
<input type="file" name="archivo" id="archivo">

<button type="submit" name="subir" id="subir" value="Submit">Subir</button>

</form>

<?php

if(isset($_POST['subir'])){

$s3Client = new S3Service();
echo "Submit";	

foreach ($_FILES as $key) //Iteramos el arreglo de archivos
{
  


 $NombreOriginal = $key['name'];

 $destino_reg =  "1/".$NombreOriginal;
 $ruta = "upload_tag/1/"; //Decalaramos una variable con la ruta en donde almacenaremos los archivos 
 echo "<br>";    
 $temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
 $Destino = $ruta.$NombreOriginal; //Creamos una ruta de destino con la variable ruta y el nombre original del archivo     
 echo "<br>".$result = $s3Client->upload($temporal, $Destino);
 //move_uploaded_file($temporal, $Destino); //Movemos el archivo temporal a la ruta especificada 

}
/*
 if(!file_exists("upload_pinscripcion".DIRECTORY_SEPARATOR.$factura.DIRECTORY_SEPARATOR.$archivo)) 
              { $s3Client = new S3Service();
                 if(!file_exists("download_s3".DIRECTORY_SEPARATOR."pinscripcion".DIRECTORY_SEPARATOR.$_SESSION['userid'].DIRECTORY_SEPARATOR)) 
                   { $dir_final = mkdir("download_s3".DIRECTORY_SEPARATOR."pinscripcion".DIRECTORY_SEPARATOR.$_SESSION['userid'].DIRECTORY_SEPARATOR, 0777, true); 
                     if(!$dir_final) { die('Fallo al crear las carpetas...');}
                   }
                 if(!file_exists("download_s3".DIRECTORY_SEPARATOR."pinscripcion".DIRECTORY_SEPARATOR.$_SESSION['userid'].DIRECTORY_SEPARATOR.$archivo))  
                   {$resultdownd = $s3Client->download("upload_pinscripcion/" . $factura . "/".$archivo);
                    $numbytes = file_put_contents("download_s3".DIRECTORY_SEPARATOR."pinscripcion".DIRECTORY_SEPARATOR.$_SESSION['userid'].DIRECTORY_SEPARATOR.$archivo, $resultdownd['Body']);
                   }  


*/
}
?>