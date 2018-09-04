<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax_selection extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function selectEntrada()
	{
		if($this->session->userdata('login'))
		{
			$this->load->model("entrada_model");
			//select
			$dataEntrada = $this->entrada_model->select_entrada();
			if($dataEntrada!=NULL)
			{
				$listRol='<table class="tableList">';
				$x=0;
				foreach($dataEntrada as $data)
				{
					$x=$x + 1;
					$listRol.='<tr class="listTr"><td class="listTd">'.$data->numero.'</td><td class="listTdDocuments">'.$data->fecha.'</td><td class="listTdDocuments">'.$data->fecha_recibido.'</td><td class="listTdDocuments">'.$data->dependencia.'</td><td class="listTdDocuments">'.$data->asunto.'</td><td class="listTdDocuments">'.$data->tipo.'</td><td class="listTdicons"><a onclick=\'edit("'.$data->id.'")\'><i class="glyphicon glyphicon-pencil icon"></i></a></td><td class="listTdicons"><a onclick=\'deleteEntrada("'.$data->id.'")\'><i class="fa fa-trash-o icon" style="color:red"></i></a></td></tr>';
				}
				$listRol.='</table>';
			}
			else
			{
				$listRol='<div class="messageNullRol">No hay roles registrados</div>';
			}
			echo $listRol;
		}else
		{
			redirect("/session_user");
			delete_cookie("login",$domain,$path);
		}
	}

	public function selectEntradaId($id)
	{
		if($this->session->userdata('login'))
		{
			$this->load->model("entrada_model");
			$data = $this->entrada_model->select_entrada_id($id);
				echo json_encode($data);
		}else
		{
			redirect("/session_user");
			delete_cookie("login",$domain,$path);
		}
	}
  // Salida
	public function selectSalida()
	{
		if($this->session->userdata('login'))
		{
			$this->load->model("salida_model");
			//select
			$dataSalida = $this->salida_model->select_salida();
			if($dataSalida!=NULL)
			{
				$listRol='<table class="tableList">';
				$x=0;
				foreach($dataSalida as $data)
				{
					$x=$x + 1;
					$listRol.='<tr class="listTr"><td class="listTd">'.$data->numero.'</td><td class="listTdDocuments">'.$data->fecha.'</td><td class="listTdDocuments">'.$data->fecha_recibido.'</td><td class="listTdDocuments">'.$data->dependencia.'</td><td class="listTdDocuments">'.$data->asunto.'</td><td class="listTdDocuments">'.$data->tipo.'</td><td class="listTdicons"><a onclick=\'editSalida("'.$data->id.'")\'><i class="glyphicon glyphicon-pencil icon"></i></a></td><td class="listTdicons"><a onclick=\'deleteSalida("'.$data->id.'")\'><i class="fa fa-trash-o icon" style="color:red"></i></a></td></tr>';
				}
				$listRol.='</table>';
			}
			else
			{
				$listRol='<div class="messageNullRol">No hay roles registrados</div>';
			}
			echo $listRol;
		}else
		{
			redirect("/session_user");
			delete_cookie("login",$domain,$path);
		}
	}

	public function selectSalidaId($id)
	{
		if($this->session->userdata('login'))
		{
			$this->load->model("salida_model");
			$data = $this->salida_model->select_salida_id($id);
				echo json_encode($data);
		}else
		{
			redirect("/session_user");
			delete_cookie("login",$domain,$path);
		}
	}
// usuarios
public function selectUsers()
{
	if($this->session->userdata('login'))
	{
		$this->load->model("user_model");
		//select
		$dataSalida = $this->user_model->select_user();
		if($dataSalida!=NULL)
		{
			$listRol='<table class="tableList">';
			$x=0;
			foreach($dataSalida as $data)
			{
				$x=$x + 1;
				$listRol.='<tr class="listTr"><td class="listTd">'.$x.'</td><td class="listTd">'.$data->user.'</td><td class="listTdicons"><a onclick=\'editUsers("'.$data->id.'")\'><i class="glyphicon glyphicon-pencil icon"></i></a></td><td class="listTdicons"><a onclick=\'deleteUser("'.$data->id.'")\'><i class="fa fa-trash-o icon" style="color:red"></i></a></td></tr>';
			}
			$listRol.='</table>';
		}
		else
		{
			$listRol='<div class="messageNullRol">No hay usuarios registrados</div>';
		}
		echo $listRol;
	}else
	{
		redirect("/session_user");
		delete_cookie("login",$domain,$path);
	}
}

public function selectUserId($id)
{
	if($this->session->userdata('login'))
	{
		$this->load->model("user_model");
		$data = $this->user_model->select_user_id($id);
			echo json_encode($data);
	}else
	{
		redirect("/session_user");
		delete_cookie("login",$domain,$path);
	}
}

}
