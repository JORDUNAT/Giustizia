<?php
class DatabaseClass
{
	//Atributos estáticos, no pueden ser instanciados
	private static $dbName = '' ; 
	private static $dbHost = '' ;
	private static $dbUsername = '';
	private static $dbUserpassword = ''; 		
	private static  $cont  = null;
	
	//Constructor
	public function __construct($dbName,$dbHost,$dbUsername,$dbUserPassword) {
		self::$dbName 		= 	$dbName;
		self::$dbHost		=	$dbHost;
		self::$dbUsername	= 	$dbUsername;
		self::$dbUserpassword=	$dbUserPassword;
		
		//exit('Init function is not allowed');
	}
	
	//Método para realizar la conexión
	public static function connect()
	{
	   // One connection through whole application
       if ( null == self::$cont )	   
       {
          self::$cont = new mysqli(self::$dbHost,self::$dbUsername,self::$dbUserpassword, self::$dbName);
          mysqli_query(self::$cont,"SET NAMES 'utf8'");		  
       }	   
       return self::$cont;
	}
	
	public static function disconnect()
	{
		//Desconectar la aplicación de la BD
		self::$cont = null;		
	}
}
?>