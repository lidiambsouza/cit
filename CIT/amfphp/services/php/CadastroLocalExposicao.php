<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");

Class CadastroLocalExposicao{

function nomeTratar($nome){
	$bu= new BuscaUsuario();
	$nomet= $bu->semAcentuacao($nome);
	return $nomet;

}


//função de inserir no banco o usuario
function InsertBancoLE($IDpaciente,$estabelecimento,$outroES, $outroSP, $zona, $local,$outroLE,$estado,$municipio,$bairro,$endereco,
$numeroEND){
		if($estabelecimento==""){
			$estabelecimento=NULL;
		}
		if($outroES==""){
			$outroES=NULL;
		}
		if($outroSP==""){
			$outroSP=NULL;
		}
		if($zona==""){
			$zona=NULL;
		}
		if($local==""){
			$local=NULL;
		}
		if($outroLE==""){
			$outroLE=NULL;
		}
		if($estado==""){
			$estado=NULL;
		}
		if($municipio==""){
			$municipio=NULL;
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
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "INSERT INTO local_exposicao(id_paciente, estabelecimento, outro_es, outro_sp, zona, local_exp, outro_le,".
		" estado, municipio, bairro, endereco, numero_end) ".
		" VALUES (".$ID.",'".$estabelecimento."','".$outroES."','".$outroSP."','".$zona.
		"','".$local."','".$outroLE."','".$estado."','".$municipio."','".$bairro."','".$endereco."','".$numeroEND."');";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
	}
	
function UpdateBancoLE($IDpaciente,$estabelecimento,$outroES, $outroSP, $zona, $local,$outroLE,$estado,$municipio,$bairro,$endereco,
$numeroEND){
		if($estabelecimento==""){
			$estabelecimento=NULL;
		}
		if($outroES==""){
			$outroES=NULL;
		}
		if($outroSP==""){
			$outroSP=NULL;
		}
		if($zona==""){
			$zona=NULL;
		}
		if($local==""){
			$local=NULL;
		}
		if($outroLE==""){
			$outroLE=NULL;
		}
		if($estado==""){
			$estado=NULL;
		}
		if($municipio==""){
			$municipio=NULL;
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
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "UPDATE local_exposicao SET estabelecimento='".$estabelecimento."',outro_es='".$outroES."',outro_sp='".$outroSP."',zona='".$zona.
		"',local_exp='".$local."',outro_le='".$outroLE."',estado='".$estado."',municipio='".$municipio."',bairro='".$bairro."',endereco='".$endereco
		."',numero_end='".$numeroEND."' WHERE id_paciente=".$ID.";";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
	}	
	
}
?>