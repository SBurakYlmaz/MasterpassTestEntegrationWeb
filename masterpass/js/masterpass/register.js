jQuery(function ($) {
    $('#register-form').submit(function () {
        MFS.register($(this), mfsResponseHandler);
        return false;
    });
    $('#otp-form, #mpin-form').submit(function () {
        MFS.validateTransaction($(this), mfsResponseHandler);
        return false;
    });
});

function mfsResponseHandler(status, response) {
    if (response.responseCode === "0000" || response.responseCode == "") {
        alert("Kart kayit basarili");
        window.location.href = "index.php";
    } else {
        $('#register-form, #otp-form, #mpin-form').hide();
        if (response.responseCode === "5001") { // OTP sor
            $('#otp-form').show();
        } else if (response.responseCode === "5008") { // Masterpass OTP sor
            $('#otp-form').show();
        } else if (response.responseCode === "5010") { // 3D Secure sor
            window.location.assign(response.url3D + "&returnUrl=" + "Your ReturnURL");
        } else if (response.responseCode === "5015") { // MPIN tanimlanmasini iste
            $('#mpin-form').show();
            $('#mpin-define-label').show();
        } else {
            alert(response.responseCode);
            alert(response.responseDescription);
            window.location.reload()
        }
    }
}