<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        <title>الصفحة الرئيسية لإدارة الكريدي</title>
    </head>
    <body>
        <?php
        //echo date('d-m-Y');
        require("login_control.php");
        ?>
        <?php 
  
  // PHP code to get the MAC address of Client 
  $MAC = exec('getmac'); 
    
  // Storing 'getmac' value in $MAC 
  $MAC = strtok($MAC, ' '); 
    
  // Updating $MAC value using strtok function,  
  // strtok is used to split the string into tokens 
  // split character of strtok is defined as a space 
  // because getmac returns transport name after 
  // MAC address    
  echo "The Host MAC address is: $MAC"; 
  ?> 
        <script src="script.js"></script>
    <center>
        <div class="header">
            <h1 id= "title">مرحبا بكم على الصفحة الرئيسية لإدارة كريدي مكتبة النجاح</h1>
        </div>
        <div class="sign_in">
            <h3>للمتابعة يرجى تسجيل الدخول</h3>
            <img src="gif/lock.gif" width="200" height="100" alt="" style=" border-radius:20px;">

            <form action="" method="POST">
                <select name="option">
                    <option>مسؤول</option>
                    <option value="زبون">زبون</option>
                </select>
                <input type="text" name="username" placeholder="إسم المستخدم">
                <br>
                <input type="password" name="password" placeholder="كلمة المرور" >
                <br>
                <input type="submit" name="submit" value="متابعة" id="sub">
            </form>    
        </div>
        <h3 id="ref"></h3>
    </center> 



    <script>
    document.addEventListener('contextmenu', event => event.preventDefault());
var isDisplay = true;
 myInterval = setInterval(mouveTitle,500);

 function mouveTitle(){
    var title = document.getElementById("title");
     if(isDisplay){
        title.innerText = "مـــكـتبـــة الــنجــــــاح";
         isDisplay = false;
     }
    else {
         isDisplay = true;
         title.innerText = " تــرحــب بــكم";
    }
}
//   برعاية المبرمج وليد
writeChaByChar("elnajehlibrary@gmail.com");
function writeChaByChar(txt){
//var arr = txt.split("");
var arr = Array.from(txt);
var n = arr.length;
if(n>0){
    let t;var i=0;
let item = document.getElementById("ref");  
setInterval(function(){if (i < n) item.innerText += arr[i++];else {i=1;item.innerText=arr[0];} },150);
}

}

    </script>
</body>
</html>
