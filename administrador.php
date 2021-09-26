<?php 

include_once'conexion.php';
	session_start();
	if (!isset($_SESSION['rol']))
		{
			header('location:login.php');
		}
	else
	{
		if ($_SESSION['rol']!=3)
		{
			header('location:login.php');
		}
	}
?>
<!DOCTYPE html>
<html>

<?php 
$conexion=mysqli_connect("localhost","root","","qalalzheimer")or die("Problemas en la conexion");

// echo "conexion exitosa";
 ?>
<head>
	<meta charset="utf-8">
	<center><title> Administrador </title>
	<title>Alzheimer </title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
		.contenedor{
			width: 100em;
			height: 100em;
			background: url(fondoqal.jpg);
			margin: 0.5em auto;
			padding: 0.5em;
			border-radius: 15px;

		}
		.header{
			width: 93%;
			height: 20%;
			background: #4654A3;
			padding: 0.5em ;
			margin: 0.5em ;
			border-radius: 15px;
			position: fixed;
			z-index: +1;
		}
		.header #logo{
			width: 7%;
			height: 90%;
			float: left;


		}
		.nav{
			background: url(fondoqal.jpg);
			width: 95%;
			height: 7%;
			padding: 0.5em ;
			margin: 0.5em ;
			
			border-radius: 15px;
			margin-top: 200px;
			
		}
		.contenido{

			width: 95%;
			height: 60%;
			padding: 0.5em ;
			margin: 0.5em auto;
			background: url(fondoqal.jpg);
			border-radius: 15px;
			font-family: sans-serif;
			font-size: 20px;
		}
		.legend{
			font-size: 30px;
			font-family: fantasy;
		}
		.contenido1{
			width: 95%;
			height: 70%;
			padding: 0.5em ;
			margin: 0.5em auto;
			background: url(fondoqal.jpg);
			border-radius: 15px;
			font-size: 15px;
			font-family: times new roman;
			margin-top: 300px;
		}
		#btn1{
			background: #5EF1EA;
			font-size: 20px;
			font-family: fantasy;
			border-radius: 0.5em;	
			width: 200px;
			height: 70px;
			box-shadow: 10px 0px 10px 0px;

			}
			#btn1:hover {
				  color: rgba(255, 255, 255, 1) !important;
				  box-shadow: 0 4px 16px rgba(49, 138, 172, 1);
				  transition: all 0.2s ease;
				}
				#caja{
					background: url(fondoqal.jpg);
					width: 45%;
					height: 90%;
					position: relative;
					float: left;
					border-color: black;
					border-radius: 30px;
					border-width: 5px;

				}
				#caja1{
					background: url(fondoqal.jpg);
					width: 45%;
					height: 90%;
					position: relative;
					float: right;
					

				}
	</style>
