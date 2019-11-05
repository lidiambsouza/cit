<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");

Class BuscaPaciente{


function semAcentuacaoP($s){
	
	
$tr = strtr(
 
    $s,
 
    array (
 
      'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
      'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
      'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ð' => 'D', 'Ñ' => 'N',
      'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O',
      'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Ŕ' => 'R',
      'Þ' => 's', 'ß' => 'B', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
      'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
      'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
      'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
      'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y',
      'þ' => 'b', 'ÿ' => 'y', 'ŕ' => 'r','ü' => 'u'
    )
);

return $tr;

}

function semEspaco($str){
	$s = $this->semAcentuacao($str);
	$res = strtr($s, array(' ' => ''));
	return $res;

}

function Minuscula($string){
	$str = $this->semEspaco($string);
	$res = strtolower($str);
	return $res;
	
}
function Maiuscula($string){
	$str = $this->semEspaco($string);
	$res = strtoupper($str);
	return $res;
	
}

function compararString($str1,$str2){
	$str11 = $this->Minuscula($str1);
	$str22 = $this->Minuscula($str2);
	$res = strcasecmp($str11,$str22);
	if($res==0){
		return true;// são iguais
	}else{
		return false;//são diferentes
	}
	

}
function BuscaBancoP($string){
//SELECT * FROM `usuario` WHERE `Nome` LIKE '%lídia%'
//SELECT `Nome`,`perfil`,`lotacao`,`ramal`,`email`,`spark` FROM `usuario` WHERE `Nome` LIKE '%lídia%'
	$banco = new BancoMysql();
	//$conec= $banco->BancoConect();
				
	//$sql = "SELECT Nome, perfil, lotacao, ramal, email, spark FROM usuario WHERE Nome LIKE %'".$string."'% ";
	$sql = "SELECT id_paciente,nome,idade,sexo,estado,municipio,numeroID FROM paciente WHERE nome LIKE '".$string."%' ";
	//$result=mysqli_query($conec,$sql);
	
	//$fconec=$banco->BancoDesconect($conec);
	
		$s=$banco->Query2($sql);
		if($s){	
			while ($row = $s->fetch_row()){
				$arr[]=$row;
			
			}
			return $arr;
		}else{
			return false;
		}
	

}



}
?>