<?php
date_default_timezone_set('Europe/Istanbul');

require_once('getToken.php');
include("header.php");
include("navbar.php");

$title = "Rec-Payment";
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
                <a href="purchase.php">Purchase<span class="lnr lnr-arrow-right"></span></a>
                <a href="">Rec-Purchase</a>
            </nav>
        </div>
    </div>
</div>
</section>

<section class="login_box_area  ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login_form_inner" id="login_form_inner">
                    <h3>Enter a valid amount to purchase </h3>
                    <form class="row login_form" id="recurringPayment-form" method="POST">
                        <div class="col-md-12 form-group">
                            <label class="control-label" for="amount">Amount</label>
                            <div class="controls">
                                <input name="amount" type="text" placeholder="100"
                                       class="input-xlarge purchase-table"
                                />
                            </div>
                        </div>
                        <input type="hidden" name="msisdn" value="<?php echo $_SESSION["msisdn"]; ?>"/>
                        <input type="hidden" name="token"
                               value="<?php echo token("+03"/*+02*/, $_SESSION["msisdn"], "masterpass_user", "101252836185"); ?>"/>
                        <input type="hidden" name="listAccountName" value="<?php echo $_GET['accountName'] ?>"/>
                        <!--<input type="hidden" name="amount" value="1000" />-->
                        <input type="hidden" name="endDate" value="20200909"/>
                        <input type="hidden" name="actionType" value="A"/>  <!--A - insert, U - update, D - delete-->
                        <input type="hidden" name="productId" value="p12345"/>
                        <input type="hidden" name="referenceNo" value="101252836185"/>
                        <!--max 12 hane numeric bir deer olmal.-->
                        <input type="hidden" name="sendSmsLanguage" value="eng"/>
                        <!-- MFS Recurring Payment operation parameters end -->
                        <!-- MFS constant parameters start -->
                        <input type="hidden" name="sendSms" value="N"/>
                        <div class="col-md-12 form-group">
                            <button id="primary-btn" type="submit" value="submit" name="singlebutton"
                                    class="primary-btn">Rec-Pay
                            </button>
                        </div>
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
<script src="js/masterpass/rec-pay.js" type="text/javascript"></script>
</body>