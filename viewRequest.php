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
                <h1 class="senter">View Request Details</h1>


                <div id="f_box">
                    <?php
                        $sql="SELECT student.NAME,request.MES,request.logs FROM 
                        student inner join request on student.id=request.id ";
                        $res=$db->query($sql);
                        if($res->num_rows>0)
                        {
                            // print_r($res);
                            echo "
                            <table>
                            <tr>
                            <th>SNO</th>
                            <th>NAME</th>
                            <th>MESSAGE</th>
                            <th>DATE</th>
                            </tr>";
                            
                            $i=0;
                            while($row=$res->fetch_assoc())
                            {
                                $i++;
                                echo "<tr>";
                                echo "<td>{$i}</td>";
                                echo "<td>{$row["NAME"]}</td>";
                                echo "<td>{$row["MES"]}</td>";
                                echo "<td>{$row["logs"]}</td>";
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