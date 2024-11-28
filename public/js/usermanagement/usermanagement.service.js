
class UsermanagementService {
    async getAllData() {
        $('#dataTable').DataTable().destroy();
        $("#dataTable tbody").empty();

        let dataTable = $('#dataTable').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        })

        let tableBody = '';

        const response = await axios.get(`${appUrl}/v1/user-management`);
        const responseData = await response.data;

        $.each(responseData.data, function (index, item) {
            tableBody += "<tr>";
            tableBody += "<td>" + item.email + "</td>";
            tableBody += "<td>" + item.role + "</td>";
            tableBody +=
                "<td   class='text-center '>" +
                "<button class='btn btn-outline-primary btn-sm edit-modal mr-1' data-toggle='modal' data-target='#userManagementModal' data-id='" +
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
                const response = await axios.post(`${appUrl}/v1/user-management/update/${id}`, formData)
                const responseData = await response.data
                if (responseData.status === 'success') {
                    successUpdateAlert().then(() => {
                        $('#userManagementModal').modal('hide')
                        this.getAllData()
                    })
                } else {
                    errorAlert()
                }
            } else {
                submitButton.attr('disabled', true)
                const response = await axios.post(`${appUrl}/v1/user-management/create`, formData)
                const responseData = await response.data
                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        $('#userManagementModal').modal('hide')
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
            if (error.response.data.data.email == 'The email has already been taken.') {
                emailAlert()
            }else if (error.response.data.data.password == 'The password field must be at least 8 characters.'){
                minimumPasswordAlert()
            }else if (error.response.status == 422) {
                warningAlert()
            } else {
                errorAlert()
            }
        };
    }


    async getDataById(id, checkingEdit) {
        try {
            const response = await axios.get(`${appUrl}/v1/user-management/get/${id}`)
            const responseData = await response.data
            $('#modal-title').html("Edit Data")
            $('#id').val(responseData.data.id)
            $('#email').val(responseData.data.email)
            $('#role').val(responseData.data.role)

            checkingEdit()
        } catch (error) {
            console.log(error)
        }
    }

    async deleteData(id) {
            deleteAlert().then(async (result) => {
                try {
                    if (result.isConfirmed) {
                        const response = await axios.delete(`${appUrl}/v1/user-management/delete/${id}`)
                        const responseData = await response.data
                        console.log(response);

                        if (responseData.status === 'success') {
                            successDeleteAlert().then(() => {
                                this.getAllData()
                            })
                        }
                    }
                } catch (error) {
                    if (error.response.data.message === 'tidak bisa delete data') {
                        failedDeleteDataLoginAlert()
                    } else {
                        errorAlert()
                    }
                }
            })
    }
}

export default UsermanagementService;
