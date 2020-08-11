<?php
date_default_timezone_set('Europe/Istanbul');

$page = "Phone Number";
$phoneNumberError = "";
$phoneNumber = "";
$title = "Phone Number Verification";

include("header.php");
include("navbar.php");
?>

<head><title><?php echo $title ?></title>
</head>

<body>
<form action="index.php" method="POST"
<section class="banner-area fullscreen align-items-center justify-content-start">
    <section class="section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="col-lg-12 form-group " id="login_form">
                        <div class="col-md-6 form-group phone-width <?php echo (!empty($phoneNumberError)) ? 'has-error' : ''; ?>">
                            <label for="Area Code" class="font-label">Area Code
                            </label>
                            <br>
                            <label>
                                <select class="form-control phone-area" name="areaCode">
                                    <option value="1">1</option>
                                    <option value="7">7</option>
                                    <option value="27">27</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="36">36</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="44">44</option>
                                    <option value="46">46</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="52">52</option>
                                    <option value="55">55</option>
                                    <option value="60">60</option>
                                    <option value="61">61</option>
                                    <option value="64">64</option>
                                    <option value="65">65</option>
                                    <option value="82">82</option>
                                    <option value="86">86</option>
                                    <option value="90">90</option>
                                </select>
                            </label>
                            <br>
                            <span class="help-block phoneStyle-helpblock"><?php echo "Please Select proper area code"; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="col-md-12 form-group <?php echo (!empty($phoneNumberError)) ? 'has-error' : ''; ?>">
                        <label for="Phone Number" class="font-label">Phone Number
                        </label>
                        <input oninvalid="this.setCustomValidity(this.willValidate?'':'Enter a valid phone number')"
                               pattern="[0-9]+"
                               oninput="setCustomValidity('')"
                               maxlength="10" minlength="10" type="text" class="form-control" id="phoneNumber"
                               name="phoneNumber"
                               placeholder="5077653425"
                               value="<?php echo $phoneNumber; ?>">
                        <span class="help-block phoneStyle-helpblock"><?php echo "You will be using your phone number to register"; ?></span>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <button id="primary-btn" type="submit"
                            value="submit" name="singlebutton"
                            class="primary-btn phone-button">Next
                    </button>
                </div>
            </div>
        </div>
    </section>
</section>


</body>
