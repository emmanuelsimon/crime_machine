<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbConn
 *
 * @author manu
 */
class dbConn{
    public static $db;
    public static $dbCon;
    
    private function __construct() {
        try
        {
            self::$db=new PDO('mysql:host=localhost;dbname=criminalite;charset=utf8', 'root', 'elmedo951');
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (Exception $ex) 
        {
            echo "connection error : ".$ex->getMessage();
        }
    }
    
    public static function getConnection(){
        if(!self::$db){
            $dbCon=new dbConn();
        }
        return self::$db;
    }
}
