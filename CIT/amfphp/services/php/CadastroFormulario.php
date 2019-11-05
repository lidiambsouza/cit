<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");

//header( 'Content-Type: text/html; charset=utf-8' );

Class CadastroFormulario{


function tituloTratar($nome){
	$bu= new BuscaUsuario();
	$titulot= $bu->semAcentuacao($nome);
	return $titulot;

}

function idBase($titulo){
	$banco = new BancoMysql();//instancia objeto banco
	$sql = "SELECT Codigo FROM bases WHERE nomedabase = '".$titulo."' ;";
	$s=$banco->Query($sql);//busca no banco
	return $s;

}
function tituloexists($titulo){
	$banco = new BancoMysql();//instancia objeto banco
	$sql = "SELECT Codigo FROM bases WHERE nomedabase = '".$titulo."' ;";
	$s=$banco->Query($sql);//busca no banco
	if($s){
		return false;//já existe o titulo
	}else{
		return true;//não existe o titulo
	}	
	
}

//função de inserir no banco o bases
function InsertBancoBase($titulo, $descricao){
	$TE=$this->tituloexists($titulo);
	if($TE){
		$tituloT= $this->tituloTratar($titulo);//tirar a acentuação.
			
		$banco = new BancoMysql();//instancia objeto banco
			
		$sql = "INSERT INTO bases(nomedabase, descricao) VALUES ('".$tituloT."','".$descricao."');";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		if($result){//retorna true se inserir os dados
			$s=$this->idBase($tituloT);
			if($s){
				$id= implode("",$s);// array em string
				return $id;//retorna id da nova base
			}else{
				return false;//não encontrou id da base
			}		
			
		}else{
			return false;//não inseriu os dados
		}
	}else{
		return false;//titulo já cadastrado no banco
	}

}

function InsertBancoSinonimo($id,$arr){
		$idINT=(int)$id;
		
		$banco = new BancoMysql();//instancia objeto banco
		for($cont=0;$cont<count($arr);$cont++){	
			$sql = "INSERT INTO sinonimos(nome, base) VALUES ('".$arr[$cont]."',".$idINT.");";
			$result = $banco->InserirQuery($sql); //inserido dados no banco
			if($result==false){
				return false;
			}
		}
	return true;

}


}
?>