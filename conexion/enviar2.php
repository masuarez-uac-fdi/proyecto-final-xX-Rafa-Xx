<?php 
	$conexion=mysqli_connect('localhost','root','','biblioteca');

    $id=$_POST['id'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$tipo_de_usuario=$_POST['tipo_de_usuario'];

	$sql="INSERT into personal (id,nombre,apellido,usuario,password,tipo_de_usuario) 
			values ('$id','$nombre','$apellido','$usuario','$password','$tipo_de_usuario')"; //error
	echo mysqli_query($conexion,$sql);
 ?>