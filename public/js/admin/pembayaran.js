function promptVerifikasi(id)
{
    var res = confirm('Anda yakin bahwa data pembayaran ini benar?');

    if(res == true)
    {
        var form = $('#mp-form');
        form.html();
        form.append($('<input/>').attr({type:'hidden', name:'_token'}).val(___csrf));
        form.append($('<input/>').attr({type:'hidden', name:'id'}).val(id));
        form.attr({action: base_url + '/admin/pembayaran/verifikasi', method: 'post'});
        form.submit();
    }
}