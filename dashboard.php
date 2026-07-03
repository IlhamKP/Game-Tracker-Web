<!DOCTYPE html>
<html lang="id">
<head>
    <link href="css/dashboard.css" rel="stylesheet">
    <title>Game Tracker</title>
</head>



<body>

    
    <div class="heading">

        <h1>Game <br>Tracker</h1>

        <div class="menu">
            <a href="dashboard.html">Dashboard</a>
            <a href="library.html">Library</a>
            <a href="wishlist.html">Wishlist</a>
        </div>

        <div class="profile">
            <a onclick="profile(); return false;"><img src="https://i.pinimg.com/736x/fc/7c/3b/fc7c3b11ed402d81ab8918b9a1304113.jpg" alt="logo"></a>     
        </div>
        <div class="box" id="box-option">
            <a href="#" class="option"><img src="icon/person-profile.png">Profile</a>
            <a href="index.html" class="option"><img src="icon/logout-profile.png">Sign Out</a>
        </div> 

    </div>

    
    <div class="dashboard-content">

        
        <div class="stats-box">

            <div class="total-game">
                <h2>Total Game</h2>
                <p>0</p>
            </div>

            <div class="stats-row">

                <div class="small-card">
                    <h3>Belum dimainkan</h3>
                    <p>0</p>
                </div>

                <div class="small-card">
                    <h3>Tamat</h3>
                    <p>0</p>
                </div>

                <div class="small-card">
                    <h3>Sedang dimainkan</h3>
                    <p>0</p>
                </div>

            </div>

        </div>

        
        <div class="new-release">

            <h2>New Releases</h2>

            <div class="release-box">

                <div class="release-card">
                    <img src="https://picsum.photos/200/300?1">
                    <button>+</button>
                </div>

                <div class="release-card">
                    <img src="https://picsum.photos/200/300?2">
                    <button>+</button>
                </div>

                <div class="release-card">
                    <img src="https://picsum.photos/200/300?3">
                    <button>+</button>
                </div>

                <div class="release-card">
                    <img src="https://picsum.photos/200/300?4">
                    <button>+</button>
                </div>

            </div>

        </div>

    </div>
    <script>
const menu = document.getElementById("box-option");
const button = document.querySelector(".profile");

function profile(){
    menu.classList.toggle("active");
}

document.addEventListener("click", function(event){
    if(!menu.contains(event.target) && !button.contains(event.target)){
        menu.classList.remove("active");
    }
});
</script>
</body>
</html>