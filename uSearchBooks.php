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
                <h1 class="senter">Search Books</h1>


                <div id="f_box">

                    <?php
                    if (isset($_POST["submit"])) {
                        $sql = "SELECT * FROM book where btitle like 
                        '%{$_POST["name"]}%' or keywords like '%{$_POST["name"]}%'";
                        $res = $db->query($sql);
                        if ($res->num_rows > 0) {
                            // print_r($res);
                            echo "
                            <table>
                            <tr>
                            <th>SNO</th>
                            <th>BOOK NAME</th>
                            <th>KEYWORDS</th>
                            <th>VIEW</th>
                            <th>COMMENT</th>
                            </tr>";

                            $i = 0;
                            while ($row = $res->fetch_assoc()) {
                                $i++;
                                echo "<tr>";
                                echo "<td>{$i}</td>";
                                echo "<td>{$row["BTITLE"]}</td>";
                                echo "<td>{$row["KEYWORDS"]}</td>";
                                echo "<td><a href='{$row["FILE"]}' target='_blank'>view</a></td>";
                                echo "<td><a href='comment.php?id={$row["BID"]}'>GO</td>";
                                echo "</tr>";
                            }
                            echo  "</table>";
                        } else {
                            echo "<p class='error'>No Book Records Found</p>";
                        }
                    }
                    ?>


<br>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                        <label for="">Enter Book Name Or Keywords</label>
                        <input type="text" name="name" required></input>
                        <button type="submit" name="submit">Search Now</button>
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