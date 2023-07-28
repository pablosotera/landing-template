<?php require_once 'common_functions.php';
class auto_num {
		
	private $con;
	private $id;	
	function __construct($_con=NULL,$_id=NULL)
	{
		$this -> con = $_con;
		$this -> id = $_id; 
	}
	
	private function update_ultimo_num($numero)
	{
		
		$stmt = ($this -> con)->prepare(" UPDATE `auto_num` SET `ULTIMO_NUM`='$numero' WHERE `ID`='" . $this -> id . "'");
		$stmt->execute();
		//return $respuesta;
	}
	
	
	private function get_next_num()
	{
		
		$consulta ="SELECT  `PREFIJO`,
						   `ULTIMO_NUM`,
		                   `MAX_LEN` 
		 		    FROM `auto_num`
					WHERE `ID`='" . $this -> id . "'";
					
		$stmt = ($this -> con)->prepare($consulta);
		
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$this->update_ultimo_num($rows[0]['ULTIMO_NUM']+1);
		
		return $rows;
	}
	
	public function get_id()
	{
		$fila = $this->get_next_num();
		
		$prefijo = $fila[0]['PREFIJO'];
		$numero = $fila[0]['ULTIMO_NUM']+1;
		$max_len = $fila[0]['MAX_LEN'];
		
		$rellenado= $max_len - strlen($numero) - strlen($prefijo);
		$id_generado= $prefijo . str_repeat('0', $rellenado) .$numero;
		
		return $id_generado;
	}	

}
?>