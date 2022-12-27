<?php
session_start();
?>
<html>

<head>
    <title>Sign in</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <a href="#" class="logo">iEventer</a>
    </header>
    <div class="form-container">
        <form method="post">
            <input name="email" type="text" placeholder="Enter your email">
            <input name="pass" type="password" placeholder="Enter your password" />
            <input name="sub" type='submit' class="form-btn" value='Log in'></input>
            <p>Don't have an account? <a href="signup.php">register now</a></p>
        </form>
    </div>

    <?php
    include 'config.php';

    if (isset($_POST['sub'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $_SESSION['student'] = $email;
        $sql = "SELECT * FROM student";
        $loop = mysqli_query($conn, $sql);
        $check = false;
        while ($row = mysqli_fetch_array($loop)) {
            if ($row['email'] == $email && $row['password'] == $pass) {
                $check = true;
                $_SESSION['name'] =$row['name'];
                break;
            }
        }
        if ($check == true) {
            header('Location:iEventer.php');
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