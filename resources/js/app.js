//require('./bootstrap');

function show_toast(type, message) {
    let el = $('#'+type+'Toast')[0].cloneNode(true);
    $(el).find('.toast-body').text(message);
    $(el).on('hidden.bs.toast', (e)=>{
        e.target.remove();
    });
    $('.toast-container')[0].appendChild(el);
    new bootstrap.Toast(el).show();
}

function show_form_error(form, msg) {
    a = $(form).find('.alert');
    a.text(msg);
    a.removeClass('d-none');
}

$('.msg_form').submit((e)=>{
    e.preventDefault();
    fd = new FormData(e.target);
    $.ajax({
        type: "post",
        url: e.target.getAttribute('action'),
        data: fd,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response)
        }
    });
})

$('.auth_form').submit((e)=>{
    e.preventDefault();
    fd = new FormData(e.target);
    $.ajax({
        type: e.target.getAttribute('method'),
        url: e.target.getAttribute('action'),
        data: fd,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response['success']) {
                show_toast('succ', response['message']);
                document.location.reload();
            } else {
                show_form_error(e.target, response['message']);
            }
        },
        error: function(xhr, s, t) {
            show_form_error(e.target, xhr.messageJson['message']);
        }
    });
})

if (messages != null) {
    messages.forEach(element => {
        show_toast(element[0], element[1]);
    });
}