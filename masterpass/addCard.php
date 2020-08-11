<?php
date_default_timezone_set('Europe/Istanbul');

require_once('getToken.php');
include("header.php");
include("navbar.php");

$user_id = "masterpass_user";
$title = "Add Card to Masterpass"
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
                    <a href="manipulateCards.php">Add Card to Masterpass</a>
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
                    <h3>Are you sure want to add your card to Masterpass?</h3>
                    <form action="" method="POST" id="addCardToMasterPass-form" class="row login_form">
                        <input type="hidden" name="cardAliasName" value="<?php echo $_GET['accountName'] ?>"/>
                        <input type="hidden" name="msisdn" value="<?php echo $_SESSION['msisdn']; ?>"/>
                        <input type="hidden" name="token"
                               value="<?php echo token("+03"/*+02*/, $_SESSION['msisdn'], $user_id, "101252836185"); ?>"/>
                        <input type="hidden" name="retrievalReferenceNumber"
                               value="21312367123867"/>
                        <input type="hidden" name="referenceNo" value="101252836185"/>
                        <input type="hidden" name="sendSmsLanguage" value="eng"/>
                        <!-- MFS Add Card To MasterPass parameters end -->
                        <!-- MFS constant parameters start -->
                        <input type="hidden" name="sendSms" value="N"/>
                        <!-- MFS constant parameters end -->
                        <div class="col-md-12 form-group">
                            <button id="primary-btn" type="submit" value="submit" name="singlebutton"
                                    class="primary-btn">Add Card To Masterpass
                            </button>
                        </div>
                        <div class="col-md-12 form-group">
                            <button onclick="window.history.go(-1)" id="Nobutton" type="button" value="submit"
                                    name="singlebutton"
                                    class="Nobutton primary-btn">No I want to go back
                            </button>
                        </div>
                        <!-- MFS constant parameters end -->
                    </form>
                    <form action="" method="POST" id="otp-form" class="row login_form"
                          style="display:none">
                        <div class="col-md-12 form-group">
                            <label for="otp">SMS Validation
                                Code</label>
                            <input name="validationCode" type="text"
                                   placeholder="A97011" class="form-control"/>
                        </div>
                        <br>
                        <div class="col-md-12 form-group">
                            <button name="singlebutton" type="submit" value="submit" class="primary-btn">Send</button>
                        </div>
                        <!-- MFS OTP validation parameters start -->
                        <input type="hidden" name="referenceNo" value="00000000"/>
                        <input type="hidden" name="sendSms" value="N"/>
                        <input type="hidden" name="sendSmsLanguage" value="eng"/>
                        <input type="hidden" name="pinType" value="otp"/>
                        <!-- MFS OTP validation parameters end -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/masterpass/addCard.js" type="text/javascript"></script>
</body>