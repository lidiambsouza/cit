<?php

//include_once("../php/includ/cit.inc.php");

class tratarBanco{


function BancoConect(){//conectar ao banco mysql
		$con = mysqli_connect("10.206.2.16","cit","hujbb","db_cit_t");//conexao com banco formularios
		
			if (!($con)) {
				return null;
			}else{
				return $con;
				
		
			}
	}
	
function BancoDesconect($conexao){//desconectar ao banco mysql
		
		return mysqli_close($conexao);
	}
	
function tratarSinonimos(){
		$conec= $this->BancoConect();
		$sql="SELECT chave, (SELECT LCASE(nome)) FROM sinonimos WHERE 1";
		$result=mysqli_query($conec,$sql);
		
		while($dados = mysqli_fetch_array($result)){
			$sql2="UPDATE sinonimos SET nome = '".$dados[1]."' WHERE chave =".$dados[chave].";";
			$result2=mysqli_query($conec,$sql2);
		}
		
		$fconec=$this->BancoDesconect($conec);
		return $result2;
		
	}
	
function tratarBases(){
		$conec= $this->BancoConect();
		$sql="SELECT Codigo, (SELECT LCASE(nomedabase)) FROM bases WHERE 1";
		$result=mysqli_query($conec,$sql);
	
		while($dados = mysqli_fetch_array($result)){
			$sql2="UPDATE bases SET nomedabase = '".$dados[1]."' WHERE Codigo =".$dados[Codigo].";";
			$result2=mysqli_query($conec,$sql2);
		}
	
		$fconec=$this->BancoDesconect($conec);
		return $result2;	
		
	
	}

}
?>