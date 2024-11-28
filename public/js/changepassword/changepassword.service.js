class changePasswordService {
    async createData(e, checkingEdit) {
        let submitButton = $(e.target).find(':submit')
        try {
            const formData = new FormData(e.target)
            submitButton.attr('disabled', true)
            const response = await axios.post(`${appUrl}/v1/user-management/changePassword`, formData)
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
}

export default changePasswordService;