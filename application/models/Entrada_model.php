<?php
class Entrada_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function select_entrada()
	{
		$this->db->select("*");
		$this->db->from("entrada");
		return $this->db->get()->result();
	}

	public function select_entrada_id($id)
	{
		$this->db->select("*");
		$this->db->from("entrada");
		$this->db->where("id",$id);
		return $this->db->get()->result_array();
	}
	public function insert_entrada($numero,$fecha,$fecha_recibido,$dependencia,$asunto,$tipo,$resumen)
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
		$this->db->insert("entrada",$data);
	}
	public function update_entrada($id,$numero,$fecha,$fecha_recibido,$dependencia,$asunto,$tipo,$resumen)
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
		$this->db->update("entrada",$data);
	}
	public function delete_entrada($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("entrada");
	}
}

?>
