<?php 
include 'IAlumnoCurso.php';
include 'DataSource.php';
include 'AlumnoCurso.php';

class AlumnoCursoDAO implements IAlumnoCurso
{
	public function Listar(){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT Alumno_id,Curso_id, FROM talumnocurso");
		$alumnocurso = null;
		$alumnocursos = array();

		foreach ($data_table as $clave=>$valor) {
			$alumnocurso = new AlumnoCurso();
			$alumnocurso->setAlumno( $data_table[$clave]["alumno_id"] );
			$alumnocurso->setCurso( $data_table[$clave]["curso_id"] );		
			array_push($alumnocursos, $alumnocurso);
		}
		return $alumnocursos;
	}
	
	public function Agregar(AlumnoCurso $alumnocurso){
		$data_source = new DataSource();

		$sql = "INSERT INTO talumnocurso VALUES (:alumno_id,:curso_id)";

		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':alumno_id'=>$alumnocurso->getAlumno(),
			':curso_id'=>$alumnocurso->getCurso()
			)
		);
		return $resultado;		
	}

	public function Actualizar(AlumnoCurso $alumnocurso){
		$data_source = new DataSource();
		$sql = "UPDATE talumnocurso  
				WHERE curso = :curso , alumno = :alumno";
		$resultado = $data_source->ejecutarActualizacion($sql,array(						
			':alumno'=>$alumnocurso->getAlumno(),
			':curso'=>$alumnocurso->getCurso()
			)
		);
		return $resultado;
	}

	public function Eliminar($alumno){
		$data_source = new DataSource();
		$resultado = $data_source->ejecutarActualizacion("DELETE FROM talumnocurso WHERE Alumno_id = :alumno",
			array(':curso'=>$alumno));
		return $resultado;
	}
}
?>