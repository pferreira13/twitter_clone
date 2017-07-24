<?php
	/**
	*
	*/
	class DB
	{
		private $host =  'localhost';
		private $user = 'root';
		private $password = '';
		private $database = 'TWITTER_CLONE';

		function conecta_mysql(){
			$con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
			mysqli_set_charset($con, 'UTF8');

			if (mysqli_connect_errno()) {
				echo "Erro ao tentar se conectar com o banco de dados:"
					.mysqli_connect_erro();
			}
			return $con;
		}
	}
?>
