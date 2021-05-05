<?php 
interface IAlumnoCurso
{
	public function Listar();	
	public function Agregar(AlumnoCurso $alumnocurso);
	public function Actualizar(AlumnoCurso $alumnocurso);
	public function Eliminar($alumno);
}
?>