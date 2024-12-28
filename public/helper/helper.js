function successAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Data berhasil ditambahkan',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    })
}

function successLogin() {
    return Swal.fire({
        title: 'Success',
        text: 'Login berhasil',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    })
}

function returnAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Success Mengembalikan',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    })
}


function successReturnAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Success Mengembalikan',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    })
}


function successUpdateAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Data berhasil diperbaharui',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    })
}

function successSettingPasswordAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Password berhasil diperbaharui',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK',
    })
}

function errorAlert() {
    Swal.fire({
        title: 'Error!',
        text: 'Terjadi kesalahan',
        icon: 'error',
        timer: 5000,
        showConfirmButton: true
    });
}

function failedDeleteDataLoginAlert() {
    Swal.fire({
        title: 'Peringatan',
        text: 'Tidak bisa delete diri sendiri!',
        icon: 'warning',
        timer: 5000,
        showConfirmButton: true
    });
}

function warningAlert() {
    Swal.fire({
        title: 'Peringatan',
        text: 'Periksa kembali inputan anda !',
        icon: 'warning',
        timer: 5000,
        showConfirmButton: true
    });
}

function deleteAlert() {
    return Swal.fire({
        title: 'Hapus ?',
        text: 'Anda tidak dapat mengembalikan  ini',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya',
        reverseButtons: true,
    })
}

function exportAlert() {
    return Swal.fire({
        title: 'Export ?',
        text: 'Hanya data dengan status approved yang akan di export',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya',
        reverseButtons: true,
    })
}

function successDeleteAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Data berhasil dihapus',
        icon: 'success',
        timer: 5000,
        showConfirmButton: true
    })
}

function emailOrPasswordWrong() {
    Swal.fire({
        title: 'Peringatan',
        text: 'Email atau password anda salah !',
        icon: 'warning',
        timer: 5000,
        showConfirmButton: true
    });
}

function jabatanAlert() {
    Swal.fire({
        title: 'Peringatan',
        text: 'Data dengan jabatan ini sudah ada silahkan pilih yang lain !',
        icon: 'warning',
        timer: 5000,
        showConfirmButton: true
    });
}

function emailAlert() {
    Swal.fire({
        title: 'Peringatan',
        text: 'Email sudah ada sebelumnya silahkan gunakan email lain !',
        icon: 'warning',
        timer: 5000,
        showConfirmButton: true
    });
}

function minimumPasswordAlert(){
    Swal.fire({
        title: 'peringatan',
        text: 'password minimal 8 karakter',
        icon: 'warning',
        timer: 5000,
    })
}

function oldPasswordAlert(){
    Swal.fire({
        title: 'peringatan',
        text: 'password lama anda salah',
        icon: 'warning',
        timer: 5000,
    })
}

function confirmPasswordAlert(){
    Swal.fire({
        title: 'peringatan',
        text: 'password harus sama',
        icon: 'warning',
        timer: 5000,
    })
}
function borrowAlert(){
    Swal.fire({
        title: 'peringatan',
        text: 'barang masih di pinjam',
        icon: 'warning',
        timer: 5000,
    })
}
<<<<<<< HEAD

function warningDeleteCategoryAlert() {
    Swal.fire({
        title: 'Peringatan',
        text: 'Data sedang digunakan pada inventaris!',
        icon: 'warning',
        timer: 5000,
        showConfirmButton: true
    });
}
=======
>>>>>>> e68741b0efa6a51c81e6a41072f9189bcd296636

$(document).ready(function () {
    $.validator.addMethod("fileExtension", function (value, element) {
        return this.optional(element) || /\.(jpg|jpeg|png)$/i.test(value);
    },
        "Format file harus jpg, jpeg, png"
    );
});

function insertLineBreaks(text, wordsPerLine) {
    const words = text.split(' ');
    let newText = '';
    let wordCount = 0;

    for (let i = 0; i < words.length; i++) {
        newText += words[i] + ' ';
        wordCount++;

        if (wordCount === wordsPerLine) {
            newText += '<br>';
            wordCount = 0;
        }
    }

    return newText.trim();
}

function generatePreviewImg(previewContainerId){
    if ($(`#${previewContainerId} #preview`).length === 0) {
        $(`#${previewContainerId}`).html('<div class="text-center"><img src="" alt="" id="preview" class="mx-auto d-block pb-2" style="max-width: 200px; padding-top: 23px"></div>');
    }
}

function generateFormStatus(statusContainerId) {
    console.log('Generating form status for:', statusContainerId);
    if ($(`#${statusContainerId} #status`).length === 0) {
        $(`#${statusContainerId}`).html(
            `<div class="form-group fill form-show-validation" id="form-status">
                <label>Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="" selected disabled hidden>Choose here</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>`
        );
    }
}
