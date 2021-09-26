<!DOCTYPE html>
<meta charset="utf-8">
<html>
<?php 
$conexion=mysqli_connect("localhost","root","","qalalzheimer")or die("Problemas en la conexion");

// echo "conexion exitosa";
 ?>

<head>
<center><title>Registro de Usuario </title>
<link rel="stylesheet" type="text/css" href="estiloqal.css">
<style>
body {  font-family: Arial, Helvetica, sans-serif;
        background-image: url(fondoqal.jpg);
        background-size: cover;


     }

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 80px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  font-size: 20px;
}

/* Modal Content */
.modal-content {
  position: relative;
  background: url(fondoqal.jpg);
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #4654A3;
  color: white;
}

.modal-body {padding: 2px 10px;
}

.modal-footer {
  padding: 2px 16px;
  background-color: #4654A3;
  color: white;
}
#marco{
    width: 300px;
    height: 100px;
    margin-left: auto;
    margin-right: auto;
    
     
}
#titulo {
    text-align: center;
}
#myBtn{
    text-align: center;
    background: orangered;
    border: 2px solid #0099CC;
    border-radius: 15px;
    border: none;
    color: white;
    padding: 32px 120px;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    text-decoration: none;
    text-transform: uppercase;
    border-color: black;
    box-shadow: 10px 0px 10px 0px;

}
.legend{
  font-size: 15px;
  font-family: fantasy;
}
#vmodal{
  width: 700px;
  height: auto;
}
#btnn{

      background: #5EF1EA;
      font-size: 20px;
      font-family: fantasy;
      border-radius: 0.5em; 
      width: 100px;
      height: 40px;
      box-shadow: 10px 0px 10px 0px;

      }
      #btnn:hover {
          color: rgba(255, 255, 255, 1) !important;
          box-shadow: 0 4px 16px rgba(49, 138, 172, 1);
          transition: all 0.2s ease;
        }


</style>
</head>
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
				<!-- <a href="#">Contacto</a> -->


			</nav>
		</div>
	</header>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
       
        <legend id="marco">
        <h2 id="titulo">REGISTRAR DATOS</h2>
        <br>
        <!-- Trigger/Open The Modal -->
        <button id="myBtn">realizar inscripcion</button>
        </legend>
        
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" id="vmodal">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Ingreso de datos paciente y cuidador</h2>
    </div>
    <div class="modal-body">
      <fieldset> 
     <h1 id="titulo">FORMULARIO DE REGISTRO </h1>
    <br>
    <h2 id="titulo">Diligencie los siguientes datos </h2>
    </fieldset>

    <form method="POST" action="registrousuario.php" align="center">
    
                <fieldset>
                <legend id="legend">Datos de cuidador</legend>
                <br>
                  Usuario<select name="idrol" id="idrol">
                  <option selected>Tipo de usuario</option> 
                  <option value="1">Paciente</option>
                  <option value="2">
                  </option> 
                Nombre<input type="text" name="nombre" id="nombre" placeholder="Ingrese sus Nombres" required=""><br>
                Apellidos<input type="text" name="apellido" id="apellido" placeholder="Ingrese sus Apellidos" required=""><br>
                Email  <input type="email" name="email" id="email" placeholder="Ingrese su correo" required="">
                Celular   <input type="number" name="celular" id="celular" placeholder="Numero de celular" required="" max="9999999999"><br>
                Usuario<input type="text" name="usuario" id="usuario" placeholder="Indique usuario" required="">
                Password<input type="password" name="clave" id="clave" placeholder="Escriba una contraseña" required=""><br>
                <br>

                <fieldset>
                <legend>Datos del paciente </legend>
                <br>
                <center>
                Nombres  <input type="text" name="nombrepac" id="nombrepac" placeholder="Ingrese Nombres Paciente" required="">
                Apellidos<input type="text" name="apellidopac" id="apellidopac" placeholder="Ingrese Apellidos Paciente" required=""><br>
                Tipo de documento <select name="tipodocumento" id="tipodocumento">
                <option selected></option>   
                <option value="CC">CC</option>
                <option value="CE">CE</option>
                </select>       
                <input type="number" name="numerodocumento" id="numerodocumento"placeholder="Digite numero de documento" required="" max="9999999999"><br>
                Fecha de nacimiento<input type="date" name="fechanacimiento" id="fechanacimiento" required="">
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
                <input type="submit" name="insertar" value="Enviar" id="btnn"><br>
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
	
	$insertar="INSERT INTO registro (idrol,nombre,apellido,email,celular,usuario,clave,nombrepac,apellidopac,tipodocumento,numerodocumento,fechanacimiento,eps) values('$idrol','$nombre','$apellido','$email','$celular','$usuario','$clave','$nombrepac','$apellidopac','$tipoid','$numerodocumento','$fechanacimiento','$eps')";
	$ejecutar=mysqli_query($conexion,$insertar);

 	if ($ejecutar)
 	{
 		echo "<script> windows.open('login.php') </script>";
 	}
}
// echo "conexion exitosa1";
?>
</fieldset>
                </fieldset>
                </strong>
 </form>

      <p></p>
    </div>
    <div class="modal-footer">
      <h3></h3>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>