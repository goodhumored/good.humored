require('./bootstrap');
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