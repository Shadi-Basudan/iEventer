<html>

<head>
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function tips(num) {
            if (num == 1) {
                document.getElementById("tips_section").innerHTML = "Tip:User name should be in English and contain upper and lower cases.";
            }

            if (num == 2) {
                document.getElementById("tips_section").innerHTML = "Tip:Make sure to Enter email correctly, you will receive emails from the platrofm based on this email.";
            }

            if (num == 3) {
                document.getElementById("tips_section").innerHTML = "Password should contain upper and lower casses and numbers and (8 characters minimum).";

            }
        }


        function checkpassword() {
            var pass_val = /^[A-Za-z]\w{7,14}$/;
            var pw1 = document.getElementById("pw").value;
            var pw2 = document.getElementById("pw2").value;
            var username = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            if (pw1 != "" && pw2 != "" && username != "" && email != "" && pw1.length >= 8 && pw1.match(pass_val)) {
                if (pw1 == pw2) {
                    document.getElementById("checked").src = "check.jpg";
                    document.getElementById("checked").width = 30;
                    document.getElementById("checked").height = 30;
                    document.getElementById("checked_sec").src = "check.jpg";
                    document.getElementById("checked_sec").width = 30;
                    document.getElementById("checked_sec").height = 30;
                    document.getElementById("sub").style.display = "block";
                }
            } else {
                document.getElementById("sub").style.display = "none";
                document.getElementById("checked").src = "wrong.jpg";
                document.getElementById("checked").width = 30;
                document.getElementById("checked").height = 30;
                document.getElementById("checked_sec").src = "wrong.jpg";
                document.getElementById("checked_sec").width = 30;
                document.getElementById("checked_sec").height = 30;
            }
        }
    </script>

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
<?php
$conn = mysqli_connect('localhost', 'root', '', 'ieventer');
if ($conn) {
    echo "Connection sucsessful";
} else {
    echo "error";
}

if (isset($_POST['sub'])) {
    $name = $_POST['uname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sql = "INSERT INTO users(username,email,Password) VALUES ('$name','$email','$password');";
    mysqli_query($conn, $sql);
}
?>

<body style="background-color:rgb(255, 255 255);">
    <header>
        <a href="#" class="logo">iEventer</a>
    </header>

    <div id="form_div">
        <form name="form" method="POST">
            <label>Username:</label>
            <input type="text" id="name" name="uname" onfocus="tips(1)" required />
            <br />
            <label>Email:</label>
            <input type="email" id="email" name="email" onfocus="tips(2)" required />
            <br />
            <label>Password:</label>
            <input type="password" id="pw" name="password" onfocus="tips(3)" required />
            <img id="checked"/>
            <br />
            <label>Confirm Password:</label>
            <input type="password" id="pw2" name="pw2" required />
            <img id="checked_sec" />
            <input type="button" value="check info" id="checker" onclick="checkpassword()" required />
            <br />
            <br />
            <br />
            <a style="font-size:14px;" href="login.php">Have an account already?Sign in </a>
            <hr>
            <input style="display:none" type="submit" id="sub" name="sub" value="Submit" required />
            <br />
            <div style="font-size:20px; color:darkblue" id="tips_section"></div>
        </form>
    </div>
</body>
</html>