<!DOCTYPE html>
<html>
<head>
	<title>Mantenimiento de Alumno</title>
	<link rel="stylesheet" href="css/estilo.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse text-center" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">D.S II</a>
    </div>
    <ul class="nav navbar-nav">
	<li><a href="alumno.php">Alumno</a></li>
	<li><a href="curso.php">Curso</a></li>
	<li><a href="alumnocurso.php">Alumno-Curso</a></li>
	<li><a href="logout.php">CERRAR SESION</a></li>
    </ul>

  </div>
</nav>
	<?php
	include ('DAO/AlumnoDAO.php');
	$dao = new AlumnoDAO();
	if($_POST){
		if(isset($_POST['btnAgregar'])) {
			$alumno = new Alumno();
			$alumno->setId($_POST["txtid"]);
			$alumno->setNombre($_POST["txtnombre"]);
			$alumno->setApellido($_POST["txtapellido"]);
			$alumno->setSexo($_POST["txtsexo"]);
			$alumno->setFechaNacimiento($_POST["txtfechanacimiento"]);
            $alumno->setFechaRegistro($_POST["txtfecharegistro"]);
            $alumno->setCorreo($_POST["txtcorreo"]);
			$i =  $dao->Agregar($alumno);
			if ($i == 1) {
				echo "<script>alert('Se agrego alumno');</script>";
			}
			else {
				echo "<script>alert('Error: no se agrego alumno');</script>";	
			}
		}
		else if (isset($_POST['btnEliminar'])) {			
			$i = $dao->Eliminar($_POST["txtid"]);
			if ($i == 1) {
				echo "<script>alert('Se elimino alumno');</script>";
			}
			else {
				echo "<script>alert('Error: no se elimino alumno');</script>";	
			}
		}
		else if (isset($_POST['btnActualizar'])) {
			$alumno = new Alumno();
			$alumno->setId($_POST["txtid"]);
			$alumno->setNombre($_POST["txtnombre"]);
			$alumno->setApellido($_POST["txtapellido"]);
			$alumno->setSexo($_POST["txtsexo"]);
			$alumno->setFechaNacimiento($_POST["txtfechanacimiento"]);
            $alumno->setFechaRegistro($_POST["txtfecharegistro"]);
            $alumno->setCorreo($_POST["txtcorreo"]);
			$i =  $dao->Actualizar($alumno);
			if ($i == 1) {
				echo "<script>alert('Se actualizo alumno');</script>";
			}
			else {
				echo "<script>alert('Error: no se actualizo alumno');</script>";	
			}
		}
	}
	?>
	<form action="#" method="POST">
		<p>Mantenimiento de Alumno</p>	
		<p>Id:  <input type="text" name="txtid"></p>
		<p>Nombre:  <input type="text" name="txtnombre"></p>
		<p>Apellido:  <input type="text" name="txtapellido"></p>
		<p>Sexo:  <input type="text" name="txtsexo"></p>
		<p>FechaNacimiento:  <input type="text" name="txtfechanacimiento"></p>
        <p>FechaRegistro:  <input type="text" name="txtfecharegistro"></p>
        <p>Correo:  <input type="text" name="txtcorreo"></p>
		<p><input type="submit" name="btnAgregar" value="Agregar" >
		<input type="submit" name="btnEliminar" value="Eliminar" >
		<input type="submit" name="btnActualizar" value="Actualizar" ></p>
	</form>	
	<?php
		echo "Listar <br>";
		print_r($dao->Listar());
	?>
</body>
</html>

