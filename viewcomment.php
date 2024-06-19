<?php
// series flow php
session_start();
include "database.php";         //connect db


if (!isset($_SESSION["ID"]))         //flow  2  check
{
    header("location:userlogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css\style.css">
    <title>Document</title>
</head>

<body>


    <div id="container">
        <div id="header">
            <h1>Jagan E-library</h1>
        </div>
        <div id="content">
            <div id="left">
                <?php
                include "usersidebar.php";
                ?>
            </div>

            <div id="right">
                <h1 class="senter">Sent Your Books Comments</h1>


                <div id="f_box">

                    <?php
                    $sql = "SELECT * from BOOK where BID=" . 1;
                    //   echo($sql);
                    $res = $db->query($sql);
                    //   print_r($res);
                    if ($res->num_rows > 0) {
                        echo "<table>";
                        $row = $res->fetch_assoc();
                        echo "<tr>
                       <th>Book Name</th>
                       <td>{$row["BTITLE"]}</td>
                       </tr>
                       <tr>
                       <th>Keywords</th>
                       <td>{$row["KEYWORDS"]}</td>
                       </tr>
                       ";
                        echo "</table>";
                    } else {
                        echo "<p class='error'>No Books Foynd</p>";
                    }





                    ?>
                  


                    <?php
                    $sq = "SELECT student.NAME, comment.COMM, comment.LOGS FROM COMMENT INNER JOIN 
                         student on comment.SID =student.ID WHERE comment.BID=1
                                   ORDER BY comment.CID DESC ";
                    //    echo($sql);
                    $re = $db->query($sq);
                    //    print_r($re);
                    if ($re->num_rows > 0) {
                        while ($row = $re->fetch_assoc()) {
                            echo "<br/>
                            <p>
                                  <strong>{$row["NAME"]}</strong>
                                  {$row["COMM"]}
                                  <i>{$row["LOGS"]}</i>
                                 </p>";
                        }
                    } else {
                        echo '<p class="error">No Comment Yet...</p>';
                    }



                    if (isset($_POST["submit"])) {

                            $myid=$_GET["id"];
                             $myid2=$_SESSION["ID"];
                            $mypost=$_POST["mes"];
                        //    $time=date("Y-m-d h:i:s") ;
                        //  echo $myid,$myid2,$mypost,$time;    
                        $s="  INSERT INTO `comment`( `BID`, `SID`, `COMM`, `LOGS`) VALUES 
                        ('$myid','$myid2','$mypost',now())";
                        //  echo ($s);
                      $rs=  $db->query($s);
                    //   print_r($re);
                        
                        
                        


                        // echo $s= "insert INTO comment (BID, SID, COMM, LOGS) 
                        //   VALUES ({$_GET["id"]},{$_SESSION["ID"]},{$_POST["mes"]},now())";
                        // echo ($s);
                        // $db->query($s);
                        echo "<p class='success'>Comment Posted</p><br>";
                        echo ($s);
                    }

                    ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <p>Copyright 1999-2021 by Refsnes Data. All Rights Reserved. jagan</p>
        </div>

    </div>
</body>

</html>