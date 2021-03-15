<?php 
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location:users.php");
}

include_once "headers.php"; ?>

<body>
<div class="wrapper">
    <section class="form signIn">
    <img src="php/images/logo.png" alt="logo" class="logo">
        <form action="#">
            <div class="error-text">This is an error message !</div>
            <div class="field input">
                <label>Email Address</label>
                <input type="text" name="email" placeholder="Enter your email">
            </div>
            <div class="field input">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password">
            </div>
            <div class="field button">
                <input type="submit" value="Sign In">
            </div>
        </form>
        <div class="link">Don't have an account? <a href="index.php">Sign up.</a></div>
    </section>
</div>

<script src="javascript/login.js"></script>
</body>
</html>