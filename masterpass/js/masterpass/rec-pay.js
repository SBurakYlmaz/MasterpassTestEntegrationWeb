jQuery(function ($) {
    $('#recurringPayment-form').submit(function () {
        MFS.initiateRecurringPayment($(this), mfsResponseHandler);
        return false;
    });
    $('#otp-form').submit(function () {
        MFS.validateTransaction($(this), mfsResponseHandler);
        return false;
    });
});

function mfsResponseHandler(status, response) {
    if (response.responseCode === "0000" || response.responseCode == "") {
        alert("Recurring Payment işlemi başarili");
    } else {
        $('#recurringPayment-form, #otp-form').hide();
        if (response.responseCode === "5001") { // OTP sor
            $('#otp-form').show();
        } else if (response.responseCode === "5008") { // MasterPass OTP sor
            $('#otp-form').show();
        } else {
            alert(response.responseCode);
            alert(response.responseDescription);
        }
    }
}