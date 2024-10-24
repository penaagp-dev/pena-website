class authService {
    async login(e) {
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

            const formData = new FormData(e.target);
            const response = await axios.post(`${appUrl}/v1/login`, formData)
            const responseData = await response.data
            if(responseData.status === 'success'){
                successLogin().then(() => {
                    window.location.href = `${appUrl}/cms/admin/`
                })
            }
            console.log(response)
        } catch (error) {
            if (error.response.data.message == "Unauthorized") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Login Gagal',
                    text: 'Email atau Password anda salah',
                    showConfirmButton: true,
                })
            } else if (error.response.status == 422) {
                warningAlert()
            } else {
                errorAlert()
            }
        };
        
    }
}

export default authService;