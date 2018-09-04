<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Userlog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
		$this->load->helper("head");
		$this->load->helper("header_Responsive");
		echo head();
		echo header_responsive();
	}
	public function index()
	{
		if($this->session->userdata('login'))
		{
			$data=array();
			$data['email']=$this->session->userdata('email');
			$this->load->view("loggedId",$data);

		}else
		{
			redirect("/session_user");
			delete_cookie("login",$domain,$path);
		}
	}
		public function session_finish()
	{
		$user_sess=array(
			"login"=>false
		);
		$this->session->set_userdata($user_sess);
		redirect("/session_user");
		delete_cookie("login",$domain,$path);
	}
	public function entrada()
	{
		if($this->session->userdata('login'))
		{
			$messageRol["message"] = $this->session->flashdata("messageRol");
			$messageRol["message_first_user"] = $this->session->flashdata("mesj_empty_rol");
				$this->load->view("entrada",$messageRol);
		}else
		{
			redirect("/session_user");
			delete_cookie("login",$domain,$path);
		}
	}
		public function addDocuments()
	{
		if($this->session->userdata('login'))
		{
			$this->load->model("entrada_model");
			$numero =$this->input->post("numero");
			$fecha =$this->input->post("fecha");
			$fecha_recibido =$this->input->post("fecha_recibido");
			$dependencia=$this->input->post("dependencia");
			$tipo=$this->input->post("tipo");
			$asunto=$this->input->post("asunto");
			$resumen=$this->input->post("resumen");
			if(!$this->input->post("id"))
			{
				$insertEntrada = $this->entrada_model->insert_entrada($numero,$fecha,$fecha_recibido,$dependencia,$asunto,$tipo,$resumen);
				if($insertEntrada==0){
					$this->form_validation->set_rules("numero","numero","required");
					$this->form_validation->set_rules("fecha","fecha","required");
					$this->form_validation->set_rules("fecha_recibido","fecha_recibido","required");
					$this->form_validation->set_rules("asunto","asunto","required");
					$this->form_validation->set_rules("tipo","tipo","required");
					$this->form_validation->set_rules("resumen","resumen","required");
					$this->form_validation->set_rules("dependencia","dependencia","required");
					if($this->form_validation->run()==true)
					{
						$this->session->set_flashdata('messageRol','¡Documento registrado exitosamente!');
					}else
					{
						$this->session->set_flashdata('messageRol','¡Falto llenar algunos campos!');
					}
				}else{
					$this->session->set_flashdata('messageRol','¡Documento ya registrado!');
				}
			}
			else
			{
				$updateEntrada = $this->entrada_model->update_entrada($this->input->post("id"),$numero,$fecha,$fecha_recibido,$dependencia,$asunto,$tipo,$resumen);
				if($this->form_validation->run()==true)
				{
					$this->session->set_flashdata('messageRol','¡Falto llenar algunos campos!');
				}else
				{
					$this->session->set_flashdata('messageRol','¡Documento modoficado exitosamente!');
				}
			}
			redirect("/userlog/entrada");
		}else
		{
			redirect("/session_user");
			delete_cookie("login",$domain,$path);
		}
	}
	public function deleteEntrada($id)
	{
		if($this->session->userdata('login'))
		{
			$this->load->model("Entrada_model");
			$this->Entrada_model->delete_entrada($id);
			$this->session->set_flashdata("messageRol",'¡El Documento ha sido eliminado!');
			redirect("/userlog/entrada");
		}
		else
		{
			redirect("/session_user");
			delete_cookie("login",$domain,$path);
		}
	}
  // salida
	public function salida()
	{
		if($this->session->userdata('login'))
		{
			$messageRol["message"] = $this->session->flashdata("messageRol");
			$messageRol["message_first_user"] = $this->session->flashdata("mesj_empty_rol");
				$this->load->view("salida",$messageRol);
		}else
		{
			redirect("/session_user");
			delete_cookie("login",$domain,$path);
		}
	}
		public function addSalida()
	{
		if($this->session->userdata('login'))
		{
			$this->load->model("salida_model");
			$numero =$this->input->post("numero");
			$fecha =$this->input->post("fecha");
			$fecha_recibido =$this->input->post("fecha_recibido");
			$dependencia=$this->input->post("dependencia");
			$tipo=$this->input->post("tipo");
			$asunto=$this->input->post("asunto");
			$resumen=$this->input->post("resumen");
			if(!$this->input->post("id"))
			{
				$insertSalida = $this->salida_model->insert_salida($numero,$fecha,$fecha_recibido,$dependencia,$asunto,$tipo,$resumen);
				if($insertSalida==0){
					$this->form_validation->set_rules("numero","numero","required");
					$this->form_validation->set_rules("fecha","fecha","required");
					$this->form_validation->set_rules("fecha_recibido","fecha_recibido","required");
					$this->form_validation->set_rules("asunto","asunto","required");
					$this->form_validation->set_rules("tipo","tipo","required");
					$this->form_validation->set_rules("resumen","resumen","required");
					$this->form_validation->set_rules("dependencia","dependencia","required");
					if($this->form_validation->run()==true)
					{
						$this->session->set_flashdata('messageRol','¡Documento registrado exitosamente!');
					}else
					{
						$this->session->set_flashdata('messageRol','¡Falto llenar algunos campos!');
					}
				}else{
					$this->session->set_flashdata('messageRol','¡Documento ya registrado!');
				}
			}
			else
			{
				$updateSalida = $this->salida_model->update_salida($this->input->post("id"),$numero,$fecha,$fecha_recibido,$dependencia,$asunto,$tipo,$resumen);
				if($this->form_validation->run()==true)
				{
					$this->session->set_flashdata('messageRol','¡Falto llenar algunos campos!');
				}else
				{
					$this->session->set_flashdata('messageRol','¡Documento modoficado exitosamente!');
				}
			}
			redirect("/userlog/salida");
		}else
		{
			redirect("/session_user");
			delete_cookie("login",$domain,$path);
		}
	}
	public function deleteSalida($id)
	{
		if($this->session->userdata('login'))
		{
			$this->load->model("Salida_model");
			$this->Salida_model->delete_salida($id);
			$this->session->set_flashdata("messageRol",'¡El Documento ha sido eliminado!');
			redirect("/userlog/salida");
		}
		else
		{
			redirect("/session_user");
			delete_cookie("login",$domain,$path);
		}
	}
