class borrowService {
    async getAllData() {
        $('#dataTable').DataTable().destroy();
        $("#dataTable tbody").empty();

        let dataTable = $('#dataTable').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        })

        let tableBody = '';

        const response = await axios.get(`${appUrl}/v1/borrow`);
        const responseData = await response.data;

        $.each(responseData.data, function (index, item) {
            tableBody += "<tr>";
            tableBody += "<td>" + (index + 1) + "</td>";
            tableBody += "<td>" + item.inventaris.name_inventaris + "</td>";
            tableBody += "<td>" + item.name_borrow + "</td>";
            tableBody += "<td>" + item.quantity + "</td>";
            tableBody += "<td>" + item.description + "</td>";
            tableBody +=
                "<td   class='text-center '>" +
                "<button class='return-confirm btn btn-outline-primary btn-sm' data-id='" +
                item.id + "'><i class='fas fa-arrow-left'></i></button>" +
                "</td>";
            tableBody += "</tr>";
        });


        dataTable.clear().draw();
        dataTable.rows.add($(tableBody)).draw();
    }


    async getdropdowninventaris () {
        // Ambil data inventaris
        const inventarisResponse = await axios.get(`${appUrl}/v1/item-inventaris`);
        const inventaris = inventarisResponse.data.data;

        // Set inventaris pada dropdown
        this.populateBorrowDropdown(inventaris);
    }

    // Fungsi untuk mengisi dropdown inventaris
    populateBorrowDropdown(inventaris) {
        const inventarisSelect = $('#id_inventaris');
        inventarisSelect.empty();
        inventarisSelect.append('<option value="" selected disabled hidden>Choose here</option>');

        $.each(inventaris, function(index, inventaris) {
            inventarisSelect.append(`<option value="${inventaris.id}">${inventaris.name_inventaris}</option>`);
        });
    }

    async createData(e, checkingEdit) {
        let submitButton = $(e.target).find(':submit')
        try {
            const formData = new FormData(e.target)
            if (checkingEdit()) {
                const id = $('#id').val()
                const response = await axios.post(`${appUrl}/v1/borrow/update/${id}`, formData)
                const responseData = await response.data
                console.log(responseData)
                if (responseData.status === 'succes') {
                    successUpdateAlert().then(() => {
                        $('#borrowModal').modal('hide')
                        this.getAllData()
                    })
                } 
            } else {
                submitButton.attr('disabled', true)
                const response = await axios.post(`${appUrl}/v1/borrow/Create`, formData)
                const responseData = await response.data
                console.log(responseData)
                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        $('#borrowModal').modal('hide')
                    })
                    this.getAllData()
                    submitButton.attr('disabled', false)
                } 
            }
        } catch (error) {
            submitButton.attr('disabled', false)
            console.log(error)
            if (error.response.data.message == 'barang di inventaris tidak cukup') {
                alertBorrowCount();
            } else if (error.response.status == 422) {
                warningAlert()
            } else {
                errorAlert()
            }
        };
    }


    async getDataById(id, checkingEdit) {
        try {
            const response = await axios.get(`${appUrl}/v1/borrow/get/${id}`)
            const responseData = await response.data
            console.log(response);

            $('#modal-title').html("Edit Data")
            $('#id').val(responseData.data.id)
            $('#id_inventaris').val(responseData.data.id_inventaris)
            $('#name_borrow').val(responseData.data.name_borrow)
            $('#quantity').val(responseData.data.quantity)
            $('#description').val(responseData.data.description)
            generatePreviewImg('form-preview')
            checkingEdit()
        } catch (error) {
            console.log(error)
        }
    }

    async returnBorrow(id) {
        confirmReturnAlert().then(async (result) => {
            try {
                if (result.isConfirmed) {
                    const response = await axios.post(`${appUrl}/v1/item-inventaris/returnborrow/${id}`)
                    const responseData = await response.data
                    console.log('Response : ', responseData);
                    if (responseData.status === 'success') {
                        successReturnAlert().then(() => {
                            reloadBrowser()
                            this.getAllData
                        })
                    } else {
                        errorAlert();
                    }
                }
            } catch (error) {
                console.log('Error: ', error)
                errorAlert()
            }
        })
    }
}

export default borrowService;
