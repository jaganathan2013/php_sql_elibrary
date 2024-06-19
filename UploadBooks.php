<?php
// series flow php  variable data get 
session_start();
include "database.php";         //connect db


if (!isset($_SESSION["AID"]))         //flow  2  check
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
                <h1 class="senter">Update Book</h1>


                <div id="f_box">
                     <?php
                    if (isset($_POST["submit"])) 
                    {
                        $target_dir="upload/";
                        $target_file=$target_dir.basename($_FILES["efile"]["name"]);
                        if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file))
                        {
                            $sql="INSERT INTO book(BTITLE,KEYWORDS,FILE) VALUES 
                            ('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
                            $db->query($sql);
                            // print_r($db);
                            echo "<p class='success'>Book Upload Success</p>";
                        }
                        else{
                            echo "<p class='error'>Error In Book Upload</p>";
                        }
                    }

                    ?> 
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">

                        <label for="">Book Title</label>
                        <input type="text" name="bname" required autocomplete="off">
                        <label for="">Keyword</label>
                        <textarea name="keys" required></textarea>
                        <label for="">Upload File</label>
                        <input type="file" name="efile" required autocomplete="off">
                        <button type="submit" name="submit">Update Book</button>
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