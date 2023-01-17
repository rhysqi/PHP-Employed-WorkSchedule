<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Absensi</title>
</head>
<?php
    require 'config.php';
?>
<body>
<center>
    <form method="POST">
        <div>
            <h1 style="color: white;">ABSENSI KARYAWAN</h1>
        </div>
        <div class="base">
            <div class="formbase">
                
                <label style="color: white;">USER ID</label>
                <input type="text" name="username" class="user" style="color: white; text-align: center;">

                <label style="color: white;">PIN</label>
                <input type="password" name="password" class="pin" style="color: white; text-align: center;">
            </div>
        </div>
        <div>
            <button name="login" class="btn-1">SIGN IN</button>
            <button name="logout" class="btn-1">SIGN OUT</button>
        </div>
    </form>
        <button id="Reset" class="btn-1" onclick="ResetFunc()">CLEAR</button>
    </center>

    <?php
    date_default_timezone_set("Asia/Jakarta");
    $currentDateTime = date('Y-m-d H:i:s');
        //check if the login button is clicked
    if(isset($_POST['login'])){
        //get the data from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        //query to check if the data exists in the table
        $query = "SELECT * FROM Daftar WHERE ID ='$username' AND PIN ='$password'";
        $result = mysqli_query($conn, $query);

        $txt = $username . ":" . $currentDateTime . '| Sign In' . PHP_EOL;
        $file = "attend.txt";
        file_put_contents($file, $txt, FILE_APPEND);
        //check if the query returns any rows
        if(mysqli_num_rows($result) > 0){
            //login success
            //redirect to the appropriate page
            header("Location: #");
            

        } else {
            //login failed
            echo "Invalid username or password";
        }

        
    }
    if(isset($_POST['logout'])){
        //get the data from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        //query to check if the data exists in the table
        $query = "SELECT * FROM Daftar WHERE ID ='$username' AND PIN ='$password'";
        $result = mysqli_query($conn, $query);

        //check if the query returns any rows
        if(mysqli_num_rows($result) > 0){
            //login success
            //redirect to the appropriate page
            header("Location: #");
            $txt = $username . ":" . $currentDateTime . '| Sign Out' . PHP_EOL;
            $file = "attend.txt";
            file_put_contents($file, $txt, FILE_APPEND);
            
            
        } else {
            //login failed
            echo "Invalid username or password";
        }

        
    }
    ?>

</body>
</html>