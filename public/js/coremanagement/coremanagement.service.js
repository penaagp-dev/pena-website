
class coremanagementService {
    async getAllData() {
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
            tableBody += `
            <td>
                <a href="${appUrl}/uploads/coremanagement/${item.photo}" target="_blank">
                    <img src="${appUrl}/uploads/coremanagement/${item.photo}" class="img-thumbnail" width="50" height="50">
                </a>
            </td>
            `;
            tableBody +=
                "<td   class='text-center '>" +
                "<button class='btn btn-outline-primary btn-sm edit-modal mr-1' data-toggle='modal' data-target='#userModal' data-id='" +
                item.id + "'><i class='fas fa-edit'></i></button>" +
                "<button type='submit' class='delete-confirm btn btn-outline-danger btn-sm' data-id='" +
                item.id + "'><i class='fas fa-trash-alt'></i></button>" +
                "</td>";
            tableBody += "</tr>";
        });

        dataTable.clear().draw();
        dataTable.rows.add($(tableBody)).draw();
        console.log(responseData);
    }
}

export default coremanagementService;