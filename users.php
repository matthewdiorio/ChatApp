<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
?>
<?php include_once "headers.php";?>

<body>
<div class="wrapper">
    <section class="users">
     <header>
         <?php
include_once "php/config.php";
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}
?>
     

         <div class="content">
            <img src="php/images/<?php echo $row['profilePhoto'] ?>" alt="">
            <div class="details">
                <span>Messages</span>     
            </div>
         </div>
         <a href="php/logout.php" class="logout">Logout</a>
     </header>
     <div class="search">
        <input type="text" placeholder="Search for user">
        <button><i class="fas fa-search"></i></button>
     </div>

    <div class="user-list">

    </div>


    </section>
</div>

<script src="javascript/users.js"></script>
</body>
</html>