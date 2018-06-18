<?php
/**
 * 
 * @authors Zheng Liu (995170241@qq.com)
 * @date    2018-06-18 01:28:18
 * @version $Id$
 */

    header("Content-type:application/json;charset=utf-8");

    session_start(); 
    $name = $_SESSION["name"];

    $servername ="localhost";
    $username   ="root";
    $password   ="";
    $database   ="brc";

    $conn = mysqli_connect($servername, $username, $password);
    mysqli_query($conn, "SET NAMES UTF8");

    if (!$conn) {
        die('Could not connect: ' . mysqli_error());
    }

    mysqli_select_db($conn, $database);
    
    $sql = "select distinct `book`.*, name, image_addr, Alt from `book`, `user`
        where
        `book`.book_id not in
            (select `usercollect`.book_id from `usercollect` where `usercollect`.name = '$name')
        and type = 
            (select favourite_type from `user` where name = '$name')";

    
    $result = mysqli_query($conn, $sql);
    $books=array(); 
    $i=0;

    if($result && mysqli_num_rows($result)>0) {
        while($row = mysqli_fetch_assoc($result)) {
            $books[$i]= $row;
            $i++;
        }
        echo json_encode($books); 
    }

    else {
        echo "none";
    }

    mysqli_close($conn);
?>