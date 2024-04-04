document.getElementById('followers').addEventListener('click', function () {
    $('#followersModal').modal('show');
});
document.getElementById('followings').addEventListener('click', function () {
    $('#followingsModal').modal('show');
});
document.querySelectorAll('.btn-close').forEach(function (btn) {
    btn.addEventListener('click', function () {
        $('#followersModal').modal('hide');
        $('#followingsModal').modal('hide');
    });
});