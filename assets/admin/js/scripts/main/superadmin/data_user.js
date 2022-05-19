function hapus(id_user)
{
    Swal.fire({
        title: 'HAPUS DATA?',
        text: "Apakah Ingin Menghapus Data Ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        confirmButtonClass: 'btn btn-warning ml-1',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
            }).then(function (result) {
        if (result.value) {
            window.location = "<?php echo base_url('superadmin/data_user/hapus/') ?>" + id_user;
        }
        else{
            var isRtl = $('html').attr('data-textdirection') === 'rtl';
            $(document).ready(function(){
        toastr['warning']('Data tidak terhapus', 'Cancel', { rtl: isRtl, positionClass: 'toast-top-center',showMethod: 'fadeIn', hideMethod: 'fadeOut', timeOut: 2000, });
            });
        }
    })
    // swal({
    //     title: "Hapus Data?",
    //     text: "Once deleted, you will not be able to recover this imaginary file!",
    //     icon: "warning",
    //     buttons: true,
    //     dangerMode: true,
    //     })
    //     .then((willDelete) => {
    //     if (willDelete) {
    // window.location = "<?php echo base_url('superadmin/data_user/hapus/') ?>" + id_user;
    //     } else {
    // var isRtl = $('html').attr('data-textdirection') === 'rtl';
    // $(document).ready(function(){
    //     toastr['warning']('Data tidak terhapus', 'Cancel', { rtl: isRtl, positionClass: 'toast-top-center',showMethod: 'fadeIn', hideMethod: 'fadeOut', timeOut: 2000, });
    // });
    //     }
    // });
}