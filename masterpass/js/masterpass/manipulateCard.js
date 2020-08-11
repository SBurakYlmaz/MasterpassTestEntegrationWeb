jQuery(function ($) {
    $('#listCardButton').click(function () {
        MFS.listCards(phone, token, listCardsResponseHandler);
        $('#listCardButton').attr("disabled", true);
        return false;
    })
});

jQuery(function ($) {
    $(document).on('click', '.addCardMasterpass', function () {
        let accountName = $(this).closest('tr').find('.accountname').text();
        window.location.href = "addCard.php?accountName=" + accountName;
    });
});

jQuery(function ($) {
    $(document).on('click', '.deleteCard', function () {
        let accountName = $(this).closest('tr').find('.accountname').text();
        window.location.href = "deleteCard.php?accountName=" + accountName;
    });
});

jQuery(function ($) {
    $(document).on('click', '.goRegister', function () {
        window.location.href = "register.php";
    });
});

function listCardsResponseHandler(statusCode, response) {
    if (response.responseCode === "1051") {
        $('#listCardButton').replaceWith('<center><h3 class="no-card-header"> There is no card belongs to that account.</h3></center>'
            + '<button type="submit" value="submit"\n' +
            '                        name="singlebutton"\n' +
            '                        class="primary-btn goRegister">Register Card' +
            '                </button>');
        $('#cardTable').hide();
        return;
    }


    if (response.responseCode !== "0000" && response.responseCode != "") {
        alert(response.responseCode);
        return;
    }

    let cards = "";

    for (let i = 0; i < response.cards.length; i++) {
        let card = response.cards[i];
        cards = card.Value1;
        $('#cardTable > tbody').append('<tr><td class="table-cell-sb" >' + (i + 1) + '</td><td  class="table-cell-sb accountname">' + card.Name + '</td><td class="table-cell-sb">' + cards + '</td><td>' +
            '<button  ' +
            'type="submit" value="submit"\n' +
            'name="singlebutton"\n' +
            'class="primary-btn deleteCard card-table-values">Delete Card</td>' +
            '<td>' +
            '</button>' + '<button ' +
            'type="submit" value="submit"\n' +
            'name="singlebutton"\n' +
            'class="primary-btn addCardMasterpass card-table-values">Add Card' +
            '</button>' + '</td></tr>');
    }
}