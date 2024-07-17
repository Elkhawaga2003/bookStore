<?php  
session_start();

# If the admin is logged in
if (!isset($_SESSION['user_id']) &&
    !isset($_SESSION['user_email'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookStore</title>
    <link rel="stylesheet" href="sgsty.css">
</head>

<body>
    <form method="post" action="php/auth.php">
        <div class="ms"></div>
        <div>
            <label for="em">Email</label>
            <input type="email" placeholder="enter your email" name="email" id="em" onclick="checkemail()">
        </div>
        <div>
            <label for="pa">password</label>
            <input type="password" id="pa" placeholder="enter your password" name="password"onclick="checkpassword()">
        </div>
        <div>
            <input type="submit" id="sub" value="Go">
        </div>
    </form>
    <script >
        let msg = document.querySelector('.ms');
          msg.innerHTML = '<?php echo $_GET['error'];?>';
        setTimeout(() => msg.innerHTML = '', 5000);
        
    </script>
</body>
<script src="log.js"></script>
</html>
<?php }else{
  header("Location: admin.php");
  exit;
} ?>