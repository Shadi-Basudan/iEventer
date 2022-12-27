<html>

<head>
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
        function checkInfo() {
            var username = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var pw1 = document.getElementById("pw").value;
            var pw2 = document.getElementById("pw2").value;
            var pass_val = /^[A-Za-z]\w{7,14}$/;

            if (username == "" || email == "" || pw1 == "" || pw2 == "") {
                document.getElementById("checked").innerHTML = '<span style="margin: 8px 0; width: 100%; border-radius: 5px; padding: 10px 15px; text-align: center; background-color: red; color: white;font-size:20">You must filled all the fields</span><br>';
            } else {
                checkEmail();
                checkPassword();
                if (email.endsWith('@stu.kau.edu.sa') && pw1 == pw2 && pw1.length >= 8 && pw1.match(pass_val)) {
                    document.getElementById("sub").style.display = "block";
                    document.getElementById("name").style.borderColor = "black";
                    document.getElementById("email").style.borderColor = "black";
                    document.getElementById("pw").style.borderColor = "black";
                    document.getElementById("pw2").style.borderColor = "black";
                }
            }
        }

        function checkEmail() {
            var email = document.getElementById("email").value;
            if (!email.endsWith('@stu.kau.edu.sa')) {
                document.getElementById("sub").style.display = "none";
                document.getElementById("email").style.borderColor = "red";
            }
        }

        function checkPassword() {
            var pw1 = document.getElementById("pw").value;
            var pw2 = document.getElementById("pw2").value;
            var pass_val = /^[A-Za-z]\w{7,14}$/;
            if (!(pw1 == pw2 && pw1.length >= 8 && pw1.match(pass_val))) {
                document.getElementById("sub").style.display = "none";
                document.getElementById("pw").style.borderColor = "red";
                document.getElementById("pw2").style.borderColor = "red";
            }
        }
    </script>
</head>

<body>
    <header>
        <a href="#" class="logo">iEventer</a>
    </header>
    <div class="form-container">
        <form action="" method="POST" name="form" id="form">
            <div id="checked"></div>
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>
            <input name="uname" type="text" id="name" placeholder="Enter your name" required />
            <input name="email" type="email" id="email" placeholder="Enter your email" required />
            <input name="pass" type="password" id="pw" placeholder="Enter your password" required />
            <input name="cpassword" type="password" id="pw2" placeholder="Confirm your password" required />
            <input type="button" value="check info" id="checker" onclick="checkInfo()" required />
            <p>already have an account? <a href="login.php">login now</a></p>
            <hr>
            <input style="display:none" type="submit" id="sub" name="sub" class="form-btn" value="register now" />
            <div style="font-size:13px; color:darkblue">
                <ul style="text-align: left; margin-top:3px; margin-left:15px">
                    <li>Make sure to enter email ends with @stu.kau.edu.sa</li>
                    <li>Password should contain upper, lower casses, numbers and (8 characters minimum)</li>
                </ul>
            </div>
        </form>
    </div>

</body>

<?php
include 'config.php';
if (isset($_POST['sub'])) {
    $name = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $select = mysqli_query($conn, "SELECT * FROM student WHERE email = '$email' AND password = '$password'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $message[] = 'user already exist';
    } else {
        if ($password != $cpass) {
            $message[] = 'confirm password not matched!';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO student (id, name, email, password, gender, department, image) VALUES(NULL, '$name', '$email', '$password', 'NULL', 'NULL', 'NULL')") or die('query failed');



            if ($insert) {
                $message[] = 'Registered successfully!';
                header('location:login.php');
            } else {
                $message[] = 'Registered failed!';
            }
        }
    }
}
?>

</html>