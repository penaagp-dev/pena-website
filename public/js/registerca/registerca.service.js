class registerCaService {
    async getAllData() {
        try {
            $('#dataTable').DataTable().destroy()
            $('#dataTable tbody').empty()

            let dataTable = $('#dataTable').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            })

            let tableBody = '';

            const response = await axios.get(`${appUrl}/v1/register-ca/`)
            const responseData = await response.data
            console.log(responseData)
            $.each(responseData.data, function (index, item) {

                let gender = item.gender == 'male' ? 'Laki-laki' : 'Perempuan'


                tableBody += "<tr>";
                tableBody += "<td>" +
                    "<div><span class='font-weight-bold'>Nama:</span> " + item.name + "</div>" +
                    "<div><span class='font-weight-bold'>Tanggal Lahir:</span> " + item.date_of_birth + "</div>" +
                    "<div><span class='font-weight-bold'>Email:</span> " + item.email + "</div>" +
                    "<div><span class='font-weight-bold'>Phone:</span> " + item.phone + "</div>" +
                    "<div><span class='font-weight-bold'>Jenis Kelamin:</span> " + gender + "</div>" +
                    "</td>";
                tableBody += "<td>" +
                    "<div><span class='font-weight-bold'>Jurusan:</span> " + item.major + "</div>" +
                    "<div><span class='font-weight-bold'>Semester:</span> " + item.semester + "</div>" +
                    "</td>";
                tableBody += "<td>" + item.reason_register + "</td>";
                tableBody += "<td>" + item.religion + "</td>";
                tableBody += `
                <td>
                    <a href="${appUrl}/uploads/registerca/${item.photo}" target="_blank">
                        <img src="${appUrl}/uploads/registerca/${item.photo}" class="img-thumbnail" width="50" height="50">
                    </a>
                </td>
                `;
                tableBody += item.status === 'pending' ?
                    '<td><div class="bg-warning text-white text-center d-flex align-items-center justify-content-center" style="border-radius: 50rem!important; width: 80px; height: 30px; display: flex; justify-content: center; align-items: center; margin: 0 auto;">Pending</div></td>' :
                    item.status === 'approved' ?
                        '<td><div class="bg-success text-white text-center d-flex align-items-center justify-content-center" style="border-radius: 50rem!important; width: 80px; height: 30px; display: flex; justify-content: center; align-items: center; margin: 0 auto;">Approved</div></td>' :
                        item.status === 'rejected' ?
                            '<td><div class="bg-danger text-white text-center d-flex align-items-center justify-content-center" style="border-radius: 50rem!important; width: 80px; height: 30px; display: flex; justify-content: center; align-items: center; margin: 0 auto;">Rejected</div></td>' :
                            '<td>' + item.status + '</td>';
                tableBody +=
                    "<td   class='text-center '>" +
                    "<button class='btn btn-outline-primary btn-sm edit-modal mr-1' data-toggle='modal' data-target='#registerCaModal' data-id='" +
                    item.id + "'><i class='fas fa-edit'></i></button>" +
                    "<button type='submit' class='delete-confirm btn btn-outline-danger btn-sm' data-id='" +
                    item.id + "'><i class='fas fa-trash-alt'></i></button>" +
                    "</td>";
                tableBody += "</tr>";
            });

            dataTable.clear().draw();
            dataTable.rows.add($(tableBody)).draw();
        } catch (error) {
            console.log(error)
        }
    }

    async createData(e, checkingEdit) {
        const submitButton = $(e.target).find(':submit')
        try {
            const formData = new FormData(e.target)
            if (checkingEdit()) {
                submitButton.attr('disabled', true)
                const id = $('#id').val()
                const response = await axios.post(`${appUrl}/v1/register-ca/update/${id}`, formData)
                const responseData = await response.data
                if (responseData.status === 'success') {
                    successUpdateAlert().then(() => {
                        $('#registerCaModal').modal('hide')
                        this.getAllData()
                    })
                    submitButton.attr('disabled', false)
                } else {
                    submitButton.attr('disabled', false)
                    errorAlert()
                }
            } else {
                submitButton.attr('disabled', true)
                const response = await axios.post(`${appUrl}/v1/register-ca/create`, formData)
                const responseData = await response.data
                console.log(responseData)
                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        $('#registerCaModal').modal('hide')
                    })
                    this.getAllData()
                    submitButton.attr('disabled', false)
                }
            }
        } catch (error) {
            submitButton.attr('disabled', false)
            console.log(error)
            if (error.response.data.data.email == "The email has already been taken.") {
                emailAlert()
            } else if (error.response.status == 422) {
                warningAlert()
            } else {
                errorAlert()
            }
        };

    }

    async getDataById(id, checkingEdit) {
        try {
            const response = await axios.get(`${appUrl}/v1/register-ca/get/${id}`)
            const responseData = await response.data
            $('#modal-title').html("Edit Data")
            $('#id').val(responseData.data.id)
            $('#name').val(responseData.data.name)
            $('#date_of_birth').val(responseData.data.date_of_birth)
            $('#email').val(responseData.data.email)
            $('#phone').val(responseData.data.phone)
            $('#major').val(responseData.data.major)
            $('#semester').val(responseData.data.semester)
            $('#gender').val(responseData.data.gender)
            $('#religion').val(responseData.data.religion)
            $('#reason_register').val(responseData.data.reason_register)
            $('#address').val(responseData.data.address)
            $('#status').val(responseData.data.status)
            generatePreviewImg('form-preview')
            $('#preview').attr('src', `${appUrl}/uploads/registerca/${responseData.data.photo}`);

            $('#photo').on('change', function () {
                let file = this.files[0]
                let reader = new FileReader()
                reader.onload = function (e) {
                    generatePreviewImg('form-preview')
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(file)
                $(this).valid()
            })

            const fileUrl = `${appUrl}/uploads/registerca/${responseData.data.photo}`
            const fileNames = fileUrl.split('/').pop()
            const blob = await fetch(fileUrl).then(r => r.blob());
            const file = new File([blob], fileNames, { type: blob.type });
            const fileList = new DataTransfer();
            fileList.items.add(file);
            $('#photo').prop('files', fileList.files);

            checkingEdit()
        } catch (error) {
            console.log(error)
        }
    }

    async deleteData(id) {
        try {
            deleteAlert().then(async (result) => {
                if (result.isConfirmed) {
                    const response = await axios.delete(`${appUrl}/v1/register-ca/delete/${id}`)
                    const responseData = await response.data
                    if (responseData.status === 'success') {
                        successDeleteAlert().then(() => {
                            this.getAllData()
                        })
                    } else {
                        errorAlert()
                    }
                }
            })
        } catch (error) {
            errorAlert()
        }
    }
}

export default registerCaService;