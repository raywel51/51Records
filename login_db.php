<?php 
    session_start();
    include('connection\connect.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $query = "SELECT * FROM userlogin WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
                $userlevel=$row['role'];
            }

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['userlevel']=$userlevel;
                $_SESSION['success'] = "Your are now logged in";
                header("location: index");
            } else {
                array_push($errors, "Wrong Username or Password");
                $_SESSION['error'] = "Wrong Username or Password!";
                header("location: login");
            }
        } else {
            array_push($errors, "Username & Password is required");
            $_SESSION['error'] = "Username & Password is required";
            header("location: login");
        }
    }

?>
