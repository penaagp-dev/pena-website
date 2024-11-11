
class categoryService {
    async getAllData() {
        $('#dataTable').DataTable().destroy();
        $("#dataTable tbody").empty();

        let dataTable = $('#dataTable').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        })

        let tableBody = '';

        const response = await axios.get(`${appUrl}/v1/item_inventaris`);
        const responseData = await response.data;

        $.each(responseData.data, function (index, item) {
            tableBody += "<tr>";
            tableBody += "<td>" + (index + 1) + "</td>";
            tableBody += "<td>" + item.name_category + "</td>";
            tableBody +=
                "<td   class='text-center '>" +
                "<button class='btn btn-outline-primary btn-sm edit-modal mr-1' data-toggle='modal' data-target='#categoryModal' data-id='" +
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
                const response = await axios.post(`${appUrl}/v1/category/update/${id}`, formData)
                const responseData = await response.data
                if (responseData.status === 'success') {
                    successUpdateAlert().then(() => {
                        $('#categoryModal').modal('hide')
                        this.getAllData()
                    })
                } else {
                    errorAlert()
                }
            } else {
                submitButton.attr('disabled', true)
                const response = await axios.post(`${appUrl}/v1/category/create`, formData)
                const responseData = await response.data
                console.log(responseData)
                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        $('#categoryModal').modal('hide')
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
            if (error.response.data.name_category == 'Nama kategori sudah ada') {
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
            const response = await axios.get(`${appUrl}/v1/category/get/${id}`)
            const responseData = await response.data
            $('#modal-title').html("Edit Data")
            $('#id').val(responseData.data.id)
            $('#name_category').val(responseData.data.name_category)
            generatePreviewImg('form-preview')
            checkingEdit()
        } catch (error) {
            console.log(error)
        }
    }

    async deleteData(id) {
        try {
            deleteAlert().then(async (result) => {
                if (result.isConfirmed) {
                    const response = await axios.delete(`${appUrl}/v1/category/delete/${id}`)
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

export default categoryService;