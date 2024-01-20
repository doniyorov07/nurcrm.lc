$('#create-button').on('click', function (event){
    event.preventDefault();
    var  url = $(this).attr('href');
    $('#myModal').modal('show');
    send(url);
})

function send(_url, formData = null){
    $.ajax({
        url: _url,
        type: 'POST',
        dataType: "json",
        data: formData,
        success:function (data){
            if (data.status === false) {
                $('#myModal').modal('show').find('#modalContent').html(data.content);
                $('#save').on('click', function (e) {
                    e.preventDefault();
                    var form = $('#form-id').serialize();
                    send(_url, form);
                    return false
                });
                return false;
            }else {
                $.pjax.reload({container:"#prl-pjax"})
                $('#myModal').modal('hide');
            }

        }
    })
}
$('body').on('click', '.update-edit', function (event){
    event.preventDefault();
    var url = $(this).attr('href');
    $('#myModal').modal('show');
    send(url);
});