
<!DOCTYPE html>
<html>
<head>
	<title> YOUR RESULT</title>
	<link rel="stylesheet" a href="styleresult.css">
	
</head>
        
<body>
    <center>
        
        <div class="txt"><br><h1>RESULT MANAGEMENT</h1></div>
        
            <div class="content">
                <div class="padding" style="padding: 10px; line-height: 37px;">
                <img src="harry-styles-haircut-short-messy-spiky.jpg" height="75px" width="75px" style="float:right" alt="">
                <!--<table class="tb2">
                <tr>
                    <th>Reg_N0</th> 
                    <th>NAME</th> 
                    <th>MA891</th>
                    <th>CS8491</th>
                    <th>CS8492</th> 
                    <th>CS8451</th> 
                    <th>CS8493</th> 
                    <th>GE8261</th> 
                </tr>-->

         <?php       
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);//one time only show to display a message
            }
            if(isset($_SESSION['invalid_login']))
            {
                echo $_SESSION['invalid_login'];
                unset($_SESSION['invalid_login']);//one time only show to display a message
            }
            ?>

                
        <?php
                    
                    $link = mysqli_connect('localhost','root','','test');
                    if(!$link){
                        die('connection error'.mysqli_connect_error());
                    }

                    if(isset($_POST["regno"],$_POST["pass"]))
                    {
                        $regno = $_POST['regno'];
                        $pass = $_POST['pass'];
                $sql="SELECT * FROM demo WHERE regno='$regno' AND pass='$pass'";
                $res=mysqli_query($link,$sql);
                if($res==true)
                {
                    $count=mysqli_num_rows($res);
                    if($count>0)
                
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $regno=$rows['regno'];
                            $name=$rows['name'];
                            $ma8391=$rows['MA8391'];
                            $cs8491=$rows['CS8491'];
                            $cs8492=$rows['CS8492'];
                            $cs8451=$rows['CS8451'];
                            $cs8493=$rows['CS8493'];
                            $ge8291=$rows['GE8291'];
                            echo "<div style='text-align:left'> REGISTER NUMBER :". $regno. " <br> ". "NAME :".$name . "<br>  </div>" ." <br> ". "MA8391 :".$ma8391 . "<br>" . "CS8491 :".$cs8491 . "<br>" . "CS8492 :".$cs8492 . "<br>". "CS8451 :".$cs8451 . "<br>". "CS8493 :" .$cs8493 . "<br>". "GE8261 :" .$ge8291 . "<br>";
                            
                            
                        }
                    }
                }
                
                else{
                            echo "<center>No Data found</center>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div><br><br>
        <a href="smstest.php">
         <input type="submit" name="send" value="SEND" class="btn-send"/><br><br>
         </a>
                    <a href = "index.php" >Goto</a>
                </center>
    </body>
</html>