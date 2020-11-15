<?php
    include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="rama main.css">
        
        <title>Register</title>
        <style>
        .success{
            background:green;
            color:white;
            line-height:30px;
            border-radius:5px;
            height:auto;
            
            text-align:center;
            margin-bottom:10px;
            
            }
            .error{
            background:#ff1515;
            color:white;
            line-height:30px;
            border-radius:5px;
            height:auto;
            
            
            text-align:center;
            margin-bottom:10px;
            }
    </style>
    </head>

 <body>
 
    <div id="img1">

    <?php
                    if(isset($_POST["reg"])){
                        // Given password
                        $password = $_POST["password1"];

                        // Validate password strength
                        $uppercase = preg_match('@[A-Z]@', $password);
                        $lowercase = preg_match('@[a-z]@', $password);
                        $number    = preg_match('@[0-9]@', $password);
                        $specialChars = preg_match('@[^\w]@', $password);

                            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                                echo "<div class='error'>NOTE: Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</div>";
                            }
                            else{
                                $sql = "insert into table2(name,email,collegename,contact,topic,password) values('{$_POST["fullname"]}','{$_POST["E-mail"]}','{$_POST["collegename"]}','{$_POST["contact"]}','{$_POST["topic"]}','{$password}')";
                                if($db -> query($sql)){
                                echo "<div class='success'>Employee Details Added Successfully </div>";
                                }
                                else{
                                    echo "<div class='error'>NOTE: UserName Already Exist !!! Re Try again with Different UserName</div>";
                                }
                            }
                        
                    }
                ?>
    <form action="register1.php" method="post"> 
        <p id="centre"><br><br><br><br><br><br>
    
     <label id="size"><b>Name:</b></label> 
    <input id="size1" type="text" name="fullname" placeholder="Enter your name" required=""><br><br>
     <label id="size"><b>E-mail id:</b></label>
     <input id="size1"  type="email" name="E-mail"  placeholder="Enter your email" required=""><br><br>
     <label id="size"><b>college:</b></label>
     <input id="size1" type="text" name="collegename" placeholder="Enter your college name" required=""><br><br>
     <br><br>

<label id="size"><b>contact:</b></label>
<input id="size1" id="color" type="number" name="contact" placeholder="Enter your phone.no" required><br><br>
<label id="size"><b>topic:</b></label>
<input id="size1" id="color" type="text" name="topic" placeholder="Enter your choosen topic" required><br><br>
<label id="size">Password:</label>
<input id="size1" id="color" name="password1"   type="password" placeholder="Enter your Password" required> <br>
    <br><br><br></p>

    <center><button type="submit" name="reg">Register</button></center>
    

 </form>

 <center><p>Already Registered??</p><button><a href="login.php">Login Here</a></button></center>
</div>



 <br>
<br>


    
</body>
</html>