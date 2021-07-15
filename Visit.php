<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Visit
 *
 * @author RehamniaWalid
 */
class Visit {
    //put your code here
    protected $price;
     protected $description;
      protected $date;
       protected $client_id;
       
       public function __construct($price,$desc,$date,$id,$is_pay) {
           $this->description=$desc;
           $this->date=$date;
           $this->client_id=$id;
           if($is_pay)
               $this->price=-$price;
           else
               $this->price=$price;

       }
       public function add(){
           $query = "insert into visit(price,description,date,id_client) VALUES(".$this->price.",'".$this->description."','".$this->date."',".$this->client_id.");";
          $result =  tools::get_query_result($query);
           //if($row = mysqli_fetch_assoc($result))
       }
    
    
}
