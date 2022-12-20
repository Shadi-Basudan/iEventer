<?php
session_start()
?>

<html>

<head>
    <title> Sign in</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #form_div {
            position: absolute;
            margin-top: 320px;
            margin-left: 550px;
            margin-bottom: 10px;
            border: 0px;
            width: 400px;
            height: 150px;
            box-shadow: 0 0 20px 0 rgb(104, 34, 34);
            width: 600px;
            height: 350px;
            border-radius: 5px;
            font-size: 25px;
        }
    </style>
</head>

<body style="background-color:rgb(255, 255 255);">
    <header>
        <a href="#" class="logo">iEventer</a>
    </header>

    <form method="post" style="" id="form_div">
        <label>Username</label>
        <input name="name" type="text" />
        <br />
        <br />
        <label>Password</label>
        <input name="pass" type="password" />
        <br />
        <br />
        <input type='submit' value='Log in' name="sub" style="margin-left:200px;"></input>
        <a style="font-size:14px;" href="signup.php"> Don't have an account? sign-up now!"</a>
    </form>
    <?php

    $conn = mysqli_connect('localhost', 'root', '', 'ieventer');
    if ($conn) {
        echo "Connection sucsessful";
    } else {
        echo "error";
    }

    if (isset($_POST['sub'])) {
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $_SESSION['user'] = $name;
        $sql = "SELECT * FROM users";
        $loop = mysqli_query($conn, $sql);
        $check = false;
        while ($row = mysqli_fetch_array($loop)) {
            if ($row['Username'] == $name && $row['Password'] == $pass) {
                $check = true;
                break;
            }
        }

        if ($check == true) {
            header('Location:iEventer.php ');
        }

        if ($check == false) {
            echo "<script>  
alert('Username or password is incorrect')
</script>";
        }
    }
    ?>
</body>

</html>