</head>
<div class="contenedor">
	<div class="header">
		<div id="logo">
			<img src="qalimg.jpg" width="200px" height="150px">
		</div>
		<div>
			<h1>Administrador</h1>
			<h1>Formulario alzheimer en php</h1>
		</div>
	</div>
	<div class="nav"></div>
	<div class="contenido">
		<form method="POST" action="administrador.php" align="center">
				<br>
				<div id="caja">
					<legend class="legend">Datos de cuidador</legend>
					<br>
					
					Tipo de usuario<select name="idrol" id="idrol">
					<option selected></option>	
					<option value="1">Paciente</option>
					<option value="2">Visitante</option>
					<option value="3">administrador</option>
					</select><br>
					Nombres<input type="text" name="nombre" id="nombre" placeholder="Ingrese sus Nombres" required="">
					Apellidos<input type="text" name="apellido" id="apellido" placeholder="Ingrese sus Apellidos" required=""><br>
					Email<input type="email" name="email" id="email" placeholder="Ingrese su correo" required="">
					Celular<input type="number" name="celular" id="celular" placeholder="Numero de celular" required="" maxlength="10"><br>
					Usuario<input type="text" name="usuario" id="usuario" placeholder="Indique usuario" required="">
					Password<input type="password" name="clave" id="clave" placeholder="Escriba una contraseña" required=""><br>
					<br>
				</div>
				<div id="caja1">
						<legend class="legend">Datos del paciente </legend>
						<br>
						<center>
						Nombres<input type="text" name="nombrepac" id="nombrepac" placeholder="Ingrese Nombres Paciente" required="">
						Apellidos<input type="text" name="apellidopac" id="apellidopac" placeholder="Ingrese Apellidos Paciente" required=""><br>

					Tipo de documento<select name="tipodocumento" id="tipodocumento" required="">
						<option selected></option>	
						<option value="CC">CC</option>
						<option value="CE">CE</option>
						</select>			
						<input type="number" name="numerodocumento" id="numerodocumento"placeholder="numero de documento" required="" max="9999999999"><br>

						Fecha de nacimiento<input type="date" name="fechanacimiento" id="fechanacimiento" placeholder="AAAA-MM-DD" required="">
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
			    
						<input type="submit" name="insertar" value="REGISTRAR" id="btn1"><br>
				</form>
	</div>
	<div class="contenido1">
	<?php 
	if (isset($_POST['insertar']))
	{
		$idrol=$_POST['idrol'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$email=$_POST['email'];
		$celular=$_POST['celular'];
		$usuario=$_POST['usuario'];
		$clave=$_POST['clave'];
		$nombrepac=$_POST['nombrepac'];
		$apellidopac=$_POST['apellidopac'];
		$tipoid=$_POST['tipodocumento'];
		$numerodocumento=$_POST['numerodocumento'];
	 	$fechanacimiento=$_POST['fechanacimiento'];
		$eps=$_POST['eps'];
		
		$insertar="INSERT INTO registro(idrol,nombre,apellido,email,celular,usuario,clave,nombrepac,apellidopac,tipodocumento,numerodocumento,fechanacimiento,eps) values('$idrol','$nombre','$apellido','$email','$celular','$usuario','$clave','$nombrepac','$apellidopac','$tipoid','$numerodocumento','$fechanacimiento','$eps')";
		$ejecutar=mysqli_query($conexion,$insertar);

	 	if ($ejecutar)
	 	{
	 		echo "<script> windows.open('administrador.php') </script>";
	 	}
	}
	?>
	
	<table border="3" align="center">
		<tr style="background-color: blueviolet">
			<th>ID</th>
			<th>TIPO DE USUARIO</th>
			<th>NOMBRE</th>
			<th>APELLIDOS</th>
			<th>EMAIL</th>
			<th>CELULAR</th>
			<th>USUARIO</th>
			<th>PASSWORD</th>
			<th>NOMBRE PACIENTE</th>
			<th>APELLIDO PACIENTE</th>
			<th>TIPO ID</th>
			<th># DOCUMENTO</th>
			<th>FECHA DE NACIMIENTO</th>
			<th>EPS</th>

			<th>EDITAR</th>
			<th>BORRAR</th>
		</tr>
			
		<?php 
		$consulta="SELECT*FROM registro";
		$ejecutar=mysqli_query($conexion,$consulta);
		$i=0;
		while ($fila=mysqli_fetch_array($ejecutar))
		{
			$id=			$fila['id'];
			$idrol=			$fila['idrol'];
			$nombre=		$fila['nombre'];
			$apellido=		$fila['apellido'];
			$email=			$fila['email'];
			$celular=		$fila['celular'];
			$usuario=		$fila['usuario'];
			$clave=			$fila['clave'];
			$nombrepac=		$fila['nombrepac'];
			$apellidopac=	$fila['apellidopac'];
			$tipoid=		$fila['tipodocumento'];
			$numerodocumento=$fila['numerodocumento'];
		 	$fechanacimiento=$fila['fechanacimiento'];
			$eps			=$fila['eps'];
			$i++;

	?>

		<tr align="center">
			<td><?php echo $id ?></td>
			<td><?php echo $idrol ?></td>
			<td><?php echo $nombre ?></td>
			<td><?php echo $apellido ?></td>
			<td><?php echo $email ?></td>
			<td><?php echo $celular ?></td>
			<td><?php echo $usuario ?></td>
			<td><?php echo $clave ?></td>
			<td><?php echo $nombrepac ?></td>
			<td><?php echo $apellidopac ?></td>
			<td><?php echo $tipoid ?></td>
			<td><?php echo $numerodocumento ?></td>
			<td><?php echo $fechanacimiento ?></td>
			<td><?php echo $eps ?></td>

			<td> <a href="administrador.php? editar= <?php echo $id; ?>">Editar</a> </td>
			<td> <a href="administrador.php? borrar= <?php echo $id; ?>">Borrar</a> </td>
		</tr>
	<?php
			}	
	 ?>

	</table>
	
	<?php  
		if(isset($_GET['editar']))
		{
			include('editaradmistrador.php');
		}
	?>
	<?php  
		if(isset($_GET['borrar']))
		{
			$borrar_id=$_GET['borrar'];
			$borrar="DELETE FROM registro WHERE id='$borrar_id'";
			$ejecutar=mysqli_query($conexion,$borrar);
			if ($ejecutar)
			{
				echo "<script> windows.open('administrador.php') </script>";
			}
			else
			{
				echo "<script> alert('noooo')</script>";
			}
		}
	?>
	 <form action="login.php" method="POST">
	 	<br><br><br><br>
	 	<input type="submit" value="CerrarSesion" name="cerrar_sesion" id="btn1">
	 </form>
	 </div>
	 </div>
</div>
</html>