<?php


//include_once("../php/includ/cit.inc.php");
include_once("../php/class/class.BancoMysql.php");
include_once("../php/BuscaUsuario.php");

Class ConsultarPaciente{

function nomeTratar($nome){
	$bu= new BuscaUsuario();
	$nomet= $bu->semAcentuacao($nome);
	return $nomet;

}
function SelectExist($idP,$tabelaName){
	if($idP==""){
			return false;
	}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
			$numID=(int)$idP;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sql = "SELECT * FROM ".$tabelaName." WHERE id_paciente =".$numID.";";
			$s=$banco->Query2($sql);
			if($s){	
				while ($row = $s->fetch_row()){
					$arr[]=$row;
			
				}
				return true;
			}else{
				return false;
			}
		
	}
}

//função de inserir no banco o usuario
function SelectBancoP($numeroID){
		if($numeroID==""){
			return false;
		}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
			$numID=(int)$numeroID;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sql = "SELECT * FROM paciente WHERE id_paciente =".$numID.";";
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
function SelectBancoS($numeroID){
		if($numeroID==""){
			return false;
		}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
			$numID=(int)$numeroID;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sql = "SELECT * FROM solicitante WHERE id_paciente =".$numID.";";
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

function SelectBancoE($numeroID){
		if($numeroID==""){
			return false;
		}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
			$numID=(int)$numeroID;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sql = "SELECT * FROM exposicao WHERE id_paciente =".$numID.";";
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

function SelectBancoLE($numeroID){
		if($numeroID==""){
			return false;
		}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
			$numID=(int)$numeroID;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sql = "SELECT * FROM local_exposicao WHERE id_paciente =".$numID.";";
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

function SelectBancoATb($numeroID){
		if($numeroID==""){
			return false;
		}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
			$numID=(int)$numeroID;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sql = "SELECT agente_toxico FROM agente_toxico WHERE id_paciente =".$numID.";";
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

function SelectBancoAT($numeroID){
		if($numeroID==""){
			return false;
		}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
			$numID=(int)$numeroID;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sql = "SELECT id_agente, id_paciente, classificacao, outros FROM agente_toxico WHERE id_paciente =".$numID.";";
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
function SelectBancoTI($numeroID){
		if($numeroID==""){
			return false;
		}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
		$numID=(int)$numeroID;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sqlP="SELECT column_name FROM information_schema.COLUMNS WHERE table_name = 'tratamento';";
			//$sql = "SELECT * FROM agente_toxico WHERE id_paciente =".$numID.";";
			$s=$banco->Query2($sqlP);
			if($s){	
				while ($row1 = $s->fetch_array()){
					//$arr[]=$row[column_name];
					$sql="SELECT id_tratamento FROM tratamento WHERE ".$row1[column_name]." = 'tratamento inicial' AND id_paciente=".$numID."  ;";
					$d=$banco->Query2($sql);
					if($d){
						$arr[]=$row1[column_name];
					}
			
				}
				$sqlTa="SELECT TIantidoto FROM tratamento WHERE id_paciente=".$numID." AND antidoto= 'tratamento inicial';";
				$sqlTo="SELECT TIoutro FROM tratamento WHERE id_paciente=".$numID." AND outro= 'tratamento inicial';";
				$sqlTs="SELECT TIsoro FROM tratamento WHERE id_paciente=".$numID." AND soro= 'tratamento inicial';";
				$sqlTt="SELECT TItratsintomatico FROM tratamento WHERE id_paciente=".$numID." AND tratsintom = 'tratamento inicial';";
				$Ta=$banco->Query2($sqlTa);
				$To=$banco->Query2($sqlTo);
				$Ts=$banco->Query2($sqlTs);
				$Tt=$banco->Query2($sqlTt);
				//$i=0;!=false && !=false && !=false && !=false
				if($Ta){	
					while ($row = $Ta->fetch_object()){
						$arr2[]=$row->TIantidoto;
					}
					$arr= array_merge($arr,$arr2);
				}
				if($To){				
					while ($row2 = $To->fetch_object()){
						$arr3[]=$row2->TIoutro;
					}
					$arr= array_merge($arr,$arr3);
				}
				if($Ts){
					while ($row3 = $Ts->fetch_object()){
						$arr4[]=$row3->TIsoro;
					}
					$arr= array_merge($arr,$arr4);
				}
				if($Tt){
					while ($row4 = $Tt->fetch_object()){
						$arr5[]=$row4->TItratsintomatico;
					}
					$arr= array_merge($arr,$arr5);
				}
					
					
					
				return $arr;
					//return $arr[tratsintom];
								
			}else{
				return false;
			}
		
		}

}

function SelectBancoTP($numeroID){
		if($numeroID==""){
			return false;
		}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
		$numID=(int)$numeroID;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sqlP="SELECT column_name FROM information_schema.COLUMNS WHERE table_name = 'tratamento';";
			//$sql = "SELECT * FROM agente_toxico WHERE id_paciente =".$numID.";";
			$s=$banco->Query2($sqlP);
			if($s){	
				while ($row1 = $s->fetch_array()){
					//$arr[]=$row[column_name];
					$sql="SELECT id_tratamento FROM tratamento WHERE ".$row1[column_name]." = 'tratamento proposto' AND id_paciente=".$numID."  ;";
					$d=$banco->Query2($sql);
					if($d){
						$arr[]=$row1[column_name];
					}
			
				}
				$sqlTa="SELECT TIantidoto FROM tratamento WHERE id_paciente=".$numID." AND antidoto= 'tratamento proposto';";
				$sqlTo="SELECT TIoutro FROM tratamento WHERE id_paciente=".$numID." AND outro= 'tratamento proposto';";
				$sqlTs="SELECT TIsoro FROM tratamento WHERE id_paciente=".$numID." AND soro= 'tratamento proposto';";
				$sqlTt="SELECT TItratsintomatico FROM tratamento WHERE id_paciente=".$numID." AND tratsintom = 'tratamento proposto';";
				$Ta=$banco->Query2($sqlTa);
				$To=$banco->Query2($sqlTo);
				$Ts=$banco->Query2($sqlTs);
				$Tt=$banco->Query2($sqlTt);
				//$i=0;!=false && !=false && !=false && !=false
				if($Ta){	
					while ($row = $Ta->fetch_object()){
						$arr2[]=$row->TIantidoto;
					}
					$arr= array_merge($arr,$arr2);
				}
				if($To){				
					while ($row2 = $To->fetch_object()){
						$arr3[]=$row2->TIoutro;
					}
					$arr= array_merge($arr,$arr3);
				}
				if($Ts){
					while ($row3 = $Ts->fetch_object()){
						$arr4[]=$row3->TIsoro;
					}
					$arr= array_merge($arr,$arr4);
				}
				if($Tt){
					while ($row4 = $Tt->fetch_object()){
						$arr5[]=$row4->TItratsintomatico;
					}
					$arr= array_merge($arr,$arr5);
				}
					
					
					
				return $arr;
					//return $arr[tratsintom];
								
			}else{
				return false;
			}
		
		}

}

function SelectBancoTR($numeroID){
		if($numeroID==""){
			return false;
		}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
		$numID=(int)$numeroID;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sqlP="SELECT column_name FROM information_schema.COLUMNS WHERE table_name = 'tratamento';";
			//$sql = "SELECT * FROM agente_toxico WHERE id_paciente =".$numID.";";
			$s=$banco->Query2($sqlP);
			if($s){	
				while ($row1 = $s->fetch_array()){
					//$arr[]=$row[column_name];
					$sql="SELECT id_tratamento FROM tratamento WHERE ".$row1[column_name]." = 'tratamento realizado' AND id_paciente=".$numID."  ;";
					$d=$banco->Query2($sql);
					if($d){
						$arr[]=$row1[column_name];
					}
			
				}
				$sqlTa="SELECT TIantidoto FROM tratamento WHERE id_paciente=".$numID." AND antidoto= 'tratamento realizado';";
				$sqlTo="SELECT TIoutro FROM tratamento WHERE id_paciente=".$numID." AND outro= 'tratamento realizado';";
				$sqlTs="SELECT TIsoro FROM tratamento WHERE id_paciente=".$numID." AND soro= 'tratamento realizado';";
				$sqlTt="SELECT TItratsintomatico FROM tratamento WHERE id_paciente=".$numID." AND tratsintom = 'tratamento realizado';";
				$Ta=$banco->Query2($sqlTa);
				$To=$banco->Query2($sqlTo);
				$Ts=$banco->Query2($sqlTs);
				$Tt=$banco->Query2($sqlTt);
				//$i=0;!=false && !=false && !=false && !=false
				if($Ta){	
					while ($row = $Ta->fetch_object()){
						$arr2[]=$row->TIantidoto;
					}
					$arr= array_merge($arr,$arr2);
				}
				if($To){				
					while ($row2 = $To->fetch_object()){
						$arr3[]=$row2->TIoutro;
					}
					$arr= array_merge($arr,$arr3);
				}
				if($Ts){
					while ($row3 = $Ts->fetch_object()){
						$arr4[]=$row3->TIsoro;
					}
					$arr= array_merge($arr,$arr4);
				}
				if($Tt){
					while ($row4 = $Tt->fetch_object()){
						$arr5[]=$row4->TItratsintomatico;
					}
					$arr= array_merge($arr,$arr5);
				}
					
					
					
				return $arr;
					//return $arr[tratsintom];
								
			}else{
				return false;
			}
		
		}

}

function SelectBancoR($numeroID){
		if($numeroID==""){
			return false;
		}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
			$numID=(int)$numeroID;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sql = "SELECT id_resumo, id_paciente, manifestacaoclin, analisetoxi, internacao, especificar, evolucao, outro_evolucao, cid10, gravidade, data, gpagente FROM resumo WHERE id_paciente =".$numID.";";
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

function SelectBancoRb($numeroID){
		if($numeroID==""){
			return false;
		}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
			$numID=(int)$numeroID;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sql = "SELECT diagnostico_definitivo FROM resumo WHERE id_paciente =".$numID.";";
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

function SelectBancoV($numeroID){
		if($numeroID==""){
			return false;
		}else{
		
			//$nomeT= $this-> nomeTratar($nomeP);//tirar a acentuação.
			$numID=(int)$numeroID;
		
			$banco = new BancoMysql();//instancia objeto banco
			$sql = "SELECT observacao FROM resumo WHERE id_paciente =".$numID.";";
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

}
?>