<?php
	if(isset($message))
	{
	echo "<script>alert('".$message."');</script>";
	}
		if(isset($message_first_user))
	{
	echo "<script>alert('".$message_first_user."');</script>";
	}
$nro=array(
	"name"=>"numero",
	"id" => "numero",
	"type"=>"number",
	"class"=>"form-control",
	"required" =>"required"
	);
$fecha=array(
	"name"=>"fecha",
	"id" => "fecha",
	"class"=>"form-control",
	"required" =>"required",
	"value" => set_value("fecha"),
	);
$fecha_recibido=array(
	"name"=>"fecha_recibido",
	"id" => "fecha_recibido",
	"class"=>"form-control",
	"required" =>"required"
	);
$dependencia=array(
	"name"=>"dependencia",
	"id" => "dependencia",
	"class"=>"form-control",
	"required" =>"required"
	);
$asunto=array(
	"name"=>"asunto",
	"id" => "asunto",
	"class"=>"form-control",
	"required" =>"required"
	);
$tipo=array(
	"name"=>"tipo",
	"id" => "tipo",
	"class"=>"form-control",
	"required" =>"required"
	);
$resumen=array(
	"name"=>"resumen",
	"id" => "resumen",
	"class"=>"form-control",
	"required" =>"required"
	);

$savesalida=array(
	"name"=>"save",
	"value" => "Guardar",
	"class" => "btn btn-info"
	);
$cancel=array(
	"name" => "cancel",
	"content" => "Cancelar",
	"id" => "cancelSalida",
	"class" => "btn btn-danger"
	);

?>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2 col-xs-12 col-md-6 col-md-offset-3">
		<div class="content-form-rol">
			<header><p>documentos de salida</p><i class="icons fa fa-plus-circle addsalida" ></i></header>
			<div class="addSalida" id="addSalida">
				<?=form_open(base_url()."Userlog/addSalida")?>
					<div class="row">
						<div class="col-sm-12" style="padding:40px;">
							<div class="form-group">
								<?=form_label("Numero","numero")?>
								<?=form_input($nro)?>
							</div>
							<div class="form-group">
								<?=form_label("Fecha","fecha")?>
								<div class='input-group date' id='datetimepicker10'>
		                			<?=form_input($fecha);?>
		                			<span class="input-group-addon">
		                    			<span class="glyphicon glyphicon-calendar">
										</span>
									</span>
		            </div>
								<div class="err" id="fecha"><?php echo form_error('fecha'); ?></div>
							</div>
							<div class="form-group">
								<?=form_label("Fecha recibido","fecha_recibido")?>
								<div class='input-group date' id='datetimepicker1'>
		                			<?=form_input($fecha_recibido);?>
		                			<span class="input-group-addon">
		                    			<span class="glyphicon glyphicon-calendar">
										</span>
									</span>
		            </div>
								<div class="err" id="fecha"><?php echo form_error('fecha_recibido'); ?></div>
							</div>
							<div class="form-group">
								<?=form_label("Dependencia","dependencia")?>
								<?=form_input($dependencia)?>
							</div>
							<div class="form-group">
								<?=form_label("Asunto","asunto")?>
								<?=form_input($asunto)?>
							</div>
							<div class="form-group">
								<?=form_label("Tipo","tipo")?>
								<?=form_input($tipo)?>
							</div>
							<div class="form-group">
								<?=form_label("Resumen","resumen")?>
								<?=form_input($resumen)?>
							</div>
							<div class="form-group" style="text-align: center;">
								<?=form_submit($savesalida)?>
								<?=form_button($cancel)?>
							</div>
						</div>
					</div>
					<div id="inputhide"></div>
				<?=form_close()?>
			</div>
			<div class="listSalida">

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
            $('#datetimepicker10').datetimepicker({
                viewMode: 'years',
                format: 'YYYY-MM-DD',
                minDate: new Date(1950, 10 - 1, 25),
                maxDate: new Date()
            });
						$('#datetimepicker1').datetimepicker({
								viewMode: 'years',
								format: 'YYYY-MM-DD',
								minDate: new Date(1950, 10 - 1, 25),
								maxDate: new Date()
						});
    </script>
