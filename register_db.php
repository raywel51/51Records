<?php 
    session_start();
    include('connection\connect.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['pw1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['pw2']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);

            if (empty($username)) {
                array_push($errors, "Username is required");
                $_SESSION['error'] = "Username is required";
            }
            if (empty($email)) {
                array_push($errors, "Email is required");
                $_SESSION['error'] = "Email is required";
            }
            if (empty($password_1)) {
                array_push($errors, "Password is required");
                $_SESSION['error'] = "Password is required";
            }
            if ($password_1 != $password_2) {
                array_push($errors, "The two passwords do not match");
                $_SESSION['error'] = "The two passwords do not match";
            }else{
                $password=md5($password_1);
            }
        

        $user_check_query = "SELECT * FROM userlogin WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);
        
            if ($result) { // if user exists
                if ($result['username'] === $username) {
                    array_push($errors, "Username already exists");
                }
                if ($result['email'] === $email) {
                    array_push($errors, "Email already exists");
                }
            }

            if (count($errors) == 0) {


                $sql = "INSERT INTO userlogin (username, email, password , role) VALUES ('$username', '$email', '$password', 'member')";
                mysqli_query($conn, $sql);

                $_SESSION['username'] = $_POST['username'];
                $_SESSION['success'] = "You are now logged in";
                header('location: login.php');
            } else {
                header("location: register.php");
            }
    }

?>