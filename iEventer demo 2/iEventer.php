﻿<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>iEventer</title>
</head>

<body>
    <header>
        <a href="#" class="logo">iEventer</a>
        <h3 style=:margin-right:-20px; href="#">Logged in as:<?php echo $_SESSION['user']; ?></h3>
        <nav class="navigation">
            <a href="#events">Events</a>
            <a href="#forums">Forums</a>
            <a href="meetingPage.php">Meetings</a>
        </nav>
    </header>

    <section class="main">
        <div>
            <h2>Hello,<?php echo $_SESSION['user']; ?> <br><span>Greatest<br>Platform</span></h2>
            <h3>I am a platform that was developed for the students.</h3>
        </div>
    </section>

    <section class="eventClass" id="events">
        <div>
            <h2><span>Events</span></h2>
            <h3>You can explore all the activities.</h3>
            <a target="_blank" href="eventPage.html" class="event_btn">Go to events</a>
        </div>
    </section>

    <section class="forumClass" id="forums">
        <div>
            <h2><span>Forums</span></h2>
            <h3>You can discuss his subjects<br>the other colleges.</h3>
            <a target="_blank" href="forumPage.html" class="forum_btn">Go to forums</a>
        </div>
    </section>

    <section class="meetingClass" id="meetings">
        <div>
            <h2><span>Meetings</span></h2>
            <h3>You can can explore the meetings<br>that holding or will be hold.</h3>
            <a target="_blank" href="meetingPage.html" class="meeting_btn">Go to meetings</a>
        </div>
    </section>

    <footer class="footer">
        <p class="footer-title"><span>Copyrights @ </span>Mohammed Aljabarti and Shadi Basudan</p>
    </footer>
</body>

</html>