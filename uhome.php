<?php
// series flow php
session_start();
include "database.php";         //connect db

if(!isset($_SESSION["ID"]))         //flow  2  check
{
    header("location:ulogin.php");
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
                <h1 class="senter">Welcome <?php echo $_SESSION["NAME"] ?></h1>


                <div id="f_box">
                <h1>What is E-Library Or Digital Library And Its Purpose?</h1>
                <br>
An e-library or digital library is a collection of digital resources that are accessible to users via the internet. These resources can include books, articles, journals, research papers, multimedia materials, and other types of content. The purpose of an e-library is to provide users, including students looking for the best primary school, with easy and convenient access to a vast array of information from anywhere and at any time. E-libraries also provide benefits such as cost-effectiveness, space-saving, and the ability to search and retrieve information quickly and efficiently. They are particularly useful for students, researchers, and professionals who need access to up-to-date information and resources for their work.


                </div>


            </div>

        </div>
        <div id="footer">
            <p>Copyright 1999-2021 by Refsnes Data. All Rights Reserved. jagan</p>
        </div>

    </div>
</body>

</html>