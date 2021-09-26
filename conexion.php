<?php
class Database
{
		private $servidorlocal;
		private $basededatos;
		private $usuario;
		private $password;
		private $charset;
		public function __construct()
		{
			$this->servidorlocal = 'localhost';
			$this->basededatos   = 'qalalzheimer';
			$this->usuario 		 = 'root';
			$this->password      = '';
			$this->charset       = 'utf8';

		}
		function connect()
		{
			try
			{
				$connection = "mysql:host=".$this->servidorlocal.";dbname=".$this->basededatos.";charset".$this->charset;
				$opciones = [
					PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_EMULATE_PREPARES=> false,];
				$pdo = new PDO($connection, $this -> usuario, $this->password,$opciones);
				return $pdo;
			}
			catch(PDOException $ex)
			{
				print_r('Error de la conexion'.$ex->getMessage());
			}
		}
}
	echo "";
?>