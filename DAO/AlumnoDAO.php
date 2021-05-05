<?php 
include 'IAlumno.php';
include 'DataSource.php';
include 'Alumno.php';

class AlumnoDAO implements IAlumno
{
	public function Listar(){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT id,nombre,apellido,sexo,fechanacimiento,fecharegistro,correo FROM talumno");
		$alumno = null;
		$alumnos = array();

		foreach ($data_table as $clave=>$valor) {
			$alumno = new Alumno();
			$alumno->setId( $data_table[$clave]["id"] );
			$alumno->setNombre( $data_table[$clave]["nombre"] );
			$alumno->setApellido( $data_table[$clave]["apellido"] );
			$alumno->setSexo( $data_table[$clave]["sexo"] );
			$alumno->setFechaNacimiento( $data_table[$clave]["fechanacimiento"] );		
            $alumno->setFechaRegistro( $data_table[$clave]["fecharegistro"] );
            $alumno->setCorreo( $data_table[$clave]["correo"] );			
			array_push($alumnos, $alumno);
		}
		return $alumnos;
	}
	
	public function Agregar(Alumno $alumno)
	{
		$data_source = new DataSource();

		$sql = "INSERT INTO talumno VALUES (:id,:nombre,:apellido,:sexo,:fechanacimiento,:fecharegistro,:correo)";

		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':id'=>$alumno->getId(),
			':nombre'=>$alumno->getNombre(),			
			':apellido'=>$alumno->getApellido(),
			':sexo'=>$alumno->getSexo(),
			':fechanacimiento'=>$alumno->getFechaNacimiento(),
            ':fecharegistro'=>$alumno->getFechaRegistro(),
            ':correo'=>$alumno->getCorreo()			
			)
		);
		return $resultado;		
	}

	public function Actualizar(Alumno $alumno){
		$data_source = new DataSource();
		$sql = "UPDATE talumno SET nombre = :nombre, apellido = :apellido, sexo = :sexo, fechanacimiento = :fechanacimiento, fecharegistro = :fecharegistro, correo = :correo			
				WHERE Id = :id";
		$resultado = $data_source->ejecutarActualizacion($sql,array(
			
			':nombre'=>$alumno->getNombre(),			
			':apellido'=>$alumno->getApellido(),
			':sexo'=>$alumno->getSexo(),
			':fechanacimiento'=>$alumno->getFechaNacimiento(),	
            ':fecharegistro'=>$alumno->getFechaRegistro(),
            ':correo'=>$alumno->getCorreo(),
			':id'=>$alumno->getId()

			)
		);
		return $resultado;
	}

	public function Eliminar($id){
		$data_source = new DataSource();
		$resultado = $data_source->ejecutarActualizacion("DELETE FROM talumno WHERE id = :id",
			array(':id'=>$id));
		return $resultado;
	}
}
?>