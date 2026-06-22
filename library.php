<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/library.css">
    <title>Game Tracker</title>
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
            <a href="dashboard.html">Dashboard</a>
            <a href="library.php">Library</a>
            <a href="wishlist.html">Wishlist</a>
        </div>
    
        <label class="profile"><span><?php echo $username['username'];?></span><img src="foto_profile/<?php echo $profile['foto_profile'];?>" alt="profile" onclick="profile()"></label>
        <div class="box" id="box-option">
            <a href="#" class="option"><img src="icon/person-profile.png">Profile</a>
            <a href="index.php" class="option"><img src="icon/logout-profile.png">Sign Out</a>
        </div>
    </div>

    <div class="tombol-dan-cari">
    <div class="tambah-game">
        <button onclick="bukaTG()">Tambah Game</button>
        <div class="overlay" id="overlay">
            <div class="popup">
                <form action="tambah-game.php" method="POST" enctype="multipart/form-data">
                    <div class="header-popup">
                        <h3>Tambah Game</h3>
                        <a onclick="tutupTG()"><img src="icon/cross-icon.png"></a>
                    </div>
                    <div class="popup-isi">
                        <label>Cover Game</label>
                        <div class="preview">
                            <input type="file" class="tombol-file" id="coverFileTambah" name="cover_tg" accept="image/*">
                            <img id="previewTambah" src="" alt="Preview Cover">
                        </div>
                        <label>Judul Game</label>
                        <input type="text" placeholder="Judul Game" class="input-tg" name="judul_tg">
                        <label>Genre Game</label>
                        <input type="text" placeholder="Genre Game" class="input-tg" name="genre_tg">
                        <label>Platform</label>
                        <select class="list" name="pl_tg">
                            <option>Steam</option>
                            <option>Xbox</option>
                            <option>PlayStation</option>
                            <option>Nintendo Switch</option>
                        </select>
                        <label>Status</label>
                        <select class="list" name="st_tg">
                            <option>Belum dimainkan</option>
                            <option>Sedang dimainkan</option>
                            <option>Tamat</option>
                        </select>
                        <label>Rating</label>
                        <input type="number" placeholder="1-10" class="input-tg" name="rating_tg" min="1" max="10">
                        <button type="submit" class="btn-simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="cari-game">
        <span class="icon"><img src="https://cdn-icons-png.flaticon.com/128/54/54481.png" alt="search logo"></span>
        <input type="text" id="cari" placeholder="Cari game...">
    </div>
    </div>
    
        <?php if (mysqli_num_rows($result) > 0) {?>

        <div class="library" id="library">
           
           <?php while ($row = mysqli_fetch_assoc($result)) {?>
   
                <div class="card-game game-item">
                    <img src="gambar-game/<?php echo $row['cover_game']; ?>">
                    <div class="info-game">
                        <h3><?php echo $row['judul']; ?></h3>

                        <div class="detail">
                            <label>Genre</label>
                            <span><?php echo $row['genre']; ?></span>
                        </div>

                        <div class="detail">
                            <label>Platform</label>
                            <span><?php echo $row['platform']; ?></span>
                        </div>

                        <div class="detail">
                            <label>Status</label>
                            <span><?php echo $row['status']; ?></span>
                        </div>

                        <div class="detail">
                            <label>Rating</label>
                            <span><?php echo $row['rating']; ?></span>
                        </div>
                        <div class="tombol">
                            <button class="tWishlist">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  viewBox="0 0 24 24">
	                        <path d="M0 0h24v24H0z" fill="none" />
	                        <path fill="currentColor" d="m12 21.35l-1.45-1.32C5.4 15.36 2 12.27 2 8.5C2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.53z" />
                            </svg>

                            </button>
                            
                           <button class="tEdit" onclick="bukaEdit('<?php echo $row['id_library']; ?>','<?php echo $row['judul']; ?>','<?php echo $row['genre']; ?>','<?php echo $row['platform']; ?>','<?php echo $row['status']; ?>','<?php echo $row['rating']; ?>','<?php echo $row['cover_game']; ?>')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
	                        <path d="M0 0h24v24H0z" fill="none" />
	                        <path fill="currentColor" d="m14.06 9l.94.94L5.92 19H5v-.92zm3.6-6c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29m-3.6 3.19L3 17.25V21h3.75L17.81 9.94z" />
                            </svg>
                            </button>

                            <button class="tHapus" onclick="if(confirm('Hapus game ini?')){location.href='hapus_game.php?id_library=<?php echo $row['id_library']; ?>';}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
	                        <path d="M0 0h24v24H0z" fill="none" />
	                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 11v6m-4-6v6M6 7v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7M4 7h16M7 7l2-4h6l2 4" />
                            </svg>
                            </button>

                        </div>
                    </div>
                </div>
                
                <?php
                }
                ?>
                
                <?php
        }
        ?>
        <div class="overlay-edit" id="overlay-edit">
            <form action="edit-game.php" method="POST" enctype="multipart/form-data">
                <div class="popup-edit">
                    <div class="header-edit">
                        <h3>Edit Game</h3>
                    <a onclick="tutupEdit()"><img src="icon/cross-icon.png"></a>
                </div>
                <div class="isi-edit">
                    <label>Cover Game</label>
                    <div class="previewEdit">
                    <input type="file" class="tombol-file" id="coverFileEdit" name="cover_game" accept="image/*">
                    <img id="previewEdit" src="gambar-game/<?php echo  $row['cover_game']?>" alt="Preview Cover">
                    </div>
                    <label>Judul Game</label>
                    <input type="hidden" id="edit_id" name="id_library">
                    <input type="text" id="edit_judul" name="judul" class="input-ed" placeholder="Judul Game">
                    <label>Genre Game</label>
                    <input type="text" id="edit_genre" name="genre" class="input-ed" placeholder="Genre Game">
                    <label>Platform</label>
                    <select id="edit_platform" name="platform" class="list-edit" placeholder="Platform">
                        <option>Steam</option>
                        <option>Xbox</option>
                        <option>Nintendo Switch</option>
                        <option>Playstation</option>
                    </select>
                    <label>Status</label>
                    <select id="edit_status" name="status" class="list-edit" placeholder="Status">
                        <option>Belum dimainkan</option>
                        <option>Sedang dimainkan</option>
                        <option>Tamat</option>
                    </select>
                    <label>Rating</label>
                    <input type="number" id="edit_rating" name="rating" class="input-ed" placeholder="1-10">
                    <button type="submit" class="btn-simpan">Simpan</button>
                </div>
                </div>
                </div>
            </form>
            </div>
