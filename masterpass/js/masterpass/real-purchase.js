jQuery(function ($) {
    $('#purchase-form').submit(function () {
        MFS.purchase($(this), mfsResponseHandler);
        return false;
    });
    $('#otp-form, #mpin-form').submit(function () {
        MFS.validateTransaction($(this), mfsResponseHandler);
        return false;
    });
});


function mfsResponseHandler(status, response) {
    if (response.responseCode === "0000" || response.responseCode == "") {
        $('.login_form_inner').replaceWith('<br>' + '<center><h3 class="no-card-header"> Purchase Success.</h3></center>');
    } else {
        $('#purchase-form, #otp-form, #mpin-form').hide();
        if (response.responseCode === "5001") { // OTP sor
            $('#otp-form').show();
        } else if (response.responseCode === "5002") { // MPIN sor
            $('#mpin-form').show();
        } else if (response.responseCode === "5010") { // 3D Securesayrafinayonlendir.
            window.location.assign(response.url3D + "&returnUrl=" + "Your ReturnURL");
        } else {
            alert(response.responseDescription);
            alert(response.responseCode);
        }
    }
}