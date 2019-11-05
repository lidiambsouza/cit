<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");

Class CadastroAgenteToxico{

function nomeTratar($nome){
	$bu= new BuscaUsuario();
	$nomet= $bu->semAcentuacao($nome);
	return $nomet;

}


//função de inserir no banco o usuario
function InsertBancoAT($IDpaciente,$TAagentToxico,$classificacaoEscolhida,$TIoutro){
		if($TAagentToxico==""){
			$TAagentToxico=NULL;
		}
		if($TIoutro==""){
			$TIoutro=NULL;
		}
		if($classificacaoEscolhida==""){
			$classificacaoEscolhida=NULL;
		}
		
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "INSERT INTO agente_toxico(id_paciente, agente_toxico, classificacao, outros)".
		" VALUES (".$ID.",'".$TAagentToxico."','".$classificacaoEscolhida."','".$TIoutro."');";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
		
	}

function UpdateBancoAT($IDpaciente,$TAagentToxico,$classificacaoEscolhida,$TIoutro){
		if($TAagentToxico==""){
			$TAagentToxico=NULL;
		}
		if($TIoutro==""){
			$TIoutro=NULL;
		}
		if($classificacaoEscolhida==""){
			$classificacaoEscolhida=NULL;
		}
		
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "UPDATE agente_toxico SET agente_toxico='".$TAagentToxico."',classificacao='".$classificacaoEscolhida.
		"',outros='".$TIoutro."' WHERE id_paciente=".$ID.";";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
		
	}
	
}
?>