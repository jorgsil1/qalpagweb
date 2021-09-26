<?php
if(isset($_GET['editar']))
	{
		$editar_id=$_GET['editar'];
		$consulta="SELECT *FROM registro WHERE id='$editar_id'";
		$ejecutar=mysqli_query($conexion,$consulta);
		$fila=mysqli_fetch_array($ejecutar);
			$id=	 	     $fila['id'];
			$idrol=		     $fila['idrol'];
			$nombre=	     $fila['nombre'];
			$apellido=	     $fila['apellido'];
			$email=		     $fila['email'];
			$celular=	     $fila['celular'];
			$usuario=	     $fila['usuario'];
			$clave=		     $fila['clave'];
			$nombrepac=	     $fila['nombrepac'];
			$apellidopac=    $fila['apellidopac'];
			$tipoid=	     $fila['tipodocumento'];
			$numerodocumento=$fila['numerodocumento'];
		 	$fechanacimiento=$fila['fechanacimiento'];
			$eps=			 $fila['eps'];
	}
?>
<style type="text/css">
.contenido2{
	width: 95%;
	height: 10%;
	font-size: 20px;
}
.legend{
	font-family: fantasy;
	font-size: 20px;
}
#boton{
	width: 200px;
	height: 50px;
	border-radius: 45%;
	font-size: fantasy;
	font-size: 20px;
	background: orange;
}

</style>
<div class="contenido2">
<form method="POST" action="" align="center">
	<legend class="legend">Tipo de usuario</legend>
		<select name="idrol" id="idrol"  value="<?php echo $idrol; ?>">
		<option selected>Tipo de usuario</option>	
		<option value="1">Paciente</option>
		<option value="2">Visitante</option>
		<option value="3">administrador</option>
		</select><br>

		Nombres<input type="text" name="nombre" id="nombre" placeholder="Ingrese sus Nombres" required=""   
		value="<?php echo $nombre; ?>">

		Apellidos<input type="text" name="apellido" id="apellido" placeholder="Ingrese sus Apellidos" required="" value="<?php echo $apellido; ?>"><br>
		
		Email<input type="email" name="email" id="email" placeholder="Ingrese su correo" required="" value="<?php echo $email; ?>">

		Celular<input type="text" name="celular" id="celular" placeholder="Numero de celular" required="" value="<?php echo $celular; ?>"><br>

		Usuario<input type="text" name="usuario" id="usuario" placeholder="Indique usuario" required="" value="<?php echo $usuario; ?>">

		Password<input type="password" name="clave" id="clave" placeholder="Escriba una contraseña" required="" value="<?php echo $clave; ?>"><br>
		<br>

		<legend class="legend">Datos del paciente </legend>
		<br>
		<center>
		Nombres<input type="text" name="nombrepac" id="nombrepac" placeholder="Ingrese Nombres Paciente" required="" value="<?php echo $nombrepac; ?>">

		Apellidos<input type="text" name="apellidopac" id="apellidopac" placeholder="Ingrese Apellidos Paciente" required="" value="<?php echo $apellidopac; ?>"><br>
		Tipo de documento<select name="tipodocumento" id="tipodocumento" value="<?php echo $tipoid; ?>">
		<option selected>Seleccione Id..</option>	
		<option value="CC">CC</option>
		<option value="CE">CE</option>
		</select>

		<input type="text" name="numerodocumento" id="numerodocumento"placeholder="Digite numero de documento" required="" value="<?php echo $numerodocumento; ?>"><br>

		Fecha de nacimiento<input type="date" name="fechanacimiento" id="fechanacimiento" placeholder="AAAA-MM-DD" required="" value="<?php echo $fechanacimiento; ?>" >	

		Eps<select name="eps" id="eps" placeholder="eps" required="">
                <option selected></option>
                <option value="famisanar">Famisanar</option>  
                <option value="compensar">Compensar</option>  
                <option value="sanitas">Sanitas</option>  
                <option value="salud total">Salud total</option>  
                <option value="capital salud">Capital Salud</option>  
                <option value="nueva eps">Nueva EPS</option>  
                <option value="otra">Otra</option>  
                  
                </select><br><br>

		<input type="submit"   name="actualizar" value="Actualizar Datos" id="boton"><br>	

</form>
<?php
if (isset($_POST['actualizar'])) 
{
	$actualiza_idrol    =$_POST['idrol'];
	$actualiza_nombre   =$_POST['nombre'];
	$actualiza_apellido =$_POST['apellido'];
	$actualiza_email    =$_POST['email'];
	$actualiza_celular  =$_POST['celular'];
	$actualiza_usuario  =$_POST['usuario'];
	$actualiza_clave    =$_POST['clave'];
	$actualiza_nombrepac=$_POST['nombrepac'];
	$actualiza_apellidopac=$_POST['apellidopac'];
	$actualiza_tipoid	 =$_POST['tipodocumento'];
	$actualiza_numerodocumento=$_POST['numerodocumento'];
 	$actualiza_fechanacimiento=$_POST['fechanacimiento'];
	$actualiza_eps=$_POST['eps'];

	$update="UPDATE registro SET idrol='$actualiza_idrol', nombre='$actualiza_nombre', apellido='$actualiza_apellido', email='$actualiza_email', celular='$actualiza_celular', usuario='$actualiza_usuario',clave='$actualiza_clave',nombrepac='$actualiza_nombrepac',apellidopac='$actualiza_apellidopac', tipodocumento='$actualiza_tipoid',numerodocumento='$actualiza_numerodocumento',fechanacimiento='$actualiza_fechanacimiento',eps='$actualiza_eps' WHERE id='$editar_id'";

	$ejecutar1=mysqli_query($conexion,$update);
		if ($ejecutar1) 
			{
				header("Location:administrador.php");
				echo "<script>windows.open('administrador.php')</script>";
			}
		else
			{
				echo "<script> alert('fallo la actualizacion')</script>";
			}
}
?>
</div>