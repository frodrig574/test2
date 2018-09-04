<?php
class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function select_user()
	{
		$this->db->select("*");
		$this->db->from("session");
		$this->db->where("user!='test@gmail.com'");
		return $this->db->get()->result();
	}

	public function select_user_id($id)
	{
		$this->db->select("*");
		$this->db->from("session");
		$this->db->where("id",$id);
		return $this->db->get()->result_array();
	}
	public function insert_user($user,$pass)
	{
		$passw=md5($pass);
		$data = array(
			"user" => $user,
			"pass" => $passw
			);
			$this->db->select("*");
			$this->db->from("session");
			$this->db->where("user",$user);
			$result = $this->db->get();
		$cont = $result ->row();
		if($cont==null)
		{
		$this->db->insert("session",$data);
		}
		return $cont;
	}
	public function update_user($id,$user,$pass)
	{
		$data = array(
			"user" => $user,
			"pass" => $pass,
			);
		$this->db->where("id",$id);
		$this->db->update("session",$data);
	}
	public function delete_user($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("session");
	}
}

?>
