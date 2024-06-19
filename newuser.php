<?php
include "database.php";         //connect db

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
                <h1 class="senter">New User Registation</h1>


                <div id="f_box">
                     <?php
                    if (isset($_POST["submit"])) 
                    {
                        
                            $sql="INSERT INTO student(NAME,PASS,MAIL,DEP) VALUES 
                            ('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}'
                            ,'{$_POST["dep"]}')";
                            $db->query($sql);
                            // print_r($db);
                            echo "<p class='success'>User Registation Success</p>";
                       
                    }

                    ?> 
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" >

                        <label for="">Name</label>
                        <input type="text" name="name" required autocomplete="off">
                        <label for="">Password</label>
                        <input type="password" name="pass" required autocomplete="off">
                        <label for="">Email Id</label>
                        <input type="email" name="mail" id="" required>
                        <label for="">Select Department</label>
                        <select  name="dep" required id="">
                                 <option value="">Select</option>
                                 <option value="BE EEE">BE EEE</option>
                                 <option value="BE MEC">BE MEC</option>
                                 <option value="BE ECE">BE ECE</option>
                                 <option value="ME">ME</option>
                                 <option value="MBA">MBA</option>
                                 <option value="BSC">BSC</option>
                                 <option value="B.SC B">B.SC B</option>

                        </select>
                        <button type="submit" name="submit">Register Now</button>
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