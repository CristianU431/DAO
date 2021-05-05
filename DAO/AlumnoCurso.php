<?php 
class AlumnoCurso
{
	private $curso_id;
	private $alumno_id;

	
	
	public function setCurso($curso_id){
		$this->curso_id = $curso_id;
	}

	public function getCurso(){
		return $this->curso_id;
	}

	public function setAlumno($alumno_id){
		$this->alumno_id = $alumno_id;
	}

	public function getAlumno(){
		return $this->alumno_id;
	}

	
}
?>