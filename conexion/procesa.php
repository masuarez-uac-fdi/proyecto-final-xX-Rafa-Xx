<?php
try {

 $conexion=mysqli_connect('localhost','root','','biblioteca');
        
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


switch($_POST['opc'])
{

case "eliminar":
 try{
          $sql ="DELETE FROM libros WHERE codigo_libro =".$_POST['clave'];       
          $conexion->query($sql);         
          $conexion->close();
          //header("location:index.php");   
    }
      catch (PDOException $e) {
    print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
    die();
} 
 break;
 case "modificar-form":
 try{
          $sql = $conexion->prepare("SELECT * FROM libros WHERE codigo_libro=".$_POST['clave']);       
          $sql->execute();         
          if($fila = $sql->fetch())
          {  
 ?>

?>