    <!DOCTYPE html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <title>GÜVENLİK GÖREVLİSİ KAT ZİYARET TAKİBİ</title>
    </head>
    <body>

        <div class="form-container">
        <h1>Form Gönderildi!</h1>
        </div>


        <?php

    // Form verilerini al
    $kullanici = $_POST["kullanici"];
    $tarih_saat = $_POST["tarih-saat"];
    $gorus = $_POST["gorus"];

    // Veritabanına bağlantı aç
    $baglanti = new PDO("mysql:host=localhost;dbname=aktip", "root", "");

    // Tarih ve saati al
    $tarih_saat = date("d-m-Y H:i:s");

    // Veri ekle
    $ekle = $baglanti->prepare("INSERT INTO ziyaretler (kullanici, tarih_saat, gorus) VALUES (?, ?, ?)");
    $ekle->execute(array($kullanici[0], $tarih_saat, $gorus));

    // Bağlantıyı kapat
    $baglanti = null;

    // Ziyaretin başarılı bir şekilde eklendiğini göster
    echo "Ziyaret başarıyla eklendi.";

    ?>
    </body>
    </html>
