class inventarisService {
    async getAllData() {
        $('#dataTable').DataTable().destroy();
        $("#dataTable tbody").empty();
  
        let dataTable = $('#dataTable').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        })
  
        let tableBody = '';
  
        // Ambil data kategori
        const categoryResponse = await axios.get(`${appUrl}/v1/category`);
        const categories = categoryResponse.data.data;
  
        // Ambil data inventaris
        const response = await axios.get(`${appUrl}/v1/item-inventaris`);
        const responseData = await response.data;
        console.log(responseData)
  
        $.each(responseData.data, function (index, item) {
            tableBody += "<tr>";
            tableBody += "<td>" + (index + 1) + "</td>";
            tableBody += "<td>" + item.name_inventaris + "</td>";
            tableBody += "<td>" + item.stock + "</td>";
            tableBody += "<td>" + item.location_item + "</td>";
            tableBody += "<td>" + item.category.name_category + "</td>";
            tableBody += "<td>" + item.status + "</td>";
            tableBody += "<td>" + item.is_condition + "</td>";
            tableBody += "<td>" + item.description + "</td>";
            tableBody += ` 
            <td>
                <a href="${appUrl}/uploads/inventaris/${item.img_inventaris}" target="_blank">
                    <img src="${appUrl}/uploads/inventaris/${item.img_inventaris}" class="img-thumbnail" width="50" height="50">
                </a>
            </td>`;
            tableBody += 
                "<td class='text-center'>" +
                "<button class='btn btn-outline-primary btn-sm edit-modal mr-1' data-toggle='modal' data-target='#inventarisModal' data-id='" + 
                item.id + "'><i class='fas fa-edit'></i></button>" +
                "<button type='submit' class='delete-confirm btn btn-outline-danger btn-sm' data-id='" + 
                item.id + "'><i class='fas fa-trash-alt'></i></button>" +
                "</td>";
            tableBody += "</tr>";
        });
  
        dataTable.clear().draw();
        dataTable.rows.add($(tableBody)).draw();
  
        // Set kategori pada dropdown
        this.populateCategoryDropdown(categories);
    }
  
    // Fungsi untuk mengisi dropdown kategori
    populateCategoryDropdown(categories) {
        const categorySelect = $('#id_category');
        categorySelect.empty();
        categorySelect.append('<option value="" selected disabled hidden>Choose here</option>'); 
  
        $.each(categories, function(index, category) {
            categorySelect.append(`<option value="${category.id}">${category.name_category}</option>`);
        });
    }
  
    async createData(e, checkingEdit) {
        let submitButton = $(e.target).find(':submit');
        try {
            const formData = new FormData(e.target);
            if (checkingEdit()) {
                const id = $('#id').val();
                const response = await axios.post(`${appUrl}/v1/item-inventaris/update/${id}`, formData);
                const responseData = await response.data;
                if (responseData.status === 'success') {
                    successUpdateAlert().then(() => {
                        $('#inventarisModal').modal('hide');
                        this.getAllData();
                    });
                } else {
                    errorAlert();
                }
            } else {
                submitButton.attr('disabled', true);
                const response = await axios.post(`${appUrl}/v1/item-inventaris/create`, formData);
                const responseData = await response.data;
                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        $('#inventarisModal').modal('hide');
                    });
                    this.getAllData();
                    submitButton.attr('disabled', false);
                } else {
                    errorAlert();
                    submitButton.attr('disabled', false);
                }
            }
        } catch (error) {
            submitButton.attr('disabled', false);
            console.log(error);
            if (error.response.data.name_inventaris == 'Nama barang sudah ada') {
                jabatanAlert();
            } else if (error.response.status == 422) {
                warningAlert();
            } else {
                errorAlert();
            }
        };
    }
  
    async getDataById(id, checkingEdit) {
        try {
            const response = await axios.get(`${appUrl}/v1/item-inventaris/get/${id}`);
            const responseData = await response.data;
            
            $('#modal-title').html("Edit Data");
            $('#id').val(responseData.data.id);
            $('#name_inventaris').val(responseData.data.name_inventaris);
            $('#stock').val(responseData.data.stock);
            $('#location_item').val(responseData.data.location_item);
            $('#is_condition').val(responseData.data.is_condition);
            $('#description').val(responseData.data.description);
            $('#preview').attr('src', `${appUrl}/uploads/inventaris/${responseData.data.img_inventaris}`);

            $('#img_inventaris').on('change', function () {
                let file = this.files[0]
                let reader = new FileReader()
                reader.onload = function (e) {
                    generatePreviewImg('form-preview')
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(file)
                $(this).valid()
            })

            const fileUrl = `${appUrl}/uploads/inventaris/${responseData.data.img_inventaris}`
            const fileNames = fileUrl.split('/').pop()
            const blob = await fetch(fileUrl).then(r => r.blob());
            const file = new File([blob], fileNames, { type: blob.type });
            const fileList = new DataTransfer();
            fileList.items.add(file);
            $('#img_inventaris').prop('files', fileList.files);

  
            // Populate category dropdown
            const categoryResponse = await axios.get(`${appUrl}/v1/category`);
            const categories = categoryResponse.data.data;
            this.populateCategoryDropdown(categories); // Populate the dropdown
            $('#id_category').val(responseData.data.id_category); // Select the current category
  
            checkingEdit();
        } catch (error) {
            console.log(error);
        }
    }
  
    async deleteData(id) {
        deleteAlert().then(async (result) => {
            try {
                if (result.isConfirmed) {
                    const response = await axios.delete(`${appUrl}/v1/item-inventaris/delete/${id}`)
                    const responseData = await response.data
                    console.log(response);

                    if (responseData.status === 'success') {
                        successDeleteAlert().then(() => {
                            this.getAllData()
                        })
                    }
                }
            } catch (error) {
                if (error.response.data.message === 'barang masih di pinjam') {
                    borrowAlert()
                } else {
                    errorAlert()
                }
            }
        })
    }
  }
  
  export default inventarisService;
  