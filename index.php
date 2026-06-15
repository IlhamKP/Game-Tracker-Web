<!DOCTYPE html>
<html lang="id">
    <head>
        <link rel="stylesheet" href="css/index.css">
    <title>Game Tracker</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- <div class="container"> -->
        <div class="kotak">
        <div class="form-login">
            <h1>Sign In to Your Account</h1>
            <form action="login.php" method="POST">
                <label>Username</label>
                <label class="input-login">
                    <span class="icon" for="username"><img src="./icon/proicons--person.png" alt="un"></span>
                    <input type="text" placeholder="Username" id="username" name="username">
                    <?php
                    if(isset($_GET['error']) && $_GET['error'] == 'username'){
                        echo "<p>Username tidak ditemukan</p>";
                    }
                    ?>
                </label>
                <label>Password</label>
                <label class="input-login">
                    <span class="icon"><img src="./icon/si--lock-line.png" alt="pw"></span>
                    <input type="password" placeholder="Password" id="password" name="password">
                    <?php
                    if(isset($_GET['error']) && $_GET['error'] == 'password'){
                        echo "<p>Password Salah</p>";
                    }
                    ?>
                </label>
                <a href="#" class="forgot-password" onclick="bukalp()">Forgot Password?</a>
                <button type="submit" class="btn-login">Sign In</button>
            </form>
            <div class="overlay" id="overlayy">
                <div class="popup">
                    <form action="ganti_pw.php" method="POST">
                        <h2>Ganti Password</h2>
                        <div class="keluar">
                            <a href="#" onclick="tutuplp()"><img src="icon/cross-icon.png"></a>
                        </div>
                        <label>Email</label>
                        <input type="email" class="input-lp" placeholder="Example@gmail.com" name="email_su" >
                        <label>Username</label>
                        <input type="text" class="input-lp" placeholder="Username" name="username_su">
                        <label>Password Baru</label>
                        <input type="password" class="input-lp" placeholder="Password Baru" name="password_baru_su">
                        <button type="submit" class="btn-reset">Ganti Password</button>
                    </form>
                </div>
            </div>
                <div class="create-account">
                    <p>Don't have an account? <a href="sign-up.html">Sign Up</a></p>
                </div>
        </div>
        <div class="kotak-login">
            <img src="./background/pombensin-kecil.gif" alt="hujan">
        </div>
    </div>
    <script>
        function bukalp() {
            document.getElementById("overlayy").style.display = "flex";
        }
        function tutuplp(){
            document.getElementById("overlayy").style.display = "none";
        }
    </script>
</body>
</html>