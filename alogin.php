<?php
session_start();
include "database.php";
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
                include "sidebar.php";
                ?>
            </div>

            <div id="right">
                <h1 class="senter">Admin Login Here</h1>


                <div id="f_box">

                    <?php
                    if (isset($_POST["submit"])) {
                        // echo "<p class='error'>good<p>";
                        $sql = "SELECT * FROM `admin` WHERE ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
                        $res = $db->query($sql);
                        // print_r($res);
                        if($res->num_rows>0)
                        {
                            // echo "<p class='success'>good<p>";
                            $row=$res->fetch_assoc();      //flow    1
                            $_SESSION["AID"]=$row["AID"];  //flow    1
                            header("location:ahome.php");
                        }
                        else{
                            echo"<p class='error'>Invalid User Details<p>";
                        }
                    }
                    ?>
                    <form action="alogin.php" method="post">

                        <label for="">Name</label>
                        <input type="text" name="aname" required autocomplete="off">
                        <label for="">Password</label>
                        <input type="password" name="apass" required autocomplete="off">
                        <button type="submit" name="submit">Login now</button>
                    </form>

                    
                </div>
<div class="help" >
    <br>
                        <pre>Name        :  jagan</pre>
                        <pre>Password :  1111</pre>
                    </div>

            </div>

        </div>
        <div id="footer">
            <p>Copyright 1999-2021 by Refsnes Data. All Rights Reserved. jagan</p>
        </div>

    </div>
</body>

</html>