
class coremanagementService {
    async getAllData() {
        $('#dataTable').DataTable().destroy();
        $("#dataTable tbody").empty();

        let dataTable = $('#dataTable').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        })

        let tableBody = '';

        const response = await axios.get(`${appUrl}/v1/core-management`);
        const responseData = await response.data;

        $.each(responseData.data, function (index, item) {
            tableBody += "<tr>";
            tableBody += "<td>" + (index + 1) + "</td>";
            tableBody += "<td>" + item.name + "</td>";
            tableBody += "<td>" + item.jabatan + "</td>";
            tableBody += "<td><a href='https://" + item.link + "'>Lihat</a></td>";
            tableBody += `
            <td>
                <a href="${appUrl}/uploads/coremanagement/${item.photo}" target="_blank">
                    <img src="${appUrl}/uploads/coremanagement/${item.photo}" class="img-thumbnail" width="50" height="50">
                </a>
            </td>
            `;
            tableBody +=
                "<td   class='text-center '>" +
                "<button class='btn btn-outline-primary btn-sm edit-modal mr-1' data-toggle='modal' data-target='#coreManagementModal' data-id='" +
                item.id + "'><i class='fas fa-edit'></i></button>" +
                "<button type='submit' class='delete-confirm btn btn-outline-danger btn-sm' data-id='" +
                item.id + "'><i class='fas fa-trash-alt'></i></button>" +
                "</td>";
            tableBody += "</tr>";
        });

        dataTable.clear().draw();
        dataTable.rows.add($(tableBody)).draw();
    }

    async createData(e, checkingEdit) {
        let submitButton = $(e.target).find(':submit')
        try {
            const formData = new FormData(e.target)
            if (checkingEdit()) {
                const id = $('#id').val()
                const response = await axios.post(`${appUrl}/v1/core-management/update/${id}`, formData)
                const responseData = await response.data
                if (responseData.status === 'success') {
                    successUpdateAlert().then(() => {
                        $('#coreManagementModal').modal('hide')
                        this.getAllData()
                    })
                } else {
                    errorAlert()
                }
            } else {
                submitButton.attr('disabled', true)
                const response = await axios.post(`${appUrl}/v1/core-management/create`, formData)
                const responseData = await response.data
                console.log(responseData)
                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        $('#coreManagementModal').modal('hide')
                    })
                    this.getAllData()
                    submitButton.attr('disabled', false)
                } else {
                    errorAlert()
                    submitButton.attr('disabled', false)
                }
            }
        } catch (error) {
            submitButton.attr('disabled', false)
            console.log(error)
            if (error.response.data.message == 'Jabatan sudah ada') {
                jabatanAlert()
            } else if (error.response.status == 422) {
                warningAlert()
            } else {
                errorAlert()
            }
        };
    }


    async getDataById(id, checkingEdit) {
        try {
            const response = await axios.get(`${appUrl}/v1/core-management/get/${id}`)
            const responseData = await response.data
            $('#modal-title').html("Edit Data")
            $('#id').val(responseData.data.id)
            $('#name').val(responseData.data.name)
            $('#jabatan').val(responseData.data.jabatan)
            $('#link').val(responseData.data.link)
            generatePreviewImg('form-preview')
            $('#preview').attr('src', `${appUrl}/uploads/coremanagement/${responseData.data.photo}`);

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

            const fileUrl = `${appUrl}/uploads/coremanagement/${responseData.data.photo}`
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
                    const response = await axios.delete(`${appUrl}/v1/core-management/delete/${id}`)
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

export default coremanagementService;