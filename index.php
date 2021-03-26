<?php
        require 'SingletonDB.php';

         try {
            
           // $singletonDB = SingletonDB::getInstance()->connectMysql();
	   // $singletonDB = SingletonDB::getInstance()->connectMicrosoftSqlServer();
           // $singletonDB = SingletonDB::getInstance()->connectPostgreSql();
		 
           $singletonDB = SingletonDB::getInstance()->connectSQLite();
          $query  = "SELECT `nameUser` FROM `testwielki`";
         // $result = $singletonDB->prepare($query);
          $result = $singletonDB->query($query);
          $result->execute();
          $as = $result->fetchAll();
                  print_r($as);
             echo count($result->fetchAll());
             
       if($result->rowCount() > 0){
          $as = $result->fetchAll();
                print_r($as);
	     $result->closeCursor();
           }    
         } catch (Exception $ex) {
              $mesage1  = " ";
         echo $mesage1 .= $ex->getTraceAsString()
                .$ex->getMessage().'<br />'
                .$ex->getCode().'<br />'
                .$ex->getFile().'<br />'
                .$ex->getLine().'<br />'
                .$ex->getPrevious();
         } catch(PDOException $ep){
                  $mesage1  = " ";
             echo $mesage1 .= $ep->getTraceAsString()
                .$ep->getMessage().'<br />'
                .$ep->getCode().'<br />'
                .$ep->getFile().'<br />'
                .$ep->getLine().'<br />'
                .$ep->getPrevious();
             }
