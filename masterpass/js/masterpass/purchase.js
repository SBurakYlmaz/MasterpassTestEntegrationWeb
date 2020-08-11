var accountName;

(function ($) {
    $(document).ready(function () {
        MFS.listCards(phoneNumber, curToken, listCardsResponseHandler);
    });
})(jQuery);

jQuery(function select($) {
    $(document).on('click', '.selection', function () {
        accountName = $(this).closest('tr').find('.accountname').text();
    });
});

jQuery(function ($) {
    $(document).on('click', '.goRegister', function () {
        window.location.href = "register.php";
    });
});

jQuery(function ($) {
    $(document).on('click', '.next-button', function () {
        if (!$("input[name='radios']:checked").val()) {
            alert('Select one of the cards below to continue!');
            return false;
        } else {
            window.location.href = "real-purchase.php?accountName=" + accountName;
        }
    });
});

jQuery(function ($) {
    $(document).on('click', '.Recurring-Pay', function () {
        if (!$("input[name='radios']:checked").val()) {
            alert('Select one of the cards below to continue!');
            return false;
        } else {
            window.location.href = "recPayment.php?accountName=" + accountName;
        }
    });
});

function listCardsResponseHandler(statusCode, response) {
    if (response.responseCode === "1051") {
        $('#row').replaceWith('<center><h3 class="no-card-header"> There is no card belongs to that account.</h3></center>' +
            '<br>' + '<button type="submit" value="submit"\n' +
            '                        name="singlebutton"\n' +
            '                        class="selection-radio primary-btn goRegister">Register Card' +
            '                </button>');
        return;
    } else {
        let cards = "";

        for (let i = 0; i < response.cards.length; i++) {
            let card = response.cards[i];
            cards = card.Value1;
            $('#cardTable > tbody').append('<tr><td class="table-cell-sb">' + (i + 1) + '</td><td class="table-cell-sb accountname">' + card.Name + '</td><td class="table-cell-sb">' + cards + '</td><td>' +
                '<input type="radio" value="submit"\n' +
                'name="radios"\n' +
                'class="primary-btn selection"><span class="checkmark"></span></td>' +
                '<td>' +
                '</tr>');
        }
        $('#selectedCard').append('<br><br>' + '<button  id="next-button" type="submit" value="submit"\n' +
            '                        name="next-button"' +
            '                        class="next-button primary-btn purchase-button">Pay' +
            '                </button>' +
            '<button id="Recurring-Pay" type="submit" value="submit"\n' +
            '                        name="Recurring-Pay"' +
            '                        class="Recurring-Pay primary-btn rec-button">Recurring Payment' +
            '                </button>');
    }


    if (response.responseCode !== "0000" && response.responseCode != "") {
        alert(response.responseCode);
    }


}