<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
//header( 'Content-Type: text/html; charset=utf-8' );

Class Formulario{

function form($id){
//SELECT * FROM `usuario` WHERE `Nome` LIKE '%lídia%'
//SELECT `Nome`,`perfil`,`lotacao`,`ramal`,`email`,`spark` FROM `usuario` WHERE `Nome` LIKE '%lídia%'
 $bid=(int)$id;
	$banco = new BancoMysql();
	//$conec= $banco->BancoConect();
				
	//$sql = "SELECT Nome, perfil, lotacao, ramal, email, spark FROM usuario WHERE Nome LIKE %'".$string."'% ";
	$sql = "SELECT descricao FROM bases WHERE Codigo = ".$bid."; ";
	//$result=mysqli_query($conec,$sql);
	
	//$fconec=$banco->BancoDesconect($conec);
	
	$s=$banco->Query($sql);
		if($s){	
			$C = implode("",$s);//tranformando array em string
			return $C;
		}else{
			return false;
		}
	

}

function formTitulo($id){
	$bid=(int)$id;
	$banco = new BancoMysql();
	$sql = "SELECT nomedabase FROM bases WHERE Codigo = ".$bid."; ";
	
	$s=$banco->Query($sql);
		if($s){	
			$C = implode("",$s);//tranformando array em string
			return $C;
		}else{
			return false;
		}
	
}



}
?>