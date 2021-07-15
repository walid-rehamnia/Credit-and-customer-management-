<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client
 *
 * @author RehamniaWalid
 */
class Client {
    
    private $name;
    private $adress;
    private $tel;
    private $mail;
    public function __construct($name,$adress,$tel,$mail) {
        $this->name=$name;
        $this->name=$adress;
        $this->name=$tel;
        $this->mail=$mail;
    }
    
    
    public static function getData($id){
        $query = "select * from client where id = ".$id;
        require_once './tools.php';
        $result = tools::get_query_result($query);
        return mysqli_fetch_assoc($result);
    }
    
    public static function get_id($name){
        $query = "SELECT id from client where name='".$name."' LIMIT 1;";
                $result = tools::get_query_result($query);
                $id = ($row = mysqli_fetch_assoc($result))?$row['id']:NULL;
        return $id;
    }
}
