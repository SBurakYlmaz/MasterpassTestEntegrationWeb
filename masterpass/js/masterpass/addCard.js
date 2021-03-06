jQuery(function ($) {
    $('#addCardToMasterPass-form').submit(function () {
        MFS.addCardToMasterPass($(this), mfsResponseHandler);
        return false;
    });
    $('#otp-form').submit(function () {
        MFS.validateTransaction($(this), mfsResponseHandler);
        return false;
    });
});

function mfsResponseHandler(status, response) {
    if (response.responseCode === "0000" || response.responseCode === "") {
        alert("MasterPass'e aktarma ilemi baarl");
    } else {
        $('#addCardToMasterPass-form, #otp-form').hide();
        if (response.responseCode === "5001") { // OTP sor
            $('#otp-form').show();
        } else if (response.responseCode === "5008") { // MasterPass OTP sor
            $('#otp-form').show();
        } else {
            alert(response.responseCode);
            alert(response.responseDescription);
            window.location.href = "index.php"
        }
    }
}