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
                <h1 class="senter">New Book Request</h1>


                <div id="f_box">
                    <?php
                    if (isset($_POST["submit"])) 
                    {
                        $sql ="insert into request (ID,MES,LOGS) values (
                        {$_SESSION["ID"]},'{$_POST["mess"]}',now())";
                       $db->query($sql);
                       echo "<p class='success'>Request Sent Admin</p>";
                    }

                    ?>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                        <label for="">Message</label>
                       <textarea name="mess" required></textarea>
                        <button type="submit" name="submit">Send Message</button>
                    </form>


                </div>


            </div>

        </div>
        <div id="footer">
            <p>Copyright 1999-2021 by Refsnes Data. All Rights Reserved. jagan</p>
        </div>

    </div>
</body>

</html>