jQuery(function ($) {
    $('#deleteCard-form').submit(function () {
        document.getElementById("Nobutton").onclick = function () {
            parent.history.back();
            return false;
        };
        MFS.deleteCard($(this), mfsResponseHandler);
        return false;
    });
});

function mfsResponseHandler(status, response) {
    if (response.responseCode === "0000" || response.responseCode == "") {
        alert("Kart silme basarili");
        window.location.href = "manipulateCards.php";
    } else {
        alert(response.responseCode);
        alert(response.responseDescription);
    }
}