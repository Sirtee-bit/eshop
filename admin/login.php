<h1>Admin Login</h1>
<form action="backend.php" method="POST">
    <?php
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        if ($error == "invalid_username") {
            echo "<div style='background:red;color:white;padding:10px;border-radius:5px;'>Username does not exist</div>";
        }else if ($error == "invalid_password") {
            echo "<div style='background:red;color:white;padding:10px;border-radius:5px;'>Wrong Password</div>";
        }
    }
        
    ?>
    <br>
    <input type="text" placeholder="username" name="username"> <br>
    <input type="password" placeholder="password" name="password"> <br>
    <button>Login</button>
<form>