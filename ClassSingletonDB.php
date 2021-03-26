<?php
/**
 * @package    Adam Berger
 *
 * @copyright  Copyright (C) 2021
 * @license    MIT
 * v1
 */
 
class SingletonDB{

public $error = 0;
public static $instancja = null;

private $options = [
            PDO::ATTR_PERSISTENT => true, 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // tylko Assoc $ff['userName']
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
                   ]; // bufor 1-50MB

private function __construct(){
     
}	
public static function getInstance(){
     if(self::$instancja == null){
        self::$instancja = new SingletonDB(); // new static();
       }
      return self::$instancja; 
}
public function connectSQLite(){  
    $filename ="dataBase.db"; 
    if(!file_exists($filename)){
        throw new Exception("Brak pliku bazy danych sqlite ".$filename);  
    }
     return new PDO("sqlite:".$filename, null, null, $this->options); 
     // return new SQLite3($filename);
}
public function connectMysql(){
    
	     $engine   = 'mysql';
             $host     = 'localhost'; // 127.0.0.1
	     $port     = 3306;
             $database = 'testsingleton';
             $user     = 'root';
             $pass     = '';
	   
 $dns = $engine.':host='.$host.';port='.$port.';'
       . 'dbname='.$database.';';
 $connect = new PDO($dns, $user, $pass, $this->options);  // bufor 1-50MB
 
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $connect;
}
public function connectMicrosoftSqlServer(){
    
	     $engine   = 'sqlsrv';
             $host     = 'localhost'; // 192.168.0.1
	     // $port     = 1433;
             $database = 'testsingleton';
             $user     = 'root';
             $pass     = '';
	   
 $dns = $engine.':server='.$host.';'
       . 'dbname='.$database.';';
 return new PDO($dns, $user, $pass, $this->options);  // bufor 1-50MB

}
public function connectPostgreSql(){
	
	     $engine   = 'pgsql';
             $host     = 'localhost'; // 127.0.0.1
	     $port     = 5432;
             $database = 'testsingleton';
             $user     = 'root';
             $pass     = '';
	   
 $dns = $engine.':host='.$host.';port='.$port.';'
        .'dbname='.$database.';user='.$user.';password='.$pass.'';
   return new PDO($dns, null, null, $this->options);  // bufor 1-50MB
  }
}
