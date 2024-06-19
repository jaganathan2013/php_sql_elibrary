<?php
// series flow php
session_start();
include "database.php";         //connect db
function countRecord($sql,$db)     //giv sql query  take db datas
{
    $result=$db->query($sql);
    return $result->num_rows;        //retun all details
}

if(!isset($_SESSION["AID"]))         //flow  2  check
{
    header("location:alogin.php");
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
                include "adminsidbar.php";
                ?>
            </div>

            <div id="right">
                <h1 class="senter">Welcome Admin</h1>


                <div id="f_box">
                    <ul>
                        <li>Total Student :<?php echo countRecord("SELECT * FROM `student`",$db);?></li>
                        <li>Total Books :<?php echo countRecord("SELECT * FROM `book`",$db);?></li>
                        <li>Total Request :<?php echo countRecord("SELECT * FROM `request`",$db);?></li>
                        <li>Total Comments :<?php echo countRecord("SELECT * FROM `comment`",$db);?></li>
                    </ul>


                </div>


            </div>

        </div>
        <div id="footer">
            <p>Copyright 1999-2021 by Refsnes Data. All Rights Reserved. jagan</p>
        </div>

    </div>
</body>

</html>