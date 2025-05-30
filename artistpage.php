<?php
$artists = [
    ["name" => "Leonardo da Vinci", "bio" => "A Renaissance artist known for the Mona Lisa and The Last Supper.", "image" => "https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcT_EA7MKyhpLXomUGHmWuTaGoPUkOMblObqUhTPppdNCsG-F0VRnTh8sivCtvj5ibTLYY1oD44-yJ2Yz9clFyX4ZRBHkBMEo2SCVUKmmccx"],
    ["name" => "Vincent van Gogh", "bio" => "Famous for The Starry Night and expressive brushwork.", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGTGDrOmfDmS_zzLCZTLlyAYtPKispgqNGT13CHz_no6ZSpci9ko9L2BbF6vxikWIvVPU&usqp=CAU"],
    ["name" => "Pablo Picasso", "bio" => "A revolutionary artist known for developing Cubism.", "image" => "https://cdn.britannica.com/63/59963-050-C03F29B9/Pablo-Picasso.jpg?w=740&h=416&c=crop"],
    ["name" => "Claude Monet", "bio" => "Impressionist artist known for Water Lilies series.", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTt6diudhz4UClO9zCpoImE9EO0bhu9f_Z5sG4IZYJAUPOUlS3EsKuMrkLi7RZcAVKT3cPHLv84w4ClUmbY-8-XcQ"],
    ["name" => "Salvador Dalí", "bio" => "Surrealist artist famous for The Persistence of Memory.", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJYiELoqsmHTUOHGJPDJDEhkLD6j3ACFfvn0WlaBeXI3pCs0vpd6AiENuk75pL0iX7cGw&usqp=CAU"],
    ["name" => "Frida Kahlo", "bio" => "Mexican artist known for self-portraits and symbolism.", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTp82c7mPPwNSu-o4N8BM5vqscb_YeWDaMZSsMW3t-MLFrCD0pBbmELdgCdz-tygTe4mws&usqp=CAU"],
    ["name" => "Georgia O’Keeffe", "bio" => "Known for paintings of enlarged flowers and New Mexico landscapes.", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9zu0gFaOuvyjHA1vSw0JUPWyNK8QKvOEVCih9fGGEXW4zTw_Mx1O26PfngXN_T6J8rhM&usqp=CAU"],
    ["name" => "Johannes Vermeer", "bio" => "Dutch painter famous for Girl with a Pearl Earring.", "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHuXIqdpEqnGUXOnBM085mnookbG1Aslz4td0-3wkE1QaiLvv5ExhruqYDEUHxJnvCY1M&usqp=CAU"],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists - Art Gallery</title>
    <style>
        body { font-family: 'Arial', sans-serif; background: rgba(245, 245, 245, 0.9); color: #333; text-align: center; }
        header {
            background: linear-gradient(135deg, rgba(255, 64, 129, 0.9), rgba(255, 0, 150, 0.8));
            padding: 15px 40px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(255, 64, 129, 0.4);
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        nav {
            display: flex;
            gap: 20px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 50px;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s ease-in-out;
        }
        nav a:hover,
        nav a.active {
            color: #ffebee;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        }
        .heading {
    margin-top: 100px;
    padding: 40px;
}

        .artist-grid { display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; padding: 20px; }
        .artist-card { background: rgba(255, 255, 255, 0.7); padding: 15px; border-radius: 15px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); width: 250px; cursor: pointer; backdrop-filter: blur(10px); }
        .artist-card img { width: 100%; height: 180px; border-radius: 15px; }
    </style>
</head>
<body>
    <header>
        <div class="logo">Art Gallery</div>
        <nav>
            <a href="homepage.php">Home</a>
            <a href="gallerypage.php">Gallery</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>
    <h1 class="heading">Meet the Artists</h1>
    <div class="artist-grid">
        <?php foreach ($artists as $artist): ?>
            <div class="artist-card" onclick="showArtistPopup('<?= $artist['name'] ?>', '<?= $artist['bio'] ?>')">
                <img src="<?= $artist['image'] ?>" alt="<?= $artist['name'] ?>">
                <h3><?= $artist['name'] ?></h3>
            </div>
        <?php endforeach; ?>
    </div>


    <div class="popup" id="artistPopup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(255, 255, 255, 0.9); padding: 20px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); width: 300px; text-align: center; backdrop-filter: blur(10px); border-radius: 15px;">
        <img id="artistPopupImg" src="" alt="" style="width: 100%; border-radius: 15px;">
        <h3 id="artistPopupName"></h3>
        <p id="artistPopupBio"></p>
        <button onclick="closeArtistPopup()" style="background: #ff4081; color: white; border: none; padding: 10px; cursor: pointer; margin-top: 10px; border-radius: 10px;">Close</button>
    </div>

    <script>
        function showArtistPopup(name, bio, imageSrc) {
            document.getElementById('artistPopupName').innerText = name;
            document.getElementById('artistPopupBio').innerText = bio;
            document.getElementById('artistPopupImg').src = imageSrc;
            document.getElementById('artistPopup').style.display = 'block';
        }
        function closeArtistPopup() {
            document.getElementById('artistPopup').style.display = 'none';
        }
    </script>
</body>
</html>

