<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estiloqal.css">
	<meta name="viewpor" content="whidth_device_width, initial-scale=1.0">
	<meta http-equiv="X-Compatible" content="ie-edge">
	<head>	
	<title>LOGIN QAL</title>
	

        <style>
        	body{
        		background: url(fondoqal.jpg);
        	}
                table{
                        border: 2px solid #FF69B4;
                        background-color:#C8B9E8 ;
                }
                input[type=text],input[type=password]{
                        width: 100%;
                        padding: 8px 20px;
                        border: 2px solid #7B68EE;
                        box-sizing: border-box;
                }
                
                }
                label{
                        font-size: 14px;
                        font-weight: bold;
                        font-family: arial;
                }
                input[type=submit]{
                        background-color: #7B68EE;
                        color: white;
                        padding: 8px 10px;
                        margin: 8px 0px;
                        border: solid;
                        cursor: pointer;
                        width: 40%;
                }

        </style>
	
</head>
<body>
	<header >
		<div class="wrapper">
			<div class="logo">
				<img src="qalimg.jpg">
			</div>
			<div class="btn" onclick="location.href='login.php'"></div>
			<div class="btn1" onclick="location.href='registrousuario.php'"></div>
			<nav>
				<a href="cabecera.html">Inicio</a>
				<a href="#">Agenda</a>
				<a href="#">Ejercicios</a>
				<a href="#">Recordatorio</a>
				<a href="#">Medicamentos</a>
				<a href="#">Citas Medicas</a>
				<a href="#">Contacto</a>


			</nav>
		</div>
	</header>
	 <center>
	    <table>
	    	<form action="#" method="POST">
	            <tr><td colspan="2" style="background-color: #C8B9E8 ; padding-bottom: 5px;padding-top: 5px;"><label>Login</label></td></tr>
	            <tr><td align="center" rowspan="5"><img src="candado.jpg"/></td><td>
	            <label>Usuario</label></td></tr>
	            <tr><td><input type="text" name="usuario"/></td></tr>
	            <tr><td><label>Password</label></td></tr>
	            <tr><td><input type="password" name="clave"/></td></tr>
	            <tr><td><input type="submit" value="Ingresar"></td></tr>

	    </table>
	</form>
	</center>
	<?php 
include_once'conexion.php';
session_start();
if (isset($_POST['cerrar_sesion']))
	{
		session_unset();
		session_destroy();
	}
if (isset($_SESSION['rol']))
	{
		switch ($_SESSION['rol']) 
		{
			case 1:
				header('Location:paciente.php');
				break;
			case 2:
				header('Location:invitado.php');
				break;
			case 3:
				header('Location:administrador.php');
				break;
			
			default:
				echo "no estoy en nada";
				break;
		}
	}
	if (isset($_POST['usuario'])&& isset($_POST['clave'])) 
	{
		$username = $_POST['usuario'];
		$password = $_POST['clave'];
		$db = new Database();
		$query = $db->connect()->prepare('SELECT *FROM registro WHERE usuario= :usuario AND clave = :clave');
		$query-> execute (['usuario'=>$username,'clave'=>$password]);
		$arreglofila = $query-> fetch(PDO::FETCH_NUM);

		if ($arreglofila == true)
		{
			$rol = $arreglofila[1];
			$_SESSION['rol'] = $rol;
			switch ($rol)
			{
			case 1:
				header('location:paciente.php');
				break;
			case 2:
				header('location:invitado.php');
				break;
			case 3:
				header('location:administrador.php');
				break;
			
			default:
				echo "no estoy en nada";
				break;
			}
		$usuario=$arreglofila[2];
		$_SESSION['nombre'] = $usuario;
		$ingreso=$arreglofila[0];
		$_SESSION['id'] = $ingreso;
				
		}   
	else
	{
		echo "Nombre de usuario o contraseña invalido!";
	}
}
?>

	<section class="contenido wrapper">
		<div class="contenedor" >
			<h1>Que es el Alzheimer?</h1>
			<hr>
			<p>La enfermedad de Alzheimer es un trastorno neurológico progresivo que hace que el cerebro se encoja (atrofia) y que las neuronas cerebrales mueran. La enfermedad de Alzheimer es la causa más común de demencia, un deterioro continuo en el pensamiento, el comportamiento y las habilidades sociales que afecta la capacidad de una persona para vivir de forma independiente.

			En Estados Unidos, unos 5,8 millones de personas de 65 años o más viven con enfermedad de Alzheimer. De ellas, el 80 % tiene 75 años o más. De los aproximadamente 50 millones de personas con demencia en todo el mundo, se estima que entre el 60 % y el 70 % padecen enfermedad de Alzheimer.

			Los signos tempranos de la enfermedad incluyen el olvido de eventos o conversaciones recientes. A medida que la enfermedad progresa, una persona con enfermedad de Alzheimer presentará un grave deterioro de la memoria y perderá la capacidad para llevar a cabo las tareas cotidianas.

			Los medicamentos pueden mejorar temporalmente los síntomas o retardar su progresión. Estos tratamientos pueden ayudar a las personas con enfermedad de Alzheimer a prolongar al máximo sus funciones y a desenvolverse de forma independiente por un tiempo. Existen diferentes programas y servicios para brindar apoyo a las personas con enfermedad de Alzheimer y a sus cuidadores.

			No hay ningún tratamiento que cure la enfermedad de Alzheimer o que altere la evolución de la enfermedad en el cerebro. En las etapas avanzadas de la enfermedad, las complicaciones derivadas de la pérdida grave de la función cerebral (como la deshidratación, la malnutrición o la infección) provocan la muerte.https://www.mayoclinic.org/es-es/diseases-conditions/alzheimers-disease/symptoms-causes/syc-20350447</p>
			
		</div>
	
		
	</section>

</body>
</html>