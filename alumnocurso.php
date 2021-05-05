<!DOCTYPE html>
<html>
<head>
	<title>Mantenimiento de Alumno-Curso</title>
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
	include ('DAO/AlumnoCursoDAO.php');
	$dao = new AlumnoCursoDAO();
	if($_POST){
		if(isset($_POST['btnAgregar'])) {
			$alumnocurso = new AlumnoCurso();
            $alumnocurso->setAlumno($_POST["txtalumno"]);
			$alumnocurso->setCurso($_POST["txtcurso"]);
			
			$i =  $dao->Agregar($alumnocurso);
			if ($i == 1) {
				echo "<script>alert('Se agrego alumnocurso');</script>";
			}
			else {
				echo "<script>alert('Error: no se agrego alumnocurso');</script>";	
			}
		}
		else if (isset($_POST['btnEliminar'])) {	
            $i = $dao->Eliminar($_POST["txtalumno"]);		
			$i = $dao->Eliminar($_POST["txtcurso"]);
			if ($i == 1) {
				echo "<script>alert('Se elimino alumnocurso');</script>";
			}
			else {
				echo "<script>alert('Error: no se elimino alumnocurso');</script>";	
			}
		}
		else if (isset($_POST['btnActualizar'])) {
			$alumnocurso = new AlumnoCurso();
            $alumnocurso->setAlumno($_POST["txtalumno"]);
			$alumnocurso->setCurso($_POST["txtcurso"]);
			
			$i =  $dao->Agregar($alumnocurso);
			if ($i == 1) {
				echo "<script>alert('Se actualizo AlumnoCurso');</script>";
			}
			else {
				echo "<script>alert('Error: no se actualizo AlumnoCurso');</script>";	
			}
		}
	}
	?>
	<form action="#" method="POST">
		<p>Mantenimiento de AlumnoCurso</p>	
		<p>Alumno:  <input type="text" name="txtalumno"></p>
		<p>Curso:  <input type="text" name="txtcurso"></p>
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

