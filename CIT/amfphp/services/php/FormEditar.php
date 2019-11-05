<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");
include_once("../php/CadastroFormulario.php");
//header( 'Content-Type: text/html; charset=utf-8' );

Class FormEditar{

function formED($id){
 $bid=(int)$id;
	$banco = new BancoMysql();
	
	$sql = "SELECT descricao FROM bases WHERE Codigo = ".$bid."; ";
	
	$s=$banco->Query($sql);
		if($s){	
			$C = implode("",$s);//tranformando array em string
			return $C;
		}else{
			return false;
		}
	

}

function formTituloED($id){
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
function sinonimoED($id){
	$bid=(int)$id;
	$banco = new BancoMysql();
	$sql = "SELECT nome FROM sinonimos WHERE base = ".$bid." ORDER BY chave ASC;";
	
	$s=$banco->Query2($sql);
	if($s){	
			while ($row = $s->fetch_row()){
			//while ($row = $s->fetch_assoc()){
				$arr[]=$row;
			
			}
			
			
			return $arr;
		}else{
			return false;
		}
	
}

function tituloTratar($nome){
	$bu= new BuscaUsuario();
	$titulot= $bu->semAcentuacao($nome);
	return $titulot;

}

function deletarSinonimo($id,$arr){
	$idINT=(int)$id;
	
	$banco = new BancoMysql();
	for($cont=0;$cont<count($arr);$cont++){
		$sql = "DELETE FROM sinonimos WHERE nome = '".$arr[$cont]."' AND base =".$idINT.";";
		$result = $banco->InserirQuery($sql); //Deletando dados no banco
		if($result==false){
			return false;
		}
	}
	return $result;
	//return $arr;
	
}

function UPbancoBase($titulo, $descricao,$id){
	
		$idINT=(int)$id;
		$tituloT= $this->tituloTratar($titulo);//tirar a acentuação.
			
		$banco = new BancoMysql();//instancia objeto banco
			
		$sql = "UPDATE bases SET nomedabase= '".$tituloT."', descricao='".$descricao."' WHERE Codigo =".$idINT.";";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;
	

}

function UPbancoSinonimo($id,$arr){
	$idINT=(int)$id;
	$casForm= new CadastroFormulario();

	//$banco = new BancoMysql();
	//$sql = "SELECT nome FROM sinonimos WHERE base = ".$idINT." ORDER BY chave ASC;";
	//$arSelec=$banco->($sql);	
	$arSelecTwo=$this->sinonimoED($id);
	$arSelec = call_user_func_array('array_merge', $arSelecTwo);//tranforma twoDimensionalArray para oneDimensionalArray
	//$arr=array("lidia","maria","beirao");
	if($arSelec){
		//caso adcionar descrição no banco
		$result1r=array_diff($arr,$arSelec);
		$result1=array_values($result1r);
		$inserirBol=$casForm->InsertBancoSinonimo($idINT,$result1);//inseri os novos sinonimos
		
		//caso remover descrição do banco
		$result2r =array_diff($arSelec, $arr);
		$result2=array_values($result2r);
		$delBol=$this->deletarSinonimo($idINT,$result2);//deleta os sinonimos pagados
		//$temp=($arr[0]===$arSelec[1]);
		//return $result1r;
	}else{
		return false;//não foi encontrado sinonimos
	}
	
	//atualização realizada
	if($inserirBol==true && $delBol==true){
		return true;
	}else{
		return false;
	}

}

}
?>