// users
public function users()
{
	if($this->session->userdata('login'))
	{
		$messageRol["message"] = $this->session->flashdata("messageRol");
		$messageRol["message_first_user"] = $this->session->flashdata("mesj_empty_rol");
			$this->load->view("users",$messageRol);
	}else
	{
		redirect("/session_user");
		delete_cookie("login",$domain,$path);
	}
}
	public function addUsers()
{
	if($this->session->userdata('login'))
	{
		$this->load->model("user_model");
		$user =$this->input->post("user");
		$pass =$this->input->post("pass");
		if(!$this->input->post("id"))
		{
			$insertUser = $this->user_model->insert_user($user,$pass);
			if($insertUser==0){
				$this->form_validation->set_rules("user","user","required");
				$this->form_validation->set_rules("pass","pass","required");
				if($this->form_validation->run()==true)
				{
					$this->session->set_flashdata('messageRol','¡Usuario registrado exitosamente!');
				}else
				{
					$this->session->set_flashdata('messageRol','¡Falto llenar algunos campos!');
				}
			}else{
				$this->session->set_flashdata('messageRol','¡Usuario ya registrado!');
			}
		}
		else
		{
			$updateUser = $this->user_model->update_user($this->input->post("id"),$user,$pass);
			if($this->form_validation->run()==true)
			{
				$this->session->set_flashdata('messageRol','¡Falto llenar algunos campos!');
			}else
			{
				$this->session->set_flashdata('messageRol','¡Usuario modoficado exitosamente!');
			}
		}
		redirect("/userlog/users");
	}else
	{
		redirect("/session_user");
		delete_cookie("login",$domain,$path);
	}
}
public function deleteUser($id)
{
	if($this->session->userdata('login'))
	{
		$this->load->model("user_model");
		$this->user_model->delete_user($id);
		$this->session->set_flashdata("messageRol",'¡El Usuario ha sido eliminado!');
		redirect("/userlog/users");
	}
	else
	{
		redirect("/session_user");
		delete_cookie("login",$domain,$path);
	}
}

	public function __destruct()
	{
		$this->load->helper("footer_responsive");
		$this->load->helper("footer");
		echo footer_responsive();
		echo footer();
	}

}
?>
