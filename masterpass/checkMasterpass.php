<?php
date_default_timezone_set('Europe/Istanbul');

$account_Status = "";
$title = "Check Masterpass";

require_once('getToken.php');
include("header.php");
include("navbar.php");


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
<section class="banner-area">
    <section class="section_gap check-master-gap">
        <form action="" method="POST" id="checkMP-form" class="row login_form">
            <div class="container">
                <div class="align-items-center justify-content-start check-master-back">
                    <div class="row check-master-row"
                    <div class="col-md-12">
                        <button id="singlebutton" name="singlebutton" class="primary-btn">Check MasterPass
                        </button>
                        <span id="account" class="help-block"
                              style="color: #040505; font-weight: bolder;"><?php echo $account_Status; ?></span>
                    </div>
                </div>
            </div>
            </div>
            <!-- MFS Check MasterPass parameters start -->
            <input type="hidden" name="userId" value="<?php echo $_SESSION['msisdn']; ?>"/> <!--msissdn olması lazım-->
            <input type="hidden" name="token"
                   value="<?php echo token("+03"/*+02*/, $_SESSION["msisdn"], $_SESSION["user_id"], "101252836185"); ?>"/>
            <input type="hidden" name="referenceNo" value="101252836185"/>
            <input type="hidden" name="sendSmsLanguage" value="eng"/>
            <!-- MFS Check MasterPass operation parameters end -->
            <!-- MFS constant parameters start -->
            <input type="hidden" name="sendSms" value="N"/>
            <!-- MFS constant parameters end -->
        </form>
    </section>
</section>
<script src="js/masterpass/checkMp.js" type="text/javascript"></script>
</body>