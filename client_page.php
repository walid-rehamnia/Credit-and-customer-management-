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
        <?php
        require 'Client.php';
        $id = $_GET['i'];
        $result = Client::getData($id);
        if ($result)
            
            ?>
    <center>
        <div>
        <h1 class="header">معلومـات الزبــــون </h1>
            <table border="0">
                <tr>
                    <td>السيــد  (ة) :<?php echo $result['name']; ?></td>
                    <td>العنــــوان : <?php echo $result['adress']; ?></td>  
                </tr>

                <tr>
                    <td>رقم الـهـــاتف :<?php echo $result['tel']; ?></td>
                    <td>البريد الإلكـتروني :  <?php echo $result['mail']; ?></td>
                </tr>
            </table>

        </div>

        <div>
        <br>
        <h1 class="header">تفـــاصيل العملـيــات </h1>
            <table>
                <tr>
                    <th>الـرقم</th>
                    <th>السـعر (دج)</th>
                    <th>الوصـــف</th>
                    <th>التاريخ</th>
                </tr>
                <?php
                $result = tools::get_query_result("select * from visit where id_client = ".$id);
                while ($row = mysqli_fetch_assoc($result))
                    echo "<tr> <td>" . $row['num'] . "</td> <td>" . $row['price'] . "</td> <td>" . $row['description'] . "</td> <td>" . $row['date'] . "</td> </tr>";
                //Calculating the sum of the prices
                $query = "SELECT sum(price) as total from visit where id_client=".$id;
                $result = tools::get_query_result($query);
                if($sum = mysqli_fetch_assoc($result))
                                echo "<tr> <td>المـجمـــوع : </td> <td>".$sum['total']."</td> </tr>";
                mysqli_free_result($result);
                ?> 
            </table>

        </div>

        <?php
// put your code here
        ?>
    </center> 
</body>
</html>
