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
            <select name="option">
                    <option>مسؤول</option>
                    <option value="زبون">زبون</option>
                </select>
            </select>

<select name="user" style="margin-top: 5%">

    <?php// To Display the list of client
    $query = "select name from client order by name";
    require'./tools.php';
    $res = tools::get_query_result($query);
    while ($row = mysqli_fetch_assoc($res))
        echo "<option>" . $row['name'] . "</option>";

    mysqli_free_result($res);
    ?>

</select>
                <input type="text" name="username" placeholder="اســــم المـسـتـخـدم"><br>
                <input type="password" name="pass1" placeholder="كــلـمـة الـمــرور"><br>
                <input type="password" name="pass2" placeholder=" تأكيد كلمة المرور "><br>
                <input type="submit" name="submit" id="sub" value="تم">
            </form>
        </div>
    </center>
    <?php
    //require './tools.php';
    require("Account.php");
    if (isset($_POST['submit'])) {
        if ($_POST['username'] != "" && $_POST['pass1'] != "" && $_POST['pass2'] != "") {
            $user = $_POST['user'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];

            if(!strcmp($pass1,$pass2)){
               
                if(!(tools::is_exist("account", "username", $user))){
    public static function get_id($name){
    if(Tool::is_exist($table, $column, $value)){
                    $account = new Account($_POST["username"],$_POST["pass1"],$_POST["option"],Client::get_id($_POST["user"]););
                    $account->add();
                    header ("location: add_account.php");
                }        //check the username existing
                else {echo "<script>alert('اسم المستخدم موجود بالفعل جرب اسم آخر')</script>";
                    header ("location: add_account.php");
                }
  
            }//comparing pass
            else {echo "<script>alert('كـلمتــا السر غير متطـابقتين')</script>";
                header ("location: add_account.php");
            //insert into client(name,adress,tel,mail) VALUES('walid','samital N° 72','06.76.07.12.62',true);
        }
        
        
    } 
     }

    } //Testing null value
    else{
        echo "<script>myInterval2 = setTimeout('alert('لا بـد من ملأ كل الفراغات للتسجيل')',1200)</script>";
        header ('location: add_account.php');
    }
    }//submit
    ?>    
    <?php
    // put your code here
    ?>
</body>

</html>
