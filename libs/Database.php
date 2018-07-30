<?php
/**
 * Created by PhpStorm.
 * User: Dinht
 * Date: 6/26/2018
 * Time: 11:36 PM
 */

class Database {
    public static function ExecuteQuery($sql)
    {
        $connection = mysqli_connect('localhost','root','','trangtrinoithat','3306') or
        die ("couldn't connect to localhost");
        mysqli_query($connection, "set names 'utf8'");
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        return $result;
    }
    public static function ChangeURL($url){
        echo "<script type='text/javascript'> location='$url'; </script>";
    }
}
?>