</body>
    <script>
        const menu = document.getElementById("box-option");
        const button = document.querySelector(".profile");
        
        function profile() {
            menu.classList.toggle("active");
        }
        document.addEventListener("click", function (event) {
            if (!menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.remove("active");
            }
        });

        function bukaTG() {
            document.getElementById("overlay").style.display = "flex";
            document.body.style.overflow = "hidden";
        }
        function tutupTG() {
            document.getElementById("overlay").style.display = "none";
            document.body.style.overflow = "auto";
        }

function bukaEdit(id, judul, genre, platform, status, rating, cover) {
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_judul").value = judul;
    document.getElementById("edit_genre").value = genre;
    document.getElementById("edit_platform").value = platform;
    document.getElementById("edit_status").value = status;
    document.getElementById("edit_rating").value = rating;

    document.getElementById("previewEdit").src =
        "gambar-game/" + cover;

    document.getElementById("overlay-edit").style.display = "flex";
}

function tutupEdit() {
    document.getElementById("overlay-edit").style.display = "none";
    document.body.style.overflow = "auto";

    
}

const inputTambah = document.getElementById("coverFileTambah");
const previewTambah = document.getElementById("previewTambah");

if (inputTambah) {
    inputTambah.addEventListener("change", function () {
        const file = this.files[0];

        if (file) {
            previewTambah.src = URL.createObjectURL(file);
            previewTambah.style.display = "block";
        }
    });
}

document.querySelectorAll('.tWishlist').forEach(item => {
    item.addEventListener('click', function() {
        this.classList.toggle('active');
    });
});

document.getElementById("cari").addEventListener("keyup", function () {

    let keyword = this.value.toLowerCase();
    let games = document.querySelectorAll(".game-item");

    games.forEach(game => {

        let title = game.querySelector("h3").textContent.toLowerCase();

        if (title.includes(keyword)) {
            game.classList.remove("hide");
        } else {
            game.classList.add("hide");
        }
    });

});
    </script>

</html>