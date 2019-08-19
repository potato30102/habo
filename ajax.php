<?php  
	include('conexao.php');
	if (isset($_GET['uf'])) {
	
		$sql = "SELECT * FROM tb_cidade WHERE id_estado =".$_GET['uf'];
		$result = $mysqli->query($sql);
		$qualquer = '<select name="cidade" id="city">';
		while ($row = $result->fetch_object()) {
			$qualquer .= '<option name="'.$row->nm_cidade.'" value="'.$row->cd_cidade.'">'.$row->nm_cidade.'</option>';
		}
		$qualquer.='</select><br><br>';
		echo $qualquer;
	}
?>

