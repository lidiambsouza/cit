<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");

Class CadastroEvolucao{

function nomeTratar($nome){
	$bu= new BuscaUsuario();
	$nomet= $bu->semAcentuacao($nome);
	return $nomet;

}
function preenche($IDpaciente){
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();
		$sql = "SELECT observacao FROM resumo WHERE id_paciente = ".$IDpaciente." ;";
		
		$s=$banco->Query($sql);
		if($s){	
			$C = implode("",$s);//tranformando array em string
			return $C;
		}else{
			return false;
		}
}
function preencheData($IDpaciente){
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();
		$sql = "SELECT data FROM resumo WHERE id_paciente = ".$IDpaciente." ;";
		
		$s=$banco->Query($sql);
		if($s){	
			$C = implode("",$s);//tranformando array em string
			return $C;
		}else{
			return false;
		}
}
function preencheGP($IDpaciente){
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();
		$sql = "SELECT gpagente FROM resumo WHERE id_paciente = ".$IDpaciente." ;";
		
		$s=$banco->Query($sql);
		if($s){	
			$C = implode("",$s);//tranformando array em string
			return $C;
		}else{
			return false;
		}
}




//função de inserir no banco o usuario
function InsertBancoEV($IDpaciente,$TAobservacao,$data,$gpagente){
		
		if($gpagente==""){
			$gpagente=NULL;
		}
		if($TAobservacao==""){
			$TAobservacao=NULL;
		}
		
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "UPDATE  resumo SET  observacao ='".$TAobservacao."', data='".$data."',gpagente='".$gpagente."' WHERE id_paciente = ".$ID." ;";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		
		
		return $result;// retornar true se inserir os dados
		
		
	}
}
?>