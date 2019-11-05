<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");
//header( 'Content-Type: text/html; charset=utf-8' );
Class BuscaFormulario{

function BuscaBancoForm($string){
$BU= new BuscaUsuario();
$str=$BU->semAcentuacao($string);


$banco = new BancoMysql();
$sql = "SELECT base, nome FROM sinonimos WHERE nome LIKE '".$str."%' ";

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