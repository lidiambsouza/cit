<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");

Class CadastroResumo{

function nomeTratar($nome){
	$bu= new BuscaUsuario();
	$nomet= $bu->semAcentuacao($nome);
	return $nomet;

}

//função de inserir no banco o usuario
function InsertBancoRb($IDpaciente,$TAobservacao){
		
		if($TAobservacao==""){
			$TAobservacao=NULL;
		}
		
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "INSERT INTO resumo(id_paciente, observacao)".
		" VALUES (".$ID.",'".$TAobservacao."');";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
		
	}
	
function UpdateBancoRb($IDpaciente,$TAobservacao){
		
		if($TAobservacao==""){
			$TAobservacao=NULL;
		}
		
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "UPDATE resumo SET observacao='".$TAobservacao."' WHERE id_paciente =".$ID.";";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
		
		
	}

//função de inserir no banco o usuario
function InsertBancoR($IDpaciente,$manifestacaoclinS,$analisetoxiS,$internacaoS,
        	$TIespecificar,$evolucaoEscolhida,$TIoutro,$TIdiagdefin,$TIcid10,
        	$gravidadeEscolhida,$TAobservacao){
		if($manifestacaoclinS==""){
			$manifestacaoclinS=NULL;
		}
		if($TIoutro==""){
			$TIoutro=NULL;
		}
		if($analisetoxiS==""){
			$analisetoxiS=NULL;
		}
		if($internacaoS==""){
			$internacaoS=NULL;
		}
		if($TIespecificar==""){
			$TIespecificar=NULL;
		}
		if($evolucaoEscolhida==""){
			$evolucaoEscolhida=NULL;
		}
		if($TIdiagdefin==""){
			$TIdiagdefin=NULL;
		}
		if($TIcid10==""){
			$TIcid10=NULL;
		}
		if($gravidadeEscolhida==""){
			$gravidadeEscolhida=NULL;
		}
		if($TAobservacao==""){
			$TAobservacao=NULL;
		}
		
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "INSERT INTO resumo(id_paciente, manifestacaoclin, analisetoxi, internacao, especificar, evolucao, outro_evolucao, diagnostico_definitivo, cid10, gravidade, observacao)".
		" VALUES (".$ID.",'".$manifestacaoclinS."','".$analisetoxiS."','".$internacaoS."','".$TIespecificar."','".$evolucaoEscolhida."','".$TIoutro."','".$TIdiagdefin."','".$TIcid10."','".$gravidadeEscolhida."','".$TAobservacao."');";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
		
	}
	
function UpdateBancoR($IDpaciente,$manifestacaoclinS,$analisetoxiS,$internacaoS,
        	$TIespecificar,$evolucaoEscolhida,$TIoutro,$TIdiagdefin,$TIcid10,
        	$gravidadeEscolhida){
		if($manifestacaoclinS==""){
			$manifestacaoclinS=NULL;
		}
		if($TIoutro==""){
			$TIoutro=NULL;
		}
		if($analisetoxiS==""){
			$analisetoxiS=NULL;
		}
		if($internacaoS==""){
			$internacaoS=NULL;
		}
		if($TIespecificar==""){
			$TIespecificar=NULL;
		}
		if($evolucaoEscolhida==""){
			$evolucaoEscolhida=NULL;
		}
		if($TIdiagdefin==""){
			$TIdiagdefin=NULL;
		}
		if($TIcid10==""){
			$TIcid10=NULL;
		}
		if($gravidadeEscolhida==""){
			$gravidadeEscolhida=NULL;
		}
		if($TAobservacao==""){
			$TAobservacao=NULL;
		}
		
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "UPDATE resumo SET manifestacaoclin='".$manifestacaoclinS."',analisetoxi='".$analisetoxiS."',internacao='".$internacaoS.
		"',especificar='".$TIespecificar."',evolucao='".$evolucaoEscolhida."',outro_evolucao='".$TIoutro."',diagnostico_definitivo='".$TIdiagdefin.
		"',cid10='".$TIcid10."',gravidade='".$gravidadeEscolhida."' WHERE id_paciente =".$ID.";";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
		
	}
	
}
?>