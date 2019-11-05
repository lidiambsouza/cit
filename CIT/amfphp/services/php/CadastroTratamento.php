<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");

Class CadastroTratamento{

function nomeTratar($nome){
	$bu= new BuscaUsuario();
	$nomet= $bu->semAcentuacao($nome);
	return $nomet;

}
function SelectBancoTexto($paciente){
	if($paciente==""){
			return false;
	}else{
		$ID=(int)$paciente;
		$banco = new BancoMysql();
		//$ID=39;
		$sql="SELECT id_tratamento, id_paciente, TIantidoto, TIoutro, TIsoro, TItratsintomatico FROM tratamento WHERE id_paciente =".$ID.";";
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

//função de inserir no banco o usuario
function InsertBancoT($IDpaciente,$nenhumS,$obsclinS,$tratsuporteS,
        	$desconcutmucoS,$desconocularS,$diluicaoS,$intcirurS,$demulcentesS,
        	$neutraS,$emeseS,$lavgastS,$lavinstS,$carvatvS,$ignoradoS,$catarticosS,
        	$diurforcS,$hemodiaS,$hemodperS,$exstransS,$retendoscS,$antidotoS,$soroS,$tratsintomS,$outroS,
        	$TIantidoto,$TIoutro,$TIsoro,$TItratsintomatico){
		/*if($TAagentToxico==""){
			$TAagentToxico=NULL;
		}
		if($TIoutro==""){
			$TIoutro=NULL;
		}
		if($classificacaoEscolhida==""){
			$classificacaoEscolhida=NULL;
		}*/
		
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "INSERT INTO tratamento(id_paciente, nenhum, obsclin, tratsuporte, desconcutmuco,".
		" desconocular, diluicao, intcirur, demulcentes, neutra, emese, lavgast, lavinst, carvatv, ignorado,".
		" catarticos, diurforc, hemodia, hemodper, exstrans, retendosc, antidoto, soro, tratsintom, outro,".
		" TIantidoto, TIoutro, TIsoro, TItratsintomatico)".
		" VALUES (".$ID.",'".$nenhumS."','".$obsclinS."','".$tratsuporteS."','".
		$desconcutmucoS."','".$desconocularS."','".$diluicaoS."','".$intcirurS."','".$demulcentesS."','".
		$neutraS."','".$emeseS."','".$lavgastS."','".$lavinstS."','".$carvatvS."','".$ignoradoS."','".
		$catarticosS."','".$diurforcS."','".$hemodiaS."','".$hemodperS."','".$exstransS."','".$retendoscS."','".
		$antidotoS."','".$soroS."','".$tratsintomS."','".$outroS."','".$TIantidoto."','".$TIoutro."','".$TIsoro."','".$TItratsintomatico."');";
		
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
		
	}
	
function UpdateBancoT($IDpaciente,$nenhumS,$obsclinS,$tratsuporteS,
        	$desconcutmucoS,$desconocularS,$diluicaoS,$intcirurS,$demulcentesS,
        	$neutraS,$emeseS,$lavgastS,$lavinstS,$carvatvS,$ignoradoS,$catarticosS,
        	$diurforcS,$hemodiaS,$hemodperS,$exstransS,$retendoscS,$antidotoS,$soroS,$tratsintomS,$outroS,
        	$TIantidoto,$TIoutro,$TIsoro,$TItratsintomatico){
		/*if($TAagentToxico==""){
			$TAagentToxico=NULL;
		}
		if($TIoutro==""){
			$TIoutro=NULL;
		}
		if($classificacaoEscolhida==""){
			$classificacaoEscolhida=NULL;
		}*/
		
		//$nomeT= $this-> nomeTratar($nomeS);//tirar a acentuação.
		$ID=(int)$IDpaciente;		
		$banco = new BancoMysql();//instancia objeto banco
		//$ID=1;
		//codigo sql de inseri dados no banco
		$sql = "UPDATE tratamento SET nenhum='".$nenhumS."',obsclin='".$obsclinS."',tratsuporte='".$tratsuporteS.
		"',desconcutmuco='".$desconcutmucoS."',desconocular='".$desconocularS."',diluicao='".$diluicaoS."',intcirur='".$intcirurS.
		"',demulcentes='".$demulcentesS."',neutra='".$neutraS."',emese='".$emeseS."',lavgast='".$lavgastS."',lavinst='".$lavinstS.
		"',carvatv='".$carvatvS."',ignorado='".$ignoradoS."',catarticos='".$catarticosS."',diurforc='".$diurforcS."',hemodia='".$hemodiaS.
		"',hemodper='".$hemodperS."',exstrans='".$exstransS."',retendosc='".$retendoscS."',antidoto='".$antidotoS."',soro='".$soroS.
		"',tratsintom='".$tratsintomS."',outro='".$outroS."',TIantidoto='".$TIantidoto."',TIoutro='".$TIoutro.
		"',TIsoro='".$TIsoro."',TItratsintomatico='".$TItratsintomatico."' WHERE id_paciente=".$ID.";";
		
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
		
	}	
	
}
?>