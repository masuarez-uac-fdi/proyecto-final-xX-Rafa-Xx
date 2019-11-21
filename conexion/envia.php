<?php 
	$conexion=mysqli_connect('localhost','root','','biblioteca');

    $codigo=$_POST['codigo'];
	$nombre=$_POST['nombre'];
	$autor=$_POST['autor'];
	$tipo=$_POST['tipo'];
	$estado=$_POST['estado'];

	$sql="INSERT into libros (codigo_libro,nombre_libro,autor_libro,tipo_de_libro,estado_del_libro) 
			values ('$codigo','$nombre','$autor','$tipo','$estado')"; //error
	echo mysqli_query($conexion,$sql);
 ?>