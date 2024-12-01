class changePasswordService {
    async createData(e) {
        let submitButton = $(e.target).find(':submit')
        try {
            Swal.fire({
                title: 'Loading...',
                html: 'Please wait while processing...',
                allowOutsideClick: false,
                showCancelButton: false,
                showConfirmButton: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });

            const formData = new FormData(e.target)
            submitButton.attr('disabled', true)
            const response = await axios.post(`${appUrl}/v1/user-management/changePassword`, formData)
            const responseData = await response.data
            console.log(response)
            if (responseData.status === 'success') {
                successSettingPasswordAlert().then(() => {
                    window.location.href = `${appUrl}/cms/admin/login`
                })
                submitButton.attr('disabled', false)
            } else {
                errorAlert()
            }     
        } catch (error) {
            submitButton.attr('disabled', false)
            console.log(error)
            if (error.response.data.message == 'password lama anda salah') {
                oldPasswordAlert()
            } else if(error.response.data.data.password == 'The password field confirmation does not match.'){
                confirmPasswordAlert()
            } else if (error.response.status == 422) {
                warningAlert()
            }
        };
    }
}

export default changePasswordService;