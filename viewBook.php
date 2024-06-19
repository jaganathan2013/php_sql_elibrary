<?php
// series flow php
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
                <h1 class="senter">View Book Details</h1>


                <div id="f_box">
                    <?php
                        $sql="SELECT * FROM book ";
                        $res=$db->query($sql);
                        if($res->num_rows>0)
                        {
                            // print_r($res);
                            echo "
                            <table>
                            <tr>
                            <th>SNO</th>
                            <th>BOOK NAME</th>
                            <th>KEYWORDS</th>
                            <th>VIEW</th>
                            </tr>";
                            
                            $i=0;
                            while($row=$res->fetch_assoc())
                            {
                                $i++;
                                echo "<tr>";
                                echo "<td>{$i}</td>";
                                echo "<td>{$row["BTITLE"]}</td>";
                                echo "<td>{$row["KEYWORDS"]}</td>";
                                
                                echo "<td><a href='{$row["FILE"]}'>view</a></td>";
                                echo "</tr>";
                            }
                          echo  "</table>";
                          
                        }else{
                            echo "<p class='error'>No Student Records Found</p>";
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