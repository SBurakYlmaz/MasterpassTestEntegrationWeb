<?php $title = 'Masterpass Home';
$page = "Home Page";
include("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['msisdn'] = $_POST['areaCode'] . $_POST['phoneNumber'];
    $_SESSION['user_id'] = "masterpass_user";
}
include("navbar.php");
?>


<head><title><?php echo $title; ?></title></head>
<!-- start banner Area -->
<body>
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="active-banner">
                    <!-- single-slide -->
                    <div class="row align-items-center d-flex">
                        <div class="col-lg-5">
                            <div class="banner-content">
                                <h1>MASTERPASS</h1>
                                <p>Masterpass, binlerce internet sitesi ve mobil uygulama içinde daha hızlı ve güvenli
                                    alışveriş imkanı sunar.
                                    Kart bilgilerinizi tekrar tekrar girmeden güvenli şekilde ödeme yapmanızı sağlar.
                                    Hesabını oluştur ve programa dahil olan bankalara ait banka kartı veya kredi kartını
                                    ekleyerek kayıt ol.
                                </p>
                                <div class=" add-bag d-flex align-items-center">
                                    <a class="add-btn icon-1 "
                                       href=<?php echo(isset($_SESSION["msisdn"]) ? "register.php" : "getPhoneNumber.php") ?>><span
                                                class="lnr  ti-user"></span></a>
                                    <span class="add-text text-uppercase"><?php echo(isset($_SESSION["msisdn"]) ? "Card Kaydet" : "Giriş Yap") ?></span>

                                    <?php echo(isset($_SESSION["msisdn"]) ? "
                                    <a  class=\"add-btn icon-1 \" href=\"purchase.php\"><span class=\"lnr  ti-bag\"></span></a>
                                    <span class=\"add-text text-uppercase\">Ödeme Yap</span>
                               " : "") ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="img-fluid" src="img/Masterpass.jpg" alt="Masterpass Logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
</body>