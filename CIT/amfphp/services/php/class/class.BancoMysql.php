<?php

include_once("../php/includ/cit.inc.php");

class BancoMysql{


function BancoConect(){//conectar ao banco mysql
		$con = mysqli_connect(db_mysql_host,db_mysql_user,db_mysql_pass,db_mysql_db);//conexao com banco formularios
		//mysqli_set_charset($con,"utf8");
			if (!($con)) {
				return null;
			}else{
				return $con;
				
		
			}
	}
function BancoConect2(){//conectar ao banco mysql
		$con = mysqli_connect(db_mysql_host,db_mysql_user,db_mysql_pass,db_mysql_db);//conexao com banco formularios
		mysqli_set_charset($con,"utf8");
			if (!($con)) {
				return null;
			}else{
				return $con;
				
		
			}
	}	

	
function BancoDesconect($conexao){//desconectar ao banco mysql
		
		return mysqli_close($conexao);
	}
	
function InserirQuery2($sql){
		
		$conec= $this->BancoConect2();
		$result= mysqli_query($conec,$sql);
		if($result){
			$ID=mysqli_insert_id($conec);//retorna id no insert ou update
			$fconec=$this->BancoDesconect($conec);
			return $ID;
		}else{
			$fconec=$this->BancoDesconect($conec);
			return $result;
		}
		
	}
	
function InserirQuery($sql){
		
		$conec= $this->BancoConect2();
		$result= mysqli_query($conec,$sql);
		$fconec=$this->BancoDesconect($conec);
		return $result;
	}
	
function Query($sql){
		
		$conec= $this->BancoConect();
		$result=mysqli_query($conec,$sql);
		$fconec=$this->BancoDesconect($conec);
		if( mysqli_num_rows($result)== 0){
			return false;
		}else{
			return mysqli_fetch_row($result);
			//return mysqli_fetch_array($result);
			//return mysqli_fetch_object($result);
			//return mysqli_fetch_assoc($result);
		}
	}
	
function Query2($sql){
		
		$conec= $this->BancoConect();
		$result=mysqli_query($conec,$sql);
		$fconec=$this->BancoDesconect($conec);
		if( mysqli_num_rows($result)== 0){
			return false;
		}else{
			return $result;
			//return mysqli_fetch_array($result);
			//return mysqli_fetch_object($result);
			//return mysqli_fetch_assoc($result);
		}
	}

}
?>