<?php
require 'Account.php';
if(isset($_POST['submit'])){
    $bo = $_POST['option']=="مسؤول";
    $acc = new Account($_POST['username'],$_POST['password'],$bo,1);
    $id = $acc->identification();
   if($id!=0)
   {
       if($bo)
           header ("location: admin_page.php");   
       else
              header ("location: client_page.php?i=".$id);  
   }
   else
   echo "<script>alert('هـناك خطأ في المـدخـلات')</script>";
        //echo '<script>document.getElementsByTagName("span")[0].innerText="";</script>';
      //  echo $bo.'  "user-name", "pass-word ", or "type" are incorrect';
      //echo "\n<script>document.getElementsById('mark').innerHTML='هـناك خطأ في المـدخـلات';</script>\n";

       
    
}
?>