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
                        <a href="#" onclick="tutupTG()"><img src="icon/cross-icon.png"></a>
                    </div>
                    <div class="popup-isi">
                        <label>Cover Game</label>
                        <div class="preview">
                            <input type="file" class="tombol-file" id="coverFile" name="cover_tg" accept="image/*">
                            <img id="preview" src="" alt="Preview Cover">
                        </div>
                        <label>Judul Game</label>
                        <input type="text" placeholder="Judul Game" class="input-tg" name="judul_tg">
                        <label>Genre Game</label>
                        <input type="text" placeholder="Genre Game" class="input-tg" name="genre_tg">
                        <label>Platform</label>
                        <select class="platform" name="pl_tg">
                            <option>Steam</option>
                            <option>Xbox</option>
                            <option>PlayStation</option>
                            <option>Nintendo Switch</option>
                        </select>
                        <label>Status</label>
                        <select class="platform" name="st_tg">
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
        <input type="text" placeholder="Cari game...">
    </div>
    </div>
    
        <?php if (mysqli_num_rows($result) > 0) {?>

        <div class="library" id="library">
           
           <?php while ($row = mysqli_fetch_assoc($result)) {?>
   
                <div class="card-game">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
	                        <path d="M0 0h24v24H0z" fill="none" />
	                        <path fill="currentColor" d="M12.001 4.529a6 6 0 0 1 8.242.228a6 6 0 0 1 .236 8.236l-8.48 8.492l-8.478-8.492a6 6 0 0 1 8.48-8.464m6.826 1.641a4 4 0 0 0-5.49-.153l-1.335 1.198l-1.336-1.197a4 4 0 0 0-5.686 5.605L12 18.654l7.02-7.03a4 4 0 0 0-.193-5.454" />
                            </svg>
                            </button>
                            
                            <button class="tEdit">
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
    </div>
        <?php
        }
        ?>
    <script>
        const menu = document.getElementById("box-option");
        const button = document.querySelector(".profile");
        const coverFile = document.getElementById("coverFile");
        const preview = document.getElementById("preview");

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

        coverFile.addEventListener("change", function () {
            const file = this.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = "block";
            }
        });
    </script>
</body>

</html>