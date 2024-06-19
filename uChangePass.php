<?php
// series flow php
// session_start();
// include "database.php";         //connect db


// if (!isset($_SESSION["AID"]))         //flow  2  check
// {
//     header("location:alogin.php");
// }
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
                <h1 class="senter">Change Password</h1>


                <div id="f_box">
                    <?php
                    if (isset($_POST["submit"])) 
                    {
                        $sql ="SELECT * from admin WHERE APASS ='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";

                        $res =$db->query($sql);
                        if ($res->num_rows>0) 
                        {
                            $s ="UPDATE admin set APASS ='{$_POST["npass"]}' WHERE AID=".$_SESSION["AID"];
                            $db->query($s);
                            echo "<p class='success'>Password Change Success</p>";
                        }
                        else
                        {
                            echo "<p class='error'>Invalid Password </p>";
                        }
                    }

                    ?>
                    <form action="" method="post">

                        <label for="">Old Password</label>
                        <input type="password" name="opass" required autocomplete="off">
                        <label for="">New Password</label>
                        <input type="password" name="npass" required autocomplete="off">
                        <button type="submit" name="submit">Update Password</button>
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