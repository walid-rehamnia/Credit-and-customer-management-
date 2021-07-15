<?php
require('Client.php');//required to get the id of client using her name 
require('tools.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account
 *
 * @author RehamniaWalid
 */
class Account {
    private $username;
    private $password;
    private $id_client;
    private $is_admin;
    public function __construct($username,$password,$is_admin,$id) {
        $this->password=$password;
        $this->username=$username;
        $this->id_client=$id;
        $this->is_admin=($is_admin==1)?'true':'false';
    }
    
    
    public function create($id){
        
    }
    public function delete($id){
        
    }


    public function identification(){                      
        $b=0;
        try {
            $query = "select * from account where is_admin = ".$this->is_admin." and username= '".$this->username."' and password= '".$this->password." '";
            $res = tools::get_query_result($query);
            if($res)
           {  
                if($row = mysqli_fetch_assoc($res))
                    $b=$row['id_client_a'];
                
               mysqli_free_result($res);
           }                          
        } catch (Exception $ex) {
            echo "identfication : ".$ex; 
        }
       return $b;
    }

    public function add(){
        do {
            $rnd = mt_rand(1, 1000);
        } while (tools::is_exist("account", "id_account", $rnd));
        $query = "insert into account(id_account,username,password,id_client_a,is_admin) VALUES(" . $rnd . ",'" . $this->username . "','" . $this->password . "'," . $this->id_client . "," . $_this->is_admin . ");";
       $result =  tools::get_query_result($query);
        //if($row = mysqli_fetch_assoc($result))
    }
}
