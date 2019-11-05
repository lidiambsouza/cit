<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");

Class CadastroUsuario{

function validaEmail($email) {
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return false;//email invalido
	}else{
		return true;//email valido
	}
}

function validarsenha($senha,$confirmarSenha){
	if ($senha==$confirmarSenha){
		return true;//senha ok
	}else{
		return false;//erro na senha
	}

}
function validarlogin($login){
	$banco = new BancoMysql();
	$sql = "SELECT login FROM usuario WHERE login ='".$login."'";
	$s=$banco->Query($sql);
	if($s){	
		return true;//	usuario encontrado no banco
	}else{
		return false;//usuario não encontrado no banco
	}
}


function CrypSenha($login,$senha){
	$a1 = crypt($login, '$2$');

	$a2 = crypt($senha, '$2$');
	//$c=$login.$senha;
	//$r=crypt($c, '$2$');
	//return $r;
	return $a1.$a2;
}

function nomeTratar($nome){
	$bu= new BuscaUsuario();
	$nomet= $bu->semAcentuacao($nome);
	return $nomet;

}


//função de inserir no banco o usuario
function InsertBanco($nome, $login, $senha, $perfil, $lotacao, $ramal, $email, $spark){
		if($lotacao==""){
			$lotacao=NULL;
		}
		if($ramal==""){
			$ramal=0;
		}
		if($email==""){
			$email=NULL;
		}
		if($spark==""){
			$spark=NULL;
		}
		$nomeT= $this-> nomeTratar($nome);//tirar a acentuação.
		
		$banco = new BancoMysql();//instancia objeto banco
		$senhaC= $this-> CrypSenha($login,$senha);
		//codigo sql de inseri dados no banco
		$sql = "INSERT INTO usuario(nome, login, senha, perfil, lotacao, ramal, email, spark) VALUES ('".$nomeT."','".$login."','".$senhaC."',".$perfil.",'".$lotacao."',".$ramal.",'".$email."','".$spark."');";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
	}
}
?>