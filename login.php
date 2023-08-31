<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>GÜVENLİK GÖREVLİSİ KAT ZİYARET TAKİBİ</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            background-color: #F6F7FA;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            width: 600px; 
            padding: 30px;
            background-color: white;
            border: 1px solid rgb(235, 235, 235);
            border-radius: 15px;
            box-shadow: 0 3px 5px 0 rgba(240, 240, 240, 0.3);
            animation: transitionIn-Y-over 0.5s;
        }

        h1 {
            text-align: center;
            font-size: 40px;
            margin-bottom: 50px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-label {
            color: rgb(44, 44, 44);
            text-align: center;
            font-size: 15px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .form-input,
        .form-textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-submit {
            background-color: #6d8493;
            color: #fff;
            padding: 10px 20px;
            font-weight: bold;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        .form-submit:hover {
            background-color: #1874c2;
        }

        #gorus {
            max-height: 300px;
            resize: none ;
            width: 100%;
            height: 110px;
        }
    </style>
</head>
<body>


        <div class="form-container">
        <img src="logo.png" alt="Logo" class="form-logo" style="display: block; margin: 0 auto;">
        <br style="margin-top: 20px;">  

        <div class="form-group">
            <label for="username" class="form-label">Kullanıcı Adı:</label>
            <input type="text" name="username" id="username" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Şifre:</label>
            <input type="password" name="password" id="password" class="form-input" required>
        </div>

        <input type="submit" value="Giriş Yap" class="form-submit">

    </div>

</body>
<?php

if (isset($kullanici_adi) || isset($sifre)) {

    $kullanici_adi = $_POST['user_name'];
    $sifre = $_POST['user_password'];

    $baglanti = mysqli_connect("localhost", "root", "", "aktip");

    $sorgu = "SELECT * FROM users WHERE user_name='$kullanici_adi' AND user_password='$sifre'";
    $sonuc = mysqli_query($baglanti, $sorgu);

    if (mysqli_num_rows($sonuc) > 0) {
        session_start();
        $_SESSION['user_name'] = $kullanici_adi;

        header("Location: qr.php");
    } else {
        echo "Kullanıcı adı veya şifre hatalı.";
    }
    mysqli_close($baglanti);
}

?>
</html>