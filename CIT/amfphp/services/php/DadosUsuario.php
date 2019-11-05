<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/CadastroUsuario.php");

Class DadosUsuario{
var $IDphp;
function prepSql($id, $nome,$perfil, $lotacao, $ramal, $email, $spark){
//UPDATE usuario SET nome=[value-2],perfil=[value-5],lotacao=[value-6],ramal=[value-7],email=[value-8],spark=[value-9] WHERE 1
	//$this->IDphp = $id; 
		//$s="UPDATE usuario SET ";
		$cont=0;
		if($nome!=""){
			$cadu= new CadastroUsuario();
			$nomeT= $cadu-> nomeTratar($nome);
			$nomeT="nome='".$nomeT."'";
			$as[]=$nomeT;
			$cont++;
		}
		if($perfil!=""){
			$perfil="perfil='".$perfil."'";
			$as[]=$perfil;
			$cont++;
		}
		if($lotacao!=""){
			$lotacao="lotacao='".$lotacao."'";
			$as[]=$lotacao;
			$cont++;
		}
		if($ramal!=""){
			$ramal="ramal='".$ramal."'";
			$as[]=$ramal;
			$cont++;
		}
		if($email!=""){
			$email="email='".$email."'";
			$as[]=$email;
			$cont++;
			
		}
		if($spark!=""){
			$spark="spark='".$spark."'";
			$as[]=$spark;
			$cont++;
		}
		if ($cont > 1){
			$f =$cont;
			$final=array_pop($as);
			//$inicio=$as[0];
			for($i=0; $i< $cont-1; $i++){
				$vs=$vs.$as[$i].", ";
				//$final=$as[$i+1];
			}
			
				//$vvs=$inicio.", ".$vs.$final;
				$vvs=$vs.$final;
		}else{
			$vvs=$as[0];
		}
		
		
		
		$sql="UPDATE usuario SET ".$vvs." WHERE id_usuario =".$id.";";
		return $sql;
		//return $as[$cont];
		//return $max+1;
		//return $final;
}

function dadosUsu($id2, $nome2,$perfil2, $lotacao2, $ramal2, $email2, $spark2){
	if($email2!=""){
		$cad= new CadastroUsuario();
		$ve=$cad->validaEmail($email2);
		if($ve){
			$sql= $this->prepSql($id2, $nome2,$perfil2, $lotacao2, $ramal2, $email2, $spark2);
			$banco = new BancoMysql();
			$s=$banco->InserirQuery($sql);
			return $s;
		}else{
			return 33;// email invalido
		}
	}else{
		$sql= $this->prepSql($id2, $nome2,$perfil2, $lotacao2, $ramal2, $email2, $spark2);
			$banco = new BancoMysql();
			$s=$banco->InserirQuery($sql);
			return $s;
	}
}



}

?>