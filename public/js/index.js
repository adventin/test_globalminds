var $body = $('body');

$body.on('focus', '.phoneJs', function () {
    $(this).mask("+7 (999) 999-99-99");
});

$('.phonebookFormSubmitJs').on('click', function () {

    var $form = $(this).parents('form');

    if (validateForm($form)) {
        var data = processData($form);
        submitData({$form, data});
    }

});

$('.phonebookSearchJs').on('change keyup', function () {
    var $form = $(this).parents('form');
    var searchString = $('.phonebookSearchJs').val();

    if (validateForm($form)) {
        $.ajax({
            url: "/api/contacts/search",
            data: {search: searchString},
            dataType: 'json',
            type: 'POST',
            success: function (response) {

                if (!empty(response)){
                    renderPhonebook(response)
                } else {
                    $('.phonebookListJs').empty();
                }
            }
        });
    }

});


function processData($form) {
    return $form.serializeArray();
}

function validateForm(form) {
    var a = true;
    $(form.find('.requireJs')).each(function (k, v) {

        if (empty($(v).val())) {
            errorInput(v);
            a = false;
        }
    });
    return a;
}

function submitData(data) {
    $.ajax({
        url: "/api/contacts/create",
        data: {data:JSON.stringify(data.data)},
        dataType: 'json',
        type: 'POST',
        success: function (response) {
            if (response.error){
                console.log('Error:', response.error);
                alert(response.error);
            } else{
                addPhonebook(response);
                data.$form[0].reset();
            }
        }
    });
}

function errorInput(elem) {
    $(elem).addClass('input-error');
    setTimeout(function () {
        $(elem).removeClass('form__input_error');
    }, 2000);
}

function addPhonebook(contact) {
    var $phonebookListJs = $('.phonebookListJs');
    var phonebookElement = `<tr data-id="${contact.id}"><td class="phonebook-table__cell">${contact.name}</td><td class="phonebook-table__cell">${contact.phone}</td></tr>`;
    $phonebookListJs.prepend(phonebookElement)
}
function renderPhonebook(contact) {
    var $phonebookListJs = $('.phonebookListJs');
    var phonebookElement = '';
    contact.forEach(function (v) {
        phonebookElement += `<tr data-id="${v.id}"><td class="phonebook-table__cell">${v.name}</td><td class="phonebook-table__cell">${v.phone}</td></tr>`;
    });
    $phonebookListJs.html(phonebookElement)
}