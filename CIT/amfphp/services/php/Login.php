<?php


include_once("../php/includ/cit.inc.php");
//require_once("../php/class.BancoPostgres.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/CadastroUsuario.php");

Class Login{

	function ldap($usuario,$senha){
	
		$connect = @ldap_connect(LDAP_conexao);
		$usuario= $usuario .LDAP_dominio;

		if (!($connect)) {
			return 3;//  FALHA NA CONEXAO COM AD
		} else {
			if (!($bind = @ldap_bind($connect, $usuario,$senha))) {
				//se não validar
				return 0;
			} else {
				//se validar
				
					return 1;
				
			}


		}
	}

	
	function banoouldap(){//identificar se esta habilitado ou não o ad
		return false;
	}

	function verificarPerfil($usuario){
		$banco = new BancoMysql();
		
		
		$sql = "SELECT perfil FROM usuario WHERE login ='".$usuario."'";
		$s=$banco->Query($sql);
		if($s){	
			$C = implode("",$s);//tranformando array em string
			return $C;
		}else{
			return false;
		}
		
	}
	function LogBanco($usuario,$senha){
		$banco = new BancoMysql();
		
		
		$sql = "SELECT senha FROM usuario WHERE login ='".$usuario."'";
		$s=$banco->Query($sql);
		if($s){	
			$senhaC = implode("",$s);
			$casu= new CadastroUsuario();
			$r= $casu->CrypSenha($usuario,$senha);
			if($r==$senhaC){
				return true;//usuario e senha correto
			}else{
				return false;//senha errada.
				}
		}else{
			return 0;//usuario não encontrado no banco
		}
		
	
	
	
	}
	

	
}
?>