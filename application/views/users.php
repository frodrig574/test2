<?php
	if(isset($message))
	{
	echo "<script>alert('".$message."');</script>";
	}
		if(isset($message_first_user))
	{
	echo "<script>alert('".$message_first_user."');</script>";
	}
$user=array(
	"name"=>"user",
	"id" => "user",
	"type"=>"email",
	"class"=>"form-control",
	"required" =>"required"
	);
$pass=array(
	"name"=>"pass",
	"id" => "pass",
	"type"=> "password",
	"class"=>"form-control",
	"required" =>"required",
	"value" => set_value("fecha"),
	);
$pass_confirmation=array(
	"name"=>"confirm",
	"id" => "confirm",
	"type"=> "password",
	"class"=>"form-control",
	"required" =>"required"
	);
$saveuser=array(
	"name"=>"save",
	"value" => "Guardar",
	"class" => "btn btn-info validate",
	"disabled" => "disabled"
	);
$cancel=array(
	"name" => "cancel",
	"content" => "Cancelar",
	"id" => "cancelUsuarios",
	"class" => "btn btn-danger"
	);

?>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2 col-xs-12 col-md-6 col-md-offset-3">
		<div class="content-form-rol">
			<header><p>usuarios</p><i class="icons fa fa-plus-circle addusuarios" ></i></header>
			<div class="addUsuarios" id="addUsuarios">
				<?=form_open(base_url()."Userlog/addUsers")?>
					<div class="row">
						<div class="col-sm-12" style="padding:40px;">
							<div class="form-group">
								<?=form_label("Usuario","users")?>
								<?=form_input($user)?>
							</div>
							<div class="form-group">
								<?=form_label("Clave","pass")?>
								<?=form_input($pass)?>
							</div>
							<div class="form-group">
								<?=form_label("Confirmar clave","confirm")?>
								<?=form_input($pass_confirmation)?>
							</div>
							<div class="form-group" style="text-align: center;">
								<?=form_submit($saveuser)?>
								<?=form_button($cancel)?>
							</div>
						</div>
					</div>
					<div id="inputhide"></div>
				<?=form_close()?>
			</div>
			<div class="listUser">

			</div>
		</div>
	</div>
</div>
