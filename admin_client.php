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
        <title>قــــائمــة الـــزبـــــائن</title>
    </head>
    <body>
    <center>
        <h2 style="color: darkorange">المــجموع : 
        <span id="sum">
        <?php
                        require './tools.php';
            $result = tools::get_query_result("select sum(price) as sum from visit");
            if ($row = mysqli_fetch_assoc($result))
                echo $row['sum'];
            ?>             
        </span>
        </h2>
        <script>
        
    var nbr = document.getElementById("sum");
    alert(typeof nbr.innerText);

    var n = Number(nbr.innerText);
    alert(typeof n +":"+s n);
    alert("fff");
    nbr.innerText='0';
    var i = 0;
    alert("fff");
   setInterval(function(){if (i < n){nbr.innerText = String((Number(nbr.innerText))+=1)i++;}},150);
}
   // for(i=0;i<=n;i++)
    //    nbr.innerText = String((Number(nbr.innerText))+=1);
        
    </script>

        <h1 class="header" >قــــائمــة الـــزبـــــائن(<span id="clientNumber"></span>)</h1>
        <table border="1" id="dataTab">
            <tr>                
            <th>الـرقــم</th>
                <th>الإســـم</th>
                <th>الـــعنوان</th>
                <th>الهــاتف</th>
                <th>البريد الإلـكتروني</th>
                <th>المبـلغ الإجـمالي</th>
            </tr>
            <?php
            //$query = "select id,name,adress,tel,mail,SUM(price) as total from client,visit where id=id_client GROUP by visit.date DESC";
            $query = "select id,name,adress,tel,mail,SUM(price) as total from client,visit where id=id_client GROUP by name";
            $result = tools::get_query_result($query);
            while ($row = mysqli_fetch_assoc($result))
                echo "<tr> <td>" . $row['id'] . "</td> <td>" . $row['name'] . "</td> <td>" . $row['adress'] . "</td>"
                . " <td>" . $row['tel'] . "</td> <td>" . $row['mail'] . "</td> <td>" . $row['total'] . "</td> </tr>";
            mysqli_free_result($result);
            ?> 
        </table>
    </center>


    <script>


    var tab = document.getElementsByTagName("tr");
let n = tab.length;
document.getElementById("clientNumber").innerText = n-1+" زبــــون ";//Displaying client number
for (let i = 0; i < n; i++) {
    tab[i].onmouseover = function () {
        this.setAttribute("class", "overNavMain");
        //this.innerHTML=mainArray[i]+ch;
        sub.innerHTML = '<ul class="subNavigationBar">' + ch[i] + '</ul>';
        form.setAttribute("style", "margin-top: -0.5%;");
    }
    tab[i].onmouseleave = function () {
        this.setAttribute("class", "normalNavMain");
    }
    tab[i].onclick = function () {
        //alert( this.nextSibling.innerHTML);
        let id = this.childNodes[1].innerText;
        window.location.href = 'client_page.php?i='+id;
        
    }

    }

    </script>
</body>
</html>
