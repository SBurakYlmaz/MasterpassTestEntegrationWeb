<?php
date_default_timezone_set('Europe/Istanbul');

require_once('getToken.php');
include("header.php");
include("navbar.php");

$title = "Delete Card";
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
                    <a href="manipulateCards.php">Manipulate Cards<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">Delete Card</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="login_box_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 selection-form">
                <div class="login_form_inner" id="login_form_inner">
                    <h3>Are you sure want to delete your card?</h3>
                    <form action="" method="POST" id="deleteCard-form" class="row login_form">
                        <!-- MFS delete card parameters start -->
                        <input type="hidden" name="accountAliasName" value="<?php echo $_GET['accountName'] ?>"/>
                        <input type="hidden" name="msisdn" value="<?php echo $_SESSION["msisdn"]; ?>"/>
                        <input type="hidden" name="token"
                               value="<?php echo token("+03"/*+02*/, $_SESSION["msisdn"], "masterpass_user", "101252836185"); ?>"/>
                        <input type="hidden" name="referenceNo" value="101252836185"/>
                        <input type="hidden" name="sendSmsLanguage" value="eng"/>
                        <!-- MFS delete card operation parameters end -->
                        <!-- MFS constant parameters start -->
                        <input type="hidden" name="sendSms" value="N"/>
                        <div class="col-md-6 form-group">
                            <button id="singlebutton" type="submit" value="submit" name="singlebutton"
                                    class="primary-btn">Yes
                            </button>
                        </div>
                        <div class="col-md-6 form-group">
                            <button onclick="window.history.go(-1)" id="Nobutton" type="button" value="submit"
                                    name="singlebutton"
                                    class="Nobutton primary-btn">No
                            </button>
                        </div>
                        <!-- MFS constant parameters end -->
                    </form>


                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/masterpass/deleteCard.js" type="text/javascript"></script>
</body>