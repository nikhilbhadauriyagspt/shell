<?php
// Admin login handler
session_start();
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($username == 'admin' && $password == 'password') {
    $_SESSION['logged_in'] = true;
    header('Location: index.php');
  } else {
    echo 'Invalid credentials';
  }
}
?>