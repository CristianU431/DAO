<?php 
include 'ICurso.php';
include 'DataSource.php';
include 'Curso.php';

class CursoDAO implements ICurso
{
	public function Listar(){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT id,nombre FROM tcurso");
		$curso = null;
		$cursos = array();

		foreach ($data_table as $clave=>$valor) {
			$curso = new Curso();
			$curso->setId( $data_table[$clave]["id"] );
			$curso->setNombre( $data_table[$clave]["nombre"] );		
			array_push($cursos, $curso);
		}
		return $cursos;
	}
	
	public function Agregar(Curso $curso){
		$data_source = new DataSource();

		$sql = "INSERT INTO tcurso VALUES (:id,:nombre)";

		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':id'=>$curso->getId(),
            ':nombre'=>$curso->getNombre()			
			)
		);
		return $resultado;		
	}

	public function Actualizar(Curso $curso){
		$data_source = new DataSource();
		$sql = "UPDATE tcurso SET nombre = :nombre WHERE id = :id";
		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':nombre'=>$curso->getNombre(),
			':id'=>$curso->getId()
			)
		);
		return $resultado;
	}

	public function Eliminar($id){
		$data_source = new DataSource();
		$resultado = $data_source->ejecutarActualizacion("DELETE FROM tcurso WHERE id = :id",
			array(':id'=>$id));
		return $resultado;
	}
}
?>