<?php 
class Alumno
{
	//private $id;
	private $id;
	private $nombre;
	private $apellido;
	private $sexo;
    private $fechanacimiento;
    private $fecharegistro;
    private $correo;
	
	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getSexo(){
		return $this->sexo;
	}	

	public function setFechaNacimiento($fechaNacimiento){
		$this->fechaNacimiento = $fechaNacimiento;
	}

	public function getFechaNacimiento(){
		return $this->fechaNacimiento;
	}

	public function setFechaRegistro($fechaRegistro){
		$this->fechaRegistro = $fechaRegistro;
	}

	public function getFechaRegistro(){
		return $this->fechaRegistro;
	}

	public function setCorreo($correo){
		$this->correo = $correo;
	}

	public function getCorreo(){
		return $this->correo;
	}
}
?>