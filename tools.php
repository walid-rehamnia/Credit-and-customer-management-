<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tools
 *
 * @author RehamniaWalid
 */
class tools {

    public static function get_query_result($query) {
        try {
            $conn = mysqli_connect("localhost", "root", "", "credit");
          //  $conn = mysqli_connect("sql313.epizy.com", "epiz_27299670","RjflzSYqCUQDfp","epiz_27299670_credit");
            if (mysqli_connect_errno())
                echo " connection to DB was Failed";
            $result = mysqli_query($conn, $query);
            mysqli_close($conn);
            if ($result)
                return $result;
        } catch (Exception $ex) {
            echo "get_result_query : " . $ex;
        }
    }

    public static function is_exist($table, $column, $value) {
        $conn = mysqli_connect("localhost", "root", "", "credit");
        if (mysqli_connect_errno())
            die() . 'connection error';
        $query = "select * from " . $table . " where " . $column . " = " . $value . " ";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            mysqli_free_result($result);
            return 1;
        } else {
            return 0;
        }
    }
    
    
    public static function convert_date($date){
        $i=0;
        $month="";$day="";$year="";
echo $date[0];
        while ($date[$i]!="/")
        {
            $month.=$date[$i];
            $i++;
        }
        echo 'the month is '.$month;
    }

}
