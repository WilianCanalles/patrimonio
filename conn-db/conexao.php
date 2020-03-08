<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';
class Conexao {

	private $host = 'localhost';
	private $dbname = 'patrimonix';
	private $user = 'root';
	private $pass = '';

	public function conectar() {
		try {

			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"				
			);
            $query = "select * from $this->dbname where email = :usuario OR usuario = :usuario AND senha = :senha";

            $stmt = $conexao->prepare($query);

            $stmt->bindValue(':usuario', $_POST['usuario']);
            $stmt->bindValue(':senha', $_POST['senha']);

            $stmt->execute();
            
			return $conexao;


		} catch (PDOException $e) {
			echo '<p>'.$e->getMessage().'</p>';
		}
	}
}

?>