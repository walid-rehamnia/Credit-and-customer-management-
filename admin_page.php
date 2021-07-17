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
        <title>صفحة المسؤول</title>
    </head>
    <body>
    <center>



    <?php
        require 'Visit.php';
        require 'tools.php';
        if (isset($_POST['submit'])) {
            require './Client.php';
            $bo = $_POST['option'] == "تــسديــد";
            $id = Client::get_id($_POST['user']);
            //To manage the date
            $str_date = $_POST['date'];
            if($str_date!=null){
                $str_year=$str_date[0].$str_date[1].$str_date[2].$str_date[3];
                $str_month=$str_date[5].$str_date[6];
                $str_day=$str_date[8].$str_date[9];  
            }
            else{
                $str_year=date("Y");
                $str_month=date("m");;
                $str_day=date("d");;
            }   
            $date = $str_year."-".$str_month."-".$str_day;     //Generating regular form .             
            if( strlen($_POST['price'])!=null){
                $v = new Visit($_POST['price'], $_POST['description'],$date, $id, $bo);
                $v->add();
                header ("location: admin_page.php#modalWindow");
            //   set_url("admin_page.php#modalWindow");
            }
        }
        ?>



    <?php
///Exporting Database
//Entrez ici les informations de votre base de données et le nom du fichier de sauvegarde.
if(isset($_POST['download'])){ 

    $mysqlUserName      = "root";
    $mysqlPassword      = "";
    $mysqlHostName      = "localhost";
    $DbName             = "credit";
    $backup_name        = "mybackup.pdf";
    $tables             = "credit";

   //or add 5th parameter(array) of specific tables:    array("mytable1","mytable2","mytable3") for multiple tables

    function Export_Database($host,$user,$pass,$name,  $tables=false, $backup_name=false )
    {
        $mysqli = new mysqli($host,$user,$pass,$name); 
        $mysqli->select_db($name); 
        $mysqli->query("SET NAMES 'utf8'");
        $queryTables    = $mysqli->query('SHOW TABLES'); 
        while($row = $queryTables->fetch_row()) 
        { 
            $target_tables[] = $row[0]; 
        }   
        if($tables !== false) 
        { 
            $target_tables = array_intersect( $target_tables, $tables); 
        }
        foreach($target_tables as $table)
        {
            $result         =   $mysqli->query('SELECT * FROM '.$table);  
            $fields_amount  =   $result->field_count;  
            $rows_num=$mysqli->affected_rows;     
            $res            =   $mysqli->query('SHOW CREATE TABLE '.$table); 
            $TableMLine     =   $res->fetch_row();
            $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) 
            {
                while($row = $result->fetch_row())  
                { //when started (and every after 100 command cycle):
                    if ($st_counter%100 == 0 || $st_counter == 0 )  
                    {
                            $content .= "\nINSERT INTO ".$table." VALUES";
                    }
                    $content .= "\n(";
                    for($j=0; $j<$fields_amount; $j++)  
                    { 
                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
                        if (isset($row[$j]))
                        {
                            $content .= '"'.$row[$j].'"' ; 
                        }
                        else 
                        {   
                            $content .= '""';
                        }     
                        if ($j<($fields_amount-1))
                        {
                                $content.= ',';
                        }      
                    }
                    $content .=")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) 
                    {   
                        $content .= ";";
                    } 
                    else 
                    {
                        $content .= ",";
                    } 
                    $st_counter=$st_counter+1;
                }
            } $content .="\n\n\n";
        }
        //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
        $backup_name = $backup_name ? $backup_name : $name.".sql";
        header('Content-Type: application/octet-stream');   
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"".$backup_name."\"");  
        echo $content;
        //tO SEND THE EMAIL 
        $to = 'receiver@gmail.com';
        $subject = 'Backup File';
        $message = $content; 
        $from = 'sender@gmail.com';
         
        // Sending email
        if(mail($to, $subject, $message,'From: receiver@gmail.com')){
            echo 'Your mail has been sent successfully.';
        } else{
            echo 'Unable to send email. Please try again.';
        }
        
        exit;
    }
    Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false, $backup_name=false );
}

?>






        <div id="navnav" class="fullNav" style="padding-bottom: 0%">
        <div>
        <ul class="mainNavigationBar" >
                <li class="normalNavMain" style="float:right;">الزبــائن</li>
                <li class="normalNavMain" style="float:right;">الحسـابات</li>
                <li class="normalNavMain" style="float:right;">الـمـزيـد</li>
                <li class="normalNavMain" style="float:right;">حــــــول</li>
            </ul>
        </div>
        <div id = "subList" style="margin-right:0%;margin-left:17%;"></div>
        </div>






        <div class="sign_in">
            <form action="" method="POST">
                <select name="option" style="margin-top: 5%">
                    <option name="cr">كــريـدي</option>
                    <option name="pa">تــسديــد</option>
                </select>

                <select name="user" style="margin-top: 5%">

                <?php
                    $query = "select name from client order by name";
                    require_once'./tools.php';
                    $res = tools::get_query_result($query);
                    while ($row = mysqli_fetch_assoc($res))
                        echo "<option>" . $row['name'] . "</option>";

                   // mysqli_free_result($res);
                    ?>

                </select>
                <br>
                <input type="number" name="price" placeholder="المبلغ بالدينار"><br>
                <input type="text" name="description" placeholder="الـتـــفاصـيل">
                <input type="date" name="date">
                <br>
                <input type="submit" name="submit" id="sub" value="تم">
            </form>
        </div>
        <div>
            <form action="" method="POST">            
                <input type="submit" name="download" id="sub" value="اسـتخــراج قاعدة البـيانات">
                <input type="submit" name="send" id="r" value="إرسال">
                <span id="network_status">حالة الشــبكة : </span>
            </form>
        </div> 











        <div id="modalWindow">
    <div style="border:solid;padding-bottom:5%;">

    <img src="success.gif" title="Success" alt="wait" width="200" height="200">
        <h2 style="color:#1a73e8" id="detail">تـمّت العملية بنجــاح</h2>
        <a href="admin_page.php">متابعة</a>  
    </div>

</div>


        <?php?>


    </center>
    <script src="script.js"></script>



</body>
</html>



