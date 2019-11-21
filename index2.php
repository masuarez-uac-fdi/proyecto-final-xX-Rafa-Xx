<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
  
  
    <title>form</title>
    <!--JQUERY-->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
	<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- DATA TABLE -->


	<!-- Los iconos tipo Solid de Fontawesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
	<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

	<!-- Nuestro css-->
	<link rel="stylesheet" type="text/css" href="form2.css"
		th:href="@{/css/user-form.css}">
  </head>
  <!--para las imagenes -->
<style>
.contenedor{

position: absolute;
}
.img-ts{
  width: 565px;
  height: 357px;

}
.img-txt{
  width: 435px;
  height: 357px;
  float: right;
}
</style>
  <body>
  <div class="cabeza">
    <div class="conten">   <!--centro el texto  -->
    <h1 class="text-center">Sistema de Administración Bibliotecaria</h1>
    </div>
  </div>
    <div class="container">  <!--Se muestra en la ventana principal    -->
    <button style="width:20%" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">Agregar Libros</button>

    <!-- creacion del modal  -->
    <div class="modal fade" id="modal1">
      <div class="modal-dialog">
        <div class="modal-content">  <!--Este si funcionó  -->
          <div class="modal-header">
      <!--      <h5 class="modal-title">Ejemplo modal 1</h5> -->

            <div class="ser" style="width:100%" >
          
            <form id="frmajax" method="POST"> <!--para mandar nuestro formulario-->
            <h2>Registro de Libros</h2>  
            <label for="">Codigo del libro</label>
            <input type="text" name="codigo" id="codigo" class="form-control" required>
            <label for="">Nombre del libro</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
            <label for="">Autor del libro</label>
            <input type="text" name="autor" id="autor" class="form-control" required>
            <label for="">Tipo de libro</label>
            <input type="text" name="tipo" id="tipo" class="form-control" required>
            <label for="">Estado del libro</label>
            <select class="form-control" id="estado" name="estado">
            <option value="bueno">Bueno</option>
            <option value="regular">Regular</option>
            <option value="malo">Malo</option>
            </select>
            <br>

            <button id="btnguardar"  type="submit" class="btn btn-primary">Guardar</button>
            
            </form>

            <button type="button" class="close" data-dismiss="modal" arial-label="close">
             &times; Salir
            </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <br>

<!--segunda ventana modal -->
<div class="container">  <!--Se muestra en la ventana principal    -->
<button style="width:20%" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal2">Agregar Personal</button>
<br>
<br>

<!-- creacion del modal  -->
<div class="modal fade" id="modal2">
  <div class="modal-dialog">
    <div class="modal-content">  <!--Este si funcionó  -->
      <div class="modal-header">
  <!--      <h5 class="modal-title">Ejemplo modal 1</h5> -->
        <div class="ser" style="width:100%" >
        <h2>Registro de Personal</h2>
        <form id="frmadjax"  method="POST">
        <label for="">Id</label>
        <input type="text" name="id" class="form-control" required>
        <label for="">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
        <label for="">Apellidos</label>
        <input type="text" name="apellido" class="form-control" required>
        <label for="">Usuario</label>
        <input type="text" name="usuario" class="form-control" required>
        <label for="">Contraseña</label>
        <input type="text" name="password" class="form-control" required>
        <label for="">Tipo de Usuario</label>
        <select class="form-control" name="tipo_de_usuario">
          <option value="administrador">Administrador</option>
          <option value="usuario">Usuario</option>

        </select>
        <br>
        
        <button id="guardar2" type="submit" class="btn btn-primary">Guardar</button>
      
        </form>
        <button type="button" class="close" data-dismiss="modal" arial-label="close">
         &times; Salir
        </button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!--tercera ventana modal -->
<div class="container">  <!--Se muestra en la ventana principal    -->
<button style="width:20%" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal3">Ver Biblioteca</button>

<!-- creacion del modal  -->
<div class="modal fade" id="modal3">
  <div class="modal-dialog">
    <div class="modal-content">  <!--Este si funcionó  -->
      <div class="modal-header">
  <!--      <h5 class="modal-title">Ejemplo modal 1</h5> -->
        <div class="ser" style="width:100%" >
        <h2>Registro de libros</h2>
         <!-- Area donde se listan los datos -->

                <h4 class="card-title text-center" style="color: red;">libros en biblioteca</h4>               
                <ul class="list-group">

                <?php

                try {
                      $conexion = new PDO('mysql:host=localhost;dbname=biblioteca', "root", "");
                          
                  } catch (PDOException $e) {
                      print "¡Error!: " . $e->getMessage() . "<br/>";
                      die();
                  }

                  try
                  {
                  $sql = $conexion->prepare("SELECT * FROM libros");
                  $sql->execute();
                  while ( $fila = $sql->fetch()) {
                    ?>
                  <li class="list-group-item" style="color: black;">

                    codigo = <?php echo $fila['codigo_libro']?>, 
                    nombre = <?php echo $fila['nombre_libro']?>, 
                    autor = <?php echo $fila['autor_libro']?>, 
                    tipo = <?php echo $fila['tipo_de_libro']?>,
                    estado = <?php echo $fila['estado_del_libro']?> <!--boton para poder eliminar-->

                      <span class="fa-stack  float-right eliminar" id="<?php echo $fila['codigo_libro']?>" style="color:red; cursor: pointer;" title="Eliminar Registro">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-trash fa-stack-1x fa-inverse"></i>
                      </span>

                  </li>                    
                    
                    <?php
                  }
                }
                catch(Exception $ex)
                {
                    print "¡Error!: " . $ex->getMessage() . "<br/>";
                      die();
                }
                ?>
                </ul>
         
        <br>
        </form>
        <button type="button" class="close" data-dismiss="modal" arial-label="close">
         &times; Salir
        </button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<br>
<div class="container">
  <h3 style="color: white";>recarga la pagina para reflejar cambios</h3>

</div>

</div>
</div>
<script>

       $(".eliminar").click(function(){
        var clave = $(this).attr("id"); //aqui esta el error
        alert(clave);
        var data={'opc':'eliminar', 'clave':clave};
        $.ajax({
          url : "conexion/procesa.php",
          data : data,
          type : "POST",
          success: function()
          {
            
            //location.reload(); en caso de que funcione volver a activar
          }
        })
      });
       
</script>

</body>
</html>


<script type="text/javascript">
  $(document).ready(function(){
    $('#btnguardar').click(function(){
    var datos=$('#frmajax').serialize();
      $.ajax({
        type:"POST",
        url:"conexion/envia.php",
        data:datos,
        success:function(r){
          if(r==1){
            alert("agregado con exito");
          }else{
            alert("Fallo el server");
          }
        }
      });

      return false;
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#guardar2').click(function(){
    var datos=$('#frmadjax').serialize();
   
      $.ajax({
        type:"POST",
        url:"conexion/enviar2.php",
        data:datos,
        success:function(r){
          if(r==1){
            alert("agregado con exito");
          }else{
            alert("Fallo el server");
          }
        }
      });

      return false;
    });
  });
</script>
<!--para eliminar datos XD   -->
