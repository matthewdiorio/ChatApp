
<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location:users.php");
}

include_once "headers.php";?>

<body>
    <div class="wrapper">
        <section class="form signup">

            <img src="php/images/logo.png" alt="logo" class="logo">
            <form action="#" enctype="multipart/form-data">
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="firstName" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lastName" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Create a password" required>
                </div>
                <div class="field image">
                    <label>Profile Photo</label>
                    <input type="file" name="profilePhoto" class="profile-input" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Sign Up">
                </div>
            </form>
            <div class="link">Already signed up? <a href="login.php">Click here.</a></div>
        </section>
    </div>
    <script src="javascript/signup.js"></script>
</body>

</html>