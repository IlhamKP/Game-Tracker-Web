<link href="css/dashboard.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Game Tracker</title>
    <img src="">
</head>
    <?php
    include 'koneksi.php';
    session_start();
    
    if(!isset($_SESSION['id_users'])){
    header("Location: index.php");
    exit;
    }
    $id_users = $_SESSION['id_users'];
    $query = mysqli_query($conn,"SELECT foto_profile FROM users WHERE id_users = '$id_users'");
    $profile = mysqli_fetch_assoc($query);
    $qusername = mysqli_query($conn, "SELECT username FROM users WHERE id_users = '$id_users'");
    $username = mysqli_fetch_assoc($qusername);
    $result = mysqli_query($conn, "SELECT * FROM library WHERE id_users = '$id_users'");
        ?>
<body>
    <div class="header">
        <h1>Game<br>Tracker</h1>
        <div class="menu">
            <a href="dashboard.php">Dashboard</a>
            <a href="library.php">Library</a>
            <a href="wishlist.php">Wishlist</a>
        </div>
    
        <label class="profile"><span><?php echo $username['username'];?></span><img src="foto_profile/<?php echo $profile['foto_profile'];?>" alt="profile" onclick="profile()"></label>
        <div class="box" id="box-option">
            <a href="#" class="option"><img src="icon/person-profile.png">Profile</a>
            <a href="index.php" class="option"><img src="icon/logout-profile.png">Sign Out</a>
        </div>
    </div>
    <div class="dashboard">
        <div class="statistik">
            <div class="jumlah">
                <h3>Total Game</h3>
                <span>3</span>
            </div>
            <div class="jumlah">
                <h3>Belum dimainkan</h3>
                <span>2</span>
            </div>
            <div class="jumlah">
                <h3>Tamat</h3>
                <span>2</span>
            </div>
            <div class="jumlah">
                <h3>Sedang dimainkan</h3>
                <span>2</span>
            </div>
        </div>
        
        <div class="list-game">
            <label>New Release</label>
            <div class="list">
                <div class="game">
                    <img src="./gambar-game/forza-horizon-6.png">
            </div>
            <div class="game">
                <img src="./gambar-game/forza-horizon-6.png">
            </div>
            <div class="game">
                <img src="./gambar-game/forza-horizon-6.png">
            </div>
            <div class="game">
                <img src="./gambar-game/forza-horizon-6.png">
            </div>
            <div class="game">
                <img src="./gambar-game/forza-horizon-6.png">
            </div>
            <div class="game">
                <img src="./gambar-game/forza-horizon-6.png">
            </div>
            </div>
        </div>
awdawdw
adadawd
awdawdawd
adawdaw
dawdawdawd
awdawdaw
dawdawd
awdawdaw

    </div>
    <script>
        function bukaTG() {
            document.getElementById("overlay").style.display = "flex";
        }
        function tutupTG(){
            document.getElementById("overlay").style.display = "none";
        }
        function profile(){
            document.getElementById("box").classList.toggle("active");
        }
        const menu = document.getElementById("box-option");
        const button = document.querySelector(".profile");
        function profile(){
            menu.classList.toggle("active");
            }
        document.addEventListener("click", function(event){
        if(!menu.contains(event.target) &&!button.contains(event.target)){
        menu.classList.remove("active");
        }
        });
    </script>
</body>
</html>
