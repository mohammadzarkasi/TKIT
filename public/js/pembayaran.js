function promptHapus(id)
{
    var res = confirm('Anda akan menghapus data pembayaran ini?');
    if(res == true)
    {
        var form = $('#mp-form');
        form.html();
        form.append($('<input/>').attr({type:'hidden', name:'_token'}).val(___csrf));
        form.append($('<input/>').attr({type:'hidden', name:'id'}).val(id));
        form.attr({action: base_url + '/pembayaran/hapus', method: 'post'});
        form.submit();
    }
}