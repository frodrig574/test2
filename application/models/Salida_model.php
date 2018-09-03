<?php
class Salida_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function select_salida()
	{
		$this->db->select("*");
		$this->db->from("salida");
		return $this->db->get()->result();
	}

	public function select_salida_id($id)
	{
		$this->db->select("*");
		$this->db->from("salida");
		$this->db->where("id",$id);
		return $this->db->get()->result_array();
	}
	public function insert_salida($numero,$fecha,$fecha_recibido,$dependencia,$asunto,$tipo,$resumen)
	{
		$data = array(
			"numero" => $numero,
			"fecha" => $fecha,
			"fecha_recibido" => $fecha_recibido,
			"dependencia" => $dependencia,
			"asunto" => $asunto,
			"tipo" => $tipo,
			"resumen" => $resumen
			);
		$this->db->insert("salida",$data);
	}
	public function update_salida($id,$numero,$fecha,$fecha_recibido,$dependencia,$asunto,$tipo,$resumen)
	{
		$data = array(
			"numero" => $numero,
			"fecha" => $fecha,
			"fecha_recibido" => $fecha_recibido,
			"dependencia" => $dependencia,
			"asunto" => $asunto,
			"tipo" => $tipo,
			"resumen" => $resumen
			);
		$this->db->where("id",$id);
		$this->db->update("salida",$data);
	}
	public function delete_salida($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("salida");
	}
}

?>
