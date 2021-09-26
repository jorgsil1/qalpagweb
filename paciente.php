<?php 

include_once'conexion.php';
	session_start();
	if (!isset($_SESSION['rol']))
		{
			header('location:login.php');
		}
	else
	{
		if ($_SESSION['rol']!=1)
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
 	<div align="center">
	  <?php  
	   $usuario = $_SESSION["nombre"]; 
	  
	   $ingreso=$_SESSION['id'];

	  ?>  
	</div>

<head>
	<meta charset="utf-8">
	<center><title> Paciente </title>

 	<h1>Paciente</h1>
	<title>Alzheimer </title>
</head>
<body bgcolor="#33AFF5">
	<h1>Paciente alzheimer en php</h1>

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
	
	$insertar="INSERT INTO registro(idrol,apellido,email,celular,usuario,clave,nombrepac,apellidopac,tipodocumento,numerodocumento,fechanacimiento,eps) values('$idrol','$nombre','$apellido','$email','$celular','$usuario','$clave','$nombrepac','$apellidopac','$tipoid','$numerodocumento','$fechanacimiento','$eps')";
	$ejecutar=mysqli_query($conexion,$insertar);

 	if ($ejecutar)
 	{
 		echo "<script> windows.open('paciente.php') </script>";
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

		<th>ACTUALIZAR</th>
	
	</tr>
		
	<?php 
	$consulta="SELECT*FROM registro WHERE id='$ingreso'";
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

		<td> <a href="paciente.php? editar= <?php echo $id; ?>">actualizar</a> </td>
		
	</tr>
<?php
		}	
 ?>

</table>

<?php  
	if(isset($_GET['editar']))
	{
		include('editarpaciente.php');
	}
?>

 <form action="login.php" method="POST">
 	<br>
 	<input type="submit" value="Cerrar Sesion" name="cerrar_sesion">
 </form>
</body>
</center>
</html>