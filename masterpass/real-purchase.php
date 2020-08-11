<?php
date_default_timezone_set('Europe/Istanbul');

require_once('getToken.php');
include("header.php");
include("navbar.php");

$title = "Purchase-Final";
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
        /*MFS.setAdditionalParameters({
            "order_product_name_arr": ["TEST",
                "TEST2"],
            "order_product_code_arr": ["TST", "TST2"],
            "order_price_arr": ["1",
                "2"],
            "order_qty_arr": ["1", "2"],
            "order_product_info_arr": ["test",
                "test2"],
            "bill_first_name": "test",
            "bill_last_name": "test1",
            "bill_email": "test@test.com",
            "bill_phone":
                "905388497330",
            "bill_country_code": "TR",
            "bill_fax": "",
            "bill_address": "",
            "bill_address2": "",
            "bill_zip_code": "",
            "bill_city": "",
            "bill_state": "",
            "delivery_first_name": "ugur",
            "delivery_last_name": "tahmaz",
            "delivery_email": "test@test.com",
            "delivery_phone": "",
            "delivery_company": "",
            "delivery_address": "",
            "delivery_address2": "",
            "delivery_zip_code": "",
            "delivery_city": "",
            "delivery_state": "",
            "delivery_country_code": ""
        });*/
    </script>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>

<!--================Login Box Area =================-->

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Cards</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="javascript:history.back()">Purchase<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">Confirmation</a>
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
                    <form class="row login_form" id="purchase-form" method="POST">
                        <div class="col-md-12 form-group">
                            <label class="control-label" for="amount">Amount</label>
                            <div class="controls">
                                <input name="amount" type="text" placeholder="100"
                                       class="input-xlarge purchase-table"
                                />
                            </div>
                        </div>

                        <input type="hidden" name="listAccountName" value="<?php echo $_GET['accountName'] ?>"/>
                        <input type="hidden" name="msisdn" value="<?php echo $_SESSION["msisdn"]; ?>"/>
                        <input type="hidden" name="token"
                               value="<?php echo token("+03"/*+02*/, $_SESSION["msisdn"], "masterpass_user", "101252836185"); ?>"/>
                        <input type="hidden" name="referenceNo" value="101252836185"/>
                        <input type="hidden" name="sendSmsLanguage" value="eng"/>
                        <input type="hidden" name="macroMerchantId" value="01736177920327033713702"/>
                        <input type="hidden" name="orderNo" value="44444"/>
                        <input type="hidden" name="installmentCount" value="0"/>
                        <!-- <input type="hidden" name="rewardName" value=""/>
                         <input type="hidden" name="rewardValue" value=""/>
                         <input type="hidden" name="cvc" value="123"/>-->

                        <input type="hidden" name="sendSms" value="N"/>
                        <input type="hidden" name="aav" value="aav"/>
                        <input type="hidden" name="clientIp" value=""/>
                        <input type="hidden" name="encCPin" value="0"/>
                        <input type="hidden" name="encPassword" value=""/>
                        <input type="hidden" name="sendSmsMerchant" value="Y"/>
                        <input type="hidden" name="password" value=""/>
                        <div class="col-md-12 form-group">
                            <button id="primary-btn" type="submit" value="submit" name="singlebutton"
                                    class="primary-btn">Purchase
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

                    <!-- MPIN form start -->

                    <form action="" method="POST" id="mpin-form" class="row login_form"
                          style="display:none">
                        <div class="col-md-12 form-group" id="mpin-define-label"
                             style="display:none">
                            <label class="control-label" for="otp">
                                You dont have a registered MPIN. Please define your MPIN
                                for the first time.
                            </label>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="otp">MPIN</label>
                            <div class="col-md-12 form-group">
                                <input name="validationCode" type="text" placeholder="1234"
                                       class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 form-group">
                            <button name="singlebutton" type="submit" value="submit" class="primary-btn">Send
                            </button>
                        </div>

                        <!-- MFS Mpin validation parameters start -->
                        <input type="hidden" name="referenceNo" value="00000000"/>
                        <input type="hidden" name="sendSms" value="Y"/>
                        <input type="hidden" name="sendSmsLanguage" value="eng"/>
                        <input type="hidden" name="pinType" value="mpin"/>
                        <!-- MFS Mpin validation parameters end -->

                    </form>
                    <!-- MPIN form end -->

                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/masterpass/real-purchase.js" type="text/javascript"></script>
</body>