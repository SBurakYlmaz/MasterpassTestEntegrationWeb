<?php
date_default_timezone_set('Europe/Istanbul');

require_once('getToken.php');
include("header.php");
include("navbar.php");

$title = "Purchase";
$token = token("+03"/*+02*/, $_SESSION["msisdn"], $_SESSION['user_id'], "101252836185");


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

    <script>

        var phoneNumber = '<?php echo $_SESSION["msisdn"];?>';
        var curToken = '<?php echo $token;?>';

    </script>

</head>


<body>

<section class="banner-area organic-breadcrumb"
">
<div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
        <div class="col-first">
            <h1>Cards</h1>
            <nav class="d-flex align-items-center">
                <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                <a href="">Purchase</a>
            </nav>
        </div>
    </div>
</div>
</section>

<section class="login_box_area section_gap">
    <div class="container" id="selectedCard">
        <div class="row">
            <div class="col-lg-12" id="selectedCard">
                <table id="cardTable" class="table m-0 purchase-table">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Card Owner</th>
                        <th>Card Number</th>
                        <th>Selection</th>
                    </tr>
                    </thead>
                    <tbody id="cards">

                    </tbody>
                    <script type="text/javascript">

                    </script>
                </table>
            </div>
        </div>
    </div>
</section>
<script src="js/masterpass/purchase.js" type="text/javascript"></script>

</body>

