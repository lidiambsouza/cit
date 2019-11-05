<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");

Class CadastroPaciente{

function nomeTratar($nome){
	$bu= new BuscaUsuario();
	$nomet= $bu->semAcentuacao($nome);
	return $nomet;

}
function UltimoNumeroID(){
	$valorInicial=1;// setar o valor inicial repassado pelo cit
	
	$banco = new BancoMysql();//instancia objeto banco
	//$sql ="SELECT numeroID FROM paciente WHERE id_paciente = (select MAX(id_paciente) from paciente);";
	$sql ="select MAX(numeroID) from paciente;";
	$result = $banco->Query($sql); //inserido dados no banco
	if($result==0){
		return $valorInicial;
	}else{
		$id= implode("",$result);
		$IDnum=(int)$id;
		return ($IDnum+1);// retornar true se inserir os dados
	}
	
}


//função de inserir no banco o usuario
function InsertBancoP($nomeP, $sexo, $idade, $tempoidade, $peso, $telefoneDDD, $telefone,
 $especie, $gestante,$profissao,$gestanteTempo,$estado,$municipio,$bairro,$endereco,$numeroEND,$vitima,
 $centro,$numeroID,$data,$sem,$hora,$UsuarioLogin){
		if($peso==""){
			$peso=0;
		}
		if($telefoneDDD==""){
			$telefoneDDD=0;
		}
		if($telefone==""){
			$telefone=NULL;
		}
		if($especie==""){
			$especie=NULL;
		}
		if($gestante==""){
			$gestante=NULL;
		}
		if($gestanteTempo==""){
			$gestanteTempo=NULL;
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
		if($vitima==""){
			$vitima=NULL;
		}
		if($centro==""){
			$centro=NULL;
		}
		
		if($data==""){
			$data=NULL;
		}
		if($sem==""){
			$sem=NULL;
		}
		if($hora==""){
			$hora=NULL;
		}
		
		$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
		$numeroIDD=(int)$numeroID;
		
		$banco = new BancoMysql();//instancia objeto banco
		//inserir data: 20151115,AAAAmmDD. hora:231800,HHmmSS
		//codigo sql de inseri dados no banco
		$sql = "INSERT INTO paciente(nome, sexo, idade, tempo_idade, peso_kg, telefone_ddd, telefone,".
		"especie, gestante, profissao, gestante_tempo, estado,".
		"municipio, bairro, endereco, numeroEND, vitima,".
		"centro, numeroID, data, sem, hora,login_usuario) VALUES ('".$nomeT."','".$sexo."',".$idade.",'".$tempoidade."',".$peso.",".$telefoneDDD.",'".$telefone."','".$especie."','".$gestante.
		"','".$profissao."','".$gestanteTempo."','".$estado."','".$municipio."','".$bairro."','".$endereco."','".$numeroEND."','".$vitima."','".$centro."',".$numeroIDD.",'".$data."','".$sem."','".$hora."','".$UsuarioLogin."');";
		$result = $banco->InserirQuery2($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
	}
	
function UpdateBancoP($ID,$nomeP, $sexo, $idade, $tempoidade, $peso, $telefoneDDD, $telefone,
 $especie, $gestante,$profissao,$gestanteTempo,$estado,$municipio,$bairro,$endereco,$numeroEND,$vitima,
 $centro,$numeroID,$data,$sem,$hora){
		if($peso==""){
			$peso=0;
		}
		if($telefoneDDD==""){
			$telefoneDDD=0;
		}
		if($telefone==""){
			$telefone=NULL;
		}
		if($especie==""){
			$especie=NULL;
		}
		if($gestante==""){
			$gestante=NULL;
		}
		if($gestanteTempo==""){
			$gestanteTempo=NULL;
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
		if($vitima==""){
			$vitima=NULL;
		}
		if($centro==""){
			$centro=NULL;
		}
		
		if($data==""){
			$data=NULL;
		}
		if($sem==""){
			$sem=NULL;
		}
		if($hora==""){
			$hora=NULL;
		}
		
		$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
		$IDpaciente=(int)$ID;
		$numeroIDD=(int)$numeroID;
		
		$banco = new BancoMysql();//instancia objeto banco
		//inserir data: 20151115,AAAAmmDD. hora:231800,HHmmSS
		//codigo sql de inseri dados no banco
		$sql = "UPDATE paciente SET nome='".$nomeT."',sexo='".$sexo."',idade=".$idade.",tempo_idade='".$tempoidade."',peso_kg=".$peso.
		",telefone_ddd=".$telefoneDDD.",telefone='".$telefone."',especie='".$especie."',gestante='".$gestante."',profissao='".$profissao.
		"',gestante_tempo='".$gestanteTempo."',estado='".$estado."',municipio='".$municipio."',bairro='".$bairro."',endereco='".$endereco.
		"',numeroEND='".$numeroEND."',vitima='".$vitima."',centro='".$centro."',numeroID=".$numeroIDD.",data='".$data."',sem='".$sem."',hora='".$hora.
		"' WHERE id_paciente=".$IDpaciente.";";
		$result = $banco->InserirQuery($sql); //inserido dados no banco
		return $result;// retornar true se inserir os dados
		
	}

	
}
?>