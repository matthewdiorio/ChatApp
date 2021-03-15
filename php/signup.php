<?php   
error_reporting(E_ALL);
ini_set('display_errors', 1);
    session_start();
    include_once "config.php";
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $passwordHash = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));

   // $profilePhoto = mysqli_real_escape_string($conn, $_POST['profilePhoto']);
   if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password)){
       
       if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
       
      if(mysqli_num_rows($sql) > 0){
            echo "$email already exists.";
        } else {
           if(isset($_FILES['profilePhoto'])){
                $img_name = $_FILES['profilePhoto']['name'];
                $img_type = $_FILES['profilePhoto']['type'];
                $temp_name = $_FILES['profilePhoto']['tmp_name'];
                $img_explode = explode('.', $img_name);
                $img_extension = end($img_explode);
                $extensions = ['png', 'jpeg', 'jpg'];
           
                if(in_array($img_extension, $extensions) == true){
                    $status = "Active";
                    $img_name = time().$img_name;
                    if(move_uploaded_file($temp_name, 'images/'.$img_name)){
              
                        $id = rand(time(), 10000000);

                        $sqlInsert = mysqli_query($conn, "INSERT INTO users (unique_id, firstName, lastName, email, password, profilePhoto, status)
                            VALUES ({$id}, '{$firstName}', '{$lastName}', '{$email}', '{$passwordHash}', '{$img_name}', '{$status}')");
                        if($sqlInsert){
                            $sqlGetEmail = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if(mysqli_num_rows($sqlGetEmail) > 0){
                                $row = mysqli_fetch_assoc($sqlGetEmail);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                $status = "Active";
                                $updateStatusQuery = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                                if ($updateStatusQuery) {
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }
                        } else {
                            echo "Something went wrong!";
                        }
                      }
                } else {
                    echo 'Please select a jpg, jpeg, or png.';
              }
           } else {
                echo "Please select an image.";
            }
        }
    } else {
           echo "$email is not a valid email.";
       }
   } else {
       echo 'All fields are required!';
   }
?>