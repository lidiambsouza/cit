<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");

Class CadastroExposicao{

function nomeTratar($nome){
	$bu= new BuscaUsuario();
	$nomet= $bu->semAcentuacao($nome);
	return $nomet;

}


//função de inserir no banco o usuario
function InsertBancoE($IDpaciente,$circunstaniaEscolhida,$TIoutro,
			$viaEscolhida,$tipoEscolhida,$tempoEscolhida,
			$TItipodec,$duracaoEscolhida,$TItipodura){
		if($circunstaniaEscolhida==""){
			$circunstaniaEscolhida=NULL;
		}
		if($TIoutro==""){
			$TIoutro=NULL;
		}
		if($viaEscolhida==""){
			$viaEscolhida=NULL;
		}
		if($tipoEscolhida==""){
			$tipoEscolhida=NULL;
		}
		if($local==""){
			$local=NULL;
		}
		if($tempoEscolhida==""){
			$tempoEscolhida=NULL;
		}
		if($TItipodec==""){
			$TItipodec=NULL;
		}
		if($duracaoEscolhida==""){
			$duracaoEscolhida=NULL;
		}
		if($TItipodura==""){
			$TItipodura=NULL;
		}
		
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "INSERT INTO exposicao (id_paciente, circunstancia, outro_circun, via, tipo, tempo_decorrido,".
		" tipo_tempo, duracao, tipo_duracao) ".
		" VALUES (".$ID.",'".$circunstaniaEscolhida."','".$TIoutro."','".$viaEscolhida."','".$tipoEscolhida.
		"','".$tempoEscolhida."','".$TItipodec."','".$duracaoEscolhida."','".$TItipodura."');";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
		
	}
	
function UpdateBancoE($IDpaciente,$circunstaniaEscolhida,$TIoutro,
			$viaEscolhida,$tipoEscolhida,$tempoEscolhida,
			$TItipodec,$duracaoEscolhida,$TItipodura){
		if($circunstaniaEscolhida==""){
			$circunstaniaEscolhida=NULL;
		}
		if($TIoutro==""){
			$TIoutro=NULL;
		}
		if($viaEscolhida==""){
			$viaEscolhida=NULL;
		}
		if($tipoEscolhida==""){
			$tipoEscolhida=NULL;
		}
		if($local==""){
			$local=NULL;
		}
		if($tempoEscolhida==""){
			$tempoEscolhida=NULL;
		}
		if($TItipodec==""){
			$TItipodec=NULL;
		}
		if($duracaoEscolhida==""){
			$duracaoEscolhida=NULL;
		}
		if($TItipodura==""){
			$TItipodura=NULL;
		}
		
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "UPDATE exposicao SET circunstancia='".$circunstaniaEscolhida."',outro_circun='".$TIoutro."',via='".$viaEscolhida.
		"',tipo='".$tipoEscolhida."',tempo_decorrido='".$tempoEscolhida."',tipo_tempo='".$TItipodec."',duracao='".$duracaoEscolhida.
		"',tipo_duracao='".$TItipodura."' WHERE id_paciente=".$ID.";";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
		
	}	
	
}
?>