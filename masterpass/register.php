<?php
date_default_timezone_set('Europe/Istanbul');

include("header.php");
include("navbar.php");
require_once('getToken.php');


$title = "Register-Masterpass";
$expirationDate = $cvc = $accountAliasName = $cardNumber = $token = "";
$expirationDateError = $cvcError = $accountAliasNameError = $cardNumberError = "";

?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <title><?php echo $title; ?></title>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="./js/mfs-client.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        MFS.setClientId("34701736");</script>
</head>

<body>

<!--================Login Box Area =================-->

<section class="login_box_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="img/login.jpg" alt="">
                    <div class="hover">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="login_form_inner" id="login_form_inner">

                    <form class="row login_form" id="register-form" method="POST">

                        <div class="col-md-12 form-group <?php echo (!empty($accountAliasNameError)) ? 'has-error' : ''; ?>">

                            <input type="text" class="form-control" id="accountAliasName" name="accountAliasName"
                                   placeholder="My Card"
                                   value="<?php echo $accountAliasName; ?>" required/>
                            <span class="help-block"><?php echo $accountAliasNameError; ?></span>
                        </div>

                        <div class="col-md-12 form-group <?php echo (!empty($cardNumberError)) ? 'has-error' : ''; ?>">

                            <input oninvalid="this.setCustomValidity(this.willValidate?'':'Enter a valid card number')"
                                   pattern="[0-9]+"
                                   oninput="setCustomValidity('')"
                                   type="text" minlength="15" class="form-control" id="rtaPan"
                                   name="rtaPan"
                                   placeholder="4444333322221111"
                                   value="<?php echo $cardNumber; ?>" required/>
                            <span class="help-block"><?php echo $cardNumberError; ?></span>
                        </div>

                        <div class="col-md-12 form-group <?php echo (!empty($expirationDateError)) ? 'has-error' : ''; ?>">

                            <input oninvalid="this.setCustomValidity(this.willValidate?'':'Enter a valid expiration date')"
                                   pattern="[0-9]+"
                                   oninput="setCustomValidity('')"
                                   type="text" class="form-control" maxlength="4" minlength="4" id="expiryDate"
                                   name="expiryDate" placeholder="YYMM"
                                   value="<?php echo $expirationDate; ?>" required/>
                            <span class="help-block"><?php echo $expirationDateError; ?></span>
                        </div>

                        <div class="col-md-12 form-group <?php echo (!empty($cvcError)) ? 'has-error' : ''; ?>">

                            <input oninvalid="this.setCustomValidity(this.willValidate?'':'Enter a valid cvc number')"
                                   pattern="[0-9]+"
                                   oninput="setCustomValidity('')"
                                   type="text" class="form-control" minlength="3" maxlength="3" id="cvc" name="cvc"
                                   placeholder="000"
                                   value="<?php echo $cvc; ?>" required/>
                            <span class="help-block"><?php echo $cvcError; ?></span>
                        </div>

                        <input type="hidden" name="msisdn" value="<?php echo $_SESSION['msisdn']; ?>"/>
                        <input type="hidden" name="token"
                               value="<?php echo token("+03"/*+02*/, $_SESSION['msisdn'], $_SESSION['user_id'], "101252836185"); ?>"/>
                        <input type="hidden" name="referenceNo" value="101252836185"/>
                        <input type="hidden" name="sendSmsLanguage" value="eng"/>

                        <input type="hidden" name="sendSms" value="N"/>
                        <input type="hidden" name="actionType" value="A"/>
                        <input type="hidden" name="clientIp" value=""/>
                        <input type="hidden" name="delinkReason" value=""/>
                        <input type="hidden" name="eActionType" value="A"/>
                        <input type="hidden" name="cardTypeFlag" value="05"/>
                        <input type="hidden" name="cpinFlag" value="Y"/>
                        <input type="hidden" name="defaultAccount" value="Y"/>
                        <input type="hidden" name="mmrpConfig" value="110010"/>
                        <input type="hidden" name="identityVerificationFlag" value="Y"/>
                        <input type="hidden" name="mobileAccountConfig" value="MWA"/>
                        <input type="hidden" name="timeZone" value="+03"/>
                        <input type="hidden" name="uiChannelType" value="6"/>
                        <div class="col-md-12 form-group">
                            <button id="primary-btn" type="submit" value="submit" name="singlebutton"
                                    class="primary-btn">Register
                            </button>
                        </div>
                        <div class="col-md-12 form-group">
                            <p>Already have masterpass account? <a href="checkMasterpass.php">Check MasterPass</a>.

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
                        <input type="hidden" name="referenceNo" value="00000000"/>
                        <input type="hidden" name="sendSms" value="N"/>
                        <input type="hidden" name="sendSmsLanguage" value="eng"/>
                        <input type="hidden" name="pinType" value="otp"/>
                    </form>

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

                        <input type="hidden" name="referenceNo" value="00000000"/>
                        <input type="hidden" name="sendSms" value="Y"/>
                        <input type="hidden" name="sendSmsLanguage" value="eng"/>
                        <input type="hidden" name="pinType" value="mpin"/>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/masterpass/register.js" type="text/javascript"></script>
</body>