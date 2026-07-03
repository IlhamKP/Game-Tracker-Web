<link rel="stylesheet" href="css/sign-up.css">
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Game Tracker</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="kotak">
        <div class="form-sign-in">
            <h1>Create Your Account</h1>
            <form action="register.php" method="POST">
                <label>Email</label>
                <label class="input-sign-in">
                <span class="icon"><img src="./icon/email.png" alt="un"></span>
                <input type="email" placeholder="Example@gmail.com" id="email" name="email_su" required>
                </label>
                <label>Username</label>
                <label class="input-sign-in">
                <span class="icon"><img src="./icon/proicons--person.png" alt="un"></span>
                <input type="text" placeholder="Username" id="username" name="username_su" required>
                </label>
                <label>Password</label>
                <label class="input-sign-in">
                <span class="icon"><img src="./icon/si--lock-line.png" alt="pw"></span>
                <input type="password" placeholder="Password" id="password" name="password_su" required>
                </label>
                <button type="submit" class="btn-sign-in" value="register">Sign Up</button>
                <div class="already">
                    <p>Already have an account? <a href="index.php">Sign In</a></p>
                </div>
            </form>
        </div>
        <div class="kotak-sign-in">
            <img src="./background/pombensin-kecil.gif" alt="hujan">
        </div>
    </div>
</body>
</html>