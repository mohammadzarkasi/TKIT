function promptLogout() {
    var res = confirm('Anda akan keluar dari sistem informasi pendaftaran?');

    if (res == true) {
        document.location.href = base_url + '/admin/logout';
    }
}