<?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="qalalzheimer";

    $conexion=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(!$conexion){
        die("No hay conexion: ".mysqli_connect_error());
    }
   
    $usuario=$_POST["txtusuario"];
    $pass=$_POST["txtpassword"];

    $query= mysqli_query($conexion,"SELECT * FROM cuidador WHERE usuario = '".$usuario."' and clave = '".$pass."'");
    $nr=mysqli_num_rows($query);

    if($nr==1){
        header("location:menu.html");
    }
    else if ($nr==0){
        echo "USUARIO NO EXISTE";
    }
?>