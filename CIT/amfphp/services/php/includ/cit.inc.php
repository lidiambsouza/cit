<?php


define("db_mysql_host","10.206.2.16");
//define("db_mysql_host","localhost");
define("db_mysql_db","db_cit_t");
define("db_mysql_user","cit");
//define("db_mysql_user","root");
define("db_mysql_pass","hujbb");
//define("db_mysql_pass","541988");
define("LDAP_conexao",'ldap://10.206.2.9:389');
define("LDAP_dominio","@hujbb");

//Configurações de ambiente 
date_default_timezone_set("America/Belem");
//define("debug_mode","false"); // true = exibe erros | false = não exibe erros
 define("debug_mode",false);// true = exibe erros | false = não exibe erros

#############################
#     NÃO MUDE ABAIXO       #
#############################
	
if (debug_mode){
ini_set('display_errors', true); //change to false in production mode 
			// error_reporting(E_ALL); 
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
			
} else {
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
	
}

	

?>