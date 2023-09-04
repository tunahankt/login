    <!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>AKTIP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

    @media (max-width: 600px) {
      .form-container {
        width: 100%;
        margin: 0;
      }

      .form-group {
        width: 100%;
      }

      .form-label {
        font-size: 14px;
      }

      .form-input,
      .form-textarea {
        width: 100%;
      }

      .form-submit {
        width: 100%;
      }

      .form-logo {
        width: 100%;
      }
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
      font-size: 30px;
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

    .form-logo {
      width: 70%;
      margin: 0 auto;
    }

    .form-logo img {
      width: 100%;
    }
  </style>

  </head>
  <body>

    <div class="form-container">
    <img src="logo.png" alt="Logo" class="form-logo" style="display: block; margin: 0 auto;">
        <br style="margin-top: 10px;"> 
      <h1>GÜVENLİK GÖREVLİSİ KAT ZİYARET TAKİBİ</h1>

      <?php
  $kullanici = "";
  date_default_timezone_set("Europe/Istanbul");
  $tarih_saat = date("d.m.Y H:i:s");
  $gorus = "";

  if (isset($_POST["kullanici"])) {

    $kullanici = $_POST["kullanici"][0];
    $tarih_saat = $_POST["tarih-saat"];
    $gorus = $_POST["gorus"];

  }
      ?>

      <form action="form-gonder.php" method="post">

        <div class="form-group">
          <label for="kullanici" class="form-label">Kullanıcı:</label>
          <select name="kullanici" id="kullanici" class="form-input">
            <option value="" disabled selected>Kullanıcı Seçin</option>
            <option value="1">Davut ORUÇTUTAN</option>
            <option value="2">Emel AYSER</option>
            <option value="3">Hatice BÜYÜKATA</option>
            <option value="4">Şenay ÇELİK</option>
            <option value="5">Seden KASAPOĞLU</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tarih-saat" class="form-label">Ziyaret Tarihi ve Saati:</label>
          <input type="text" name="tarih-saat" id="tarih-saat" value="<?php echo $tarih_saat; ?>" class="form-input" readonly>
        </div>

        <div class="form-group">
          <label for="gorus" class="form-label">Ziyaret Notu:</label>
          <textarea name="gorus" id="gorus" class="form-textarea"></textarea>
        </div>

        <input type="submit" value="Gönder" class="form-submit">

      </form>
    </div>

  </body>
  </html>
