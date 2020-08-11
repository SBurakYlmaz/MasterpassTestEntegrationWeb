<?php
date_default_timezone_set('Europe/Istanbul');

require_once('getToken.php');
include("header.php");
include("navbar.php");

$title = "Manipulate Cards";

if (!isset($_SESSION["msisdn"])) {
    header("location: getPhoneNumber.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <title><?php echo $title; ?></title>
    <script src="./js/mfs-client.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        MFS.setClientId("34701736");
    </script>
    <script type="text/javascript">
        MFS.setAddress("https://test.masterpassturkiye.com/MasterpassJsonServerHandler/v2");
    </script>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Cards</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="manipulateCards.php">Manipulate Cards</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="login_box_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 login_form_inner manipulate-card-form">

                <button id="listCardButton" type="submit"
                        value="submit"
                        name="singlebutton"
                        class="primary-btn list-card-button">List My Cards
                </button>
                <br>
                <table id="cardTable" class="table m-0">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Card Owner</th>
                        <th>Card Number</th>
                        <th>Manage Card</th>
                        <th>Add Card to Masterpass</th>
                    </tr>
                    </thead>
                    <tbody id="cards">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    var token = '<?php echo token("+03"/*+02*/, $_SESSION["msisdn"], $_SESSION['user_id'], "101252836185")?>';
    var phone = '<?php echo $_SESSION["msisdn"];?>';
</script>
<script src="js/masterpass/manipulateCard.js" type="text/javascript"></script>
</body>


</html>
