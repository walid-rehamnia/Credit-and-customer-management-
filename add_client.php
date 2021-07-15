<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>
    <center>
        <div class="sign_in">
            <form action="" method="POST">
                <input type="text" name="name" placeholder="الاســــم و اللــقب"><br>
                <input type="text" name="adress" placeholder="العـــنوان"><br>
                <input type="tel" name="tel" placeholder="الهـــاتف"><br>
                <input type="email" name="mail" placeholder="البـريد الالكـتروني"><br>            
                <input type="submit" name="submit" id="sub" value="تم">
            </form>
        </div>


<div id="modalWindow">
    <div style="border:solid;padding-bottom:5%;">

    <img src="success.gif" title="Success" alt="wait" width="200" height="200">
        <h2 style="color:#1a73e8">تـمّـــت العملية بنجـــاح</h2>
        <a href="add_client.php">متابعة</a>  
    </div>

</div>


    </center>
    <?php
    
    require './tools.php';
    if (isset($_POST['submit'])) {

        if ($_POST['name'] != "") {
            //insert into client(name,adress,tel,mail) VALUES('walid','samital N° 72','06.76.07.12.62',true);
            do {
           $rnd = mt_rand(1, 1000);
            } while (tools::is_exist("client", "id", $rnd));
            $query = "insert into client(id,name,adress,tel,mail) VALUES(" . $rnd . ",'" . $_POST['name'] . "','" . $_POST['adress'] . "','" . $_POST['tel'] . "','" . $_POST['mail'] . "');";
            $result = tools::get_query_result($query);
       }
       header ("location: add_client.php#modalWindow");
    }
    ?>    
    <?php
    // put your code here
    ?>
</body>

</html>
