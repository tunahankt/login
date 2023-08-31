<!--index.php-->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>İndex</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php
session_start(); //oturum başlattık
//oturumdaki bilgilerin doğruluğunu kontrol ediyoruz
if (isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "6789") {
    //eğer veriler doğru ise sayfaya girmesine izin veriyoruz
    $kadi = $_SESSION["kadi"];
} else {
    header("location:login.php");
}
?>
<div class="container">
    <!-- Kullanıcı adını ekrana yazıyoruz-->
    <h1>Merhaba <?php echo $kadi; ?></h1>

    <!-- Yeni kullanıcı ve çıkış linkleri-->
    <a href="register.php" class="btn btn-primary">Yeni Kullanıcı</a>
    <a href="logout.php" class="btn btn-danger">Çıkış</a> <br><br>

    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Kullanıcı Adı</th>
                <th>İşlem</th>
            </tr>
            <?php
            include("inc/vt.php");
            //kullanıcılarımızı veri tabanından çekiyoruz
            $sorgu = $baglanti->query("select * from kullanicilar");

            //kullanıcıları tek tek while ile alıyoruz
            while ($sonuc = $sorgu->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $sonuc["kadi"] ?></td>
                    <td>
                        <!-- Düzenleme ve silme linklerini id değerlerini yollayarak oluşturuyoruz-->
                        <a href="userEdit.php?id=<?php echo $sonuc["id"] ?>"><img src="image/duzenle.png"/></a>
                        <a href="userDelete.php?id=<?php echo $sonuc["id"] ?>"><img src="image/sil.png"/></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>