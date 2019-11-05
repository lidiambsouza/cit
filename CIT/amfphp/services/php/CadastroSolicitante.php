<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");

Class CadastroSolicitante{

function nomeTratar($nome){
	$bu= new BuscaUsuario();
	$nomet= $bu->semAcentuacao($nome);
	return $nomet;

}


//função de inserir no banco o usuario
function InsertBancoS($IDpaciente,$nomeS,$telefoneDDD, $telefone, $ramal, $instituicao,$estado,$municipio,$bairro,$endereco,
$numeroEND,$categoria,$outroCategoria,$outroSaudeCategoria){
		if($ramal==""){
			$ramal=NULL;
		}
		if($telefoneDDD==""){
			$telefoneDDD=0;
		}
		if($telefone==""){
			$telefone=NULL;
		}
		if($outroCategoria==""){
			$outroCategoria=NULL;
		}
		if($outroSaudeCategoria==""){
			$outroSaudeCategoria=NULL;
		}
		if($bairro==""){
			$bairro=NULL;
		}
		if($endereco==""){
			$endereco=NULL;
		}
		if($numeroEND==""){
			$numeroEND=NULL;
		}		
		$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "INSERT INTO solicitante(id_paciente, nome_s, telefone_ddd, telefone, ramal,".
		" instituicao, estado, municipio, bairro, endereco, numero_end, categoria, outro_cat, ouro_saude_cat)".
		"  VALUES (".$ID.",'".$nomeT."',".$telefoneDDD.",'".$telefone."','".$ramal."','".$instituicao.
		"','".$estado."','".$municipio."','".$bairro."','".$endereco."','".$numeroEND."','".$categoria."','".$outroCategoria."','".$outroSaudeCategoria."');";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
	}
	
function UpdateBancoS($IDpaciente,$nomeS,$telefoneDDD, $telefone, $ramal, $instituicao,$estado,$municipio,$bairro,$endereco,
$numeroEND,$categoria,$outroCategoria,$outroSaudeCategoria){
		if($ramal==""){
			$ramal=NULL;
		}
		if($telefoneDDD==""){
			$telefoneDDD=0;
		}
		if($telefone==""){
			$telefone=NULL;
		}
		if($outroCategoria==""){
			$outroCategoria=NULL;
		}
		if($outroSaudeCategoria==""){
			$outroSaudeCategoria=NULL;
		}
		if($bairro==""){
			$bairro=NULL;
		}
		if($endereco==""){
			$endereco=NULL;
		}
		if($numeroEND==""){
			$numeroEND=NULL;
		}		
		$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "UPDATE solicitante SET nome_s='".$nomeT."',telefone_ddd=".$telefoneDDD.",telefone='".$telefone."',ramal='".$ramal.
		"',instituicao='".$instituicao."',estado='".$estado."',municipio='".$municipio."',bairro='".$bairro."',endereco='".$endereco.
		"',numero_end='".$numeroEND."',categoria='".$categoria."',outro_cat='".$outroCategoria."',ouro_saude_cat='".$outroSaudeCategoria."' WHERE id_paciente=".$ID.";";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
}
	
}
?>