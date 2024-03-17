<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.cdnfonts.com/css/wanderlust" rel="stylesheet">
</head>
<body>
    <main>
        <div id="image"><h1>Welcome to Alaska</h1><img src="assets/orange.jpg" alt="a view on a road in alaska with an orange sky. Probably during a sundown"></div>
        <div id="form_field">
            <h1>Login</h1>
            <?php if ($is_invalid): ?>
            <em>Invalid login</em>
            <?php endif; ?>
            <form method="post">
                <label for="email"></label>
                <div class="input-div"><img src="assets/email-icon.svg" alt=""><input type="email" name="email" id="email" placeholder="Email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"></div>
                <label for="password"></label>
                <div class="input-div"><img src="assets/password-icon.svg" alt=""><input type="password" name="password" id="password" placeholder="Password"></div>
                <button id="login_button">Log in</button>
            </form>
        </div>
    </main>
</body>
</html>