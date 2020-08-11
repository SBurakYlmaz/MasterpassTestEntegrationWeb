jQuery(function k($) {
    $('#checkMP-form').submit(function () {
        MFS.checkMasterPass($(this), mfsResponseHandler);
        return false;
    });
});

function mfsResponseHandler(status, response) {
    if (response.responseCode === "0000" || response.responseCode == "") {
        let account_Status = "";
        for (let i = 0; i < 7; i++) {
            account_Status = account_Status + response.accountStatus[i];
        }
        console.log(accountStatusHandler(account_Status));
        alert(accountStatusHandler(account_Status));
        return accountStatusHandler(account_Status);
    } else {
        console.log(response.responseDescription);
        console.log(response.responseCode);
        alert(response.responseDescription);
        return "error";
    }
}

function accountStatusHandler(account_Status) {
    if (account_Status === "0000000") {
        return "Son kullanicinin sistemde kayitli hesabi ve karti yok.";
    } else if (account_Status === "0100000") {
        return "Son kullanicinin sistemde kayitli MasterPass hesabi var fakat bu hesaba kayitli herhangi bir karti yok.";
    } else if (account_Status === "0100100") {
        return "Son kullanicinin sistemde kayitli MasterPass hesabi var fakat bu hesap bloklu ve bu hesaba kayitli bir karti yok.";
    } else if (account_Status === "0101000") {
        return "Son kullanicinin sistemde usteri programina linkli MasterPass hesabi var fakat bu hesapta kayitli karti yok";

    } else if (account_Status === "0101100") {
        return "Son kullanicinin sistemde musteri programina linkli MasterPass hesabi var fakat bu hesap bloklu ve bu hesaba kayitli karti yok.";

    } else if (account_Status === "0110001") {
        return "Son kullanicinin sistemde kayitli MasterPass hesabi ve bu hesapta kayitli en az bir kredi karti ve ya musteri programinin destekledigi debit karti var.";

    } else if (account_Status === "0110101") {
        return "Son kullanicinin sistemde kayitli MasterPass hesabi var ve bu hesap bloklu. Bu hesaba kayitli en az bir karti var.";

    } else if (account_Status === "0111001") {
        return "Son kullanicinin sistemde musteri programina linkli MasterPass hesabi ve bu hesapta kayitli en az bir karti var.";

    } else if (account_Status === "0111100") {
        return "Son kullanicinin sistemden musteri programina linkli MasterPass hesabi var ve bu hesap bloklu. Bu hesaba kayitli en az bir debit karti var fakat musteri programi bu karti desteklemiyor";

    } else if (account_Status === "1000001") {
        return "Son kullanicinin musteri programinda kayitli en az bir karti var.";

    } else if (account_Status === "1100001") {
        return "Son kullanicinin musteri programinda kayitli en az bir karti ve Masterpass hesabi var. Fakat Masterpass hesabinda kart yok.";

    } else if (account_Status === "1100101") {
        return "Son kullanicinin musteri programinda kayitli en az bir karti ve Masterpass hesabi var. Fakat Masterpass hesabinda kart yok ve Masterpass hesabi bloklu.";

    } else if (account_Status === "1101000") {
        return "Son kullanicinin musteri programinda kayitli ve musteri programinin desteklemedigi bir debit karti ve Masterpass hesabi var. Fakat Masterpass hesabinda kart yok ve Masterpass hesabi musteri programina linkli.";

    } else if (account_Status === "1101101") {
        return "Son kullanicinin musteri programinda kayitli en az bir karti ve Masterpass hesabi var. Fakat Masterpass hesabinda kart yok ve Masterpass hesabi musteri programina linkli ve bu hesap bloklu.";

    } else if (account_Status === "1110000") {
        return "Son kullanicinin musteri programinda kayitli en az bir karti ve en az bir karti bulunan Masterpass hesabi var";

    } else if (account_Status === "1110100") {
        return "Son kullanicinin musteri programinda kayitli ve musteri programinin desteklemedigi bir debit karti var. Ayrica en az bir karti bulunan Masterpass hesabi var ve Masterpass hesabi bloklu.";

    } else if (account_Status === "1111011") {
        return "Son kullanicinin musteri programinda kayitli en az bir karti var ve en az bir karti bulunan Masterpass hesabi var. Masterpass hesabi musteri porgramina linkli.Ayrica son kullanicin telefon numarasi baska bir uye is yeri tarafidan guncellenmis.";

    } else if (account_Status === "1111111") {
        return "Son kullanicinin musteri programinda kayitli en az bir karti var ve en az bir karti bulunan Masterpass hesabi var. Masterpass hesabi bloklu ve musteri porgramina linkli. Ayrica son kullanicin telefon numarasi baska bir uye is yeri tarafidan guncellenmis";
    } else
        return "No match";
}