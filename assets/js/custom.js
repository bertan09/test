$(document).ready(function() {


});

function deleteCustomer(url) {
    Swal.fire({
        title: 'Emin misiniz?',
        text: "Silme işlemi geri alınamaz!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sil !',
        cancelButtonText: 'Vazgeç'
    }).then((result) => {
        if (result.value) {
            window.location.href = "customers/delete/" +url;
        }
    })
}
