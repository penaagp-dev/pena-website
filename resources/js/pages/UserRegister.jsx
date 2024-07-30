import React, { useState, useEffect } from 'react'
import coverImg from '../assets/img/cover.webp'
import BaseInput from '../components/Input/BaseInput'
import SelectInput from '../components/Input/SelectInput'
import CheckboxInput from '../components/Input/CheckboxInput'
import TextareaInput from '../components/Input/TextareaInput'
import axios from 'axios'
import { Link } from 'react-router-dom'
import RegisterModal from '../components/RegisterModal'
  
const UserRegister = () => {
    const [fullname, setFullname] = useState('')
    const [email, setEmail] = useState('')
    const [phone, setPhone] = useState('')
    const [dateOfBirth, setDateOfBirth] = useState('')
    const [religion, setReligion] = useState('')
    
    const [major, setMajor] = useState('')
    const [semester, setSemester] = useState('')
    const [gender, setGender] = useState('')

    const [photo, setPhoto] = useState('')
    const [address, setAddress] = useState('')
    const [reason, setReason] = useState('')

    const [alertMessage, setAlertMessage] = useState('')
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [alertTextEmail, setAlertTextEmail] = useState('')
    const [alertTextPhoto, setAlertTextPhoto] = useState('')
    const today = new Date().toISOString().split('T')[0];

    const getId = id => document.getElementById(id)
    
    const openModal = (type) => {

        getId('loadingModal').classList.add('hidden')
        getId('successModal').classList.add('hidden')
        getId('alertModal').classList.add('hidden')

        type === 'loading' ? getId('loadingModal').classList.remove('hidden') : null
        type === 'success' ? getId('successModal').classList.remove('hidden') : null
        type === 'alert' ? getId('alertModal').classList.remove('hidden') : null

        setIsModalOpen(true)
    }

    const closeModal = () => setIsModalOpen(false);

    const redInput = (id, isActive = true) => {
        getId(id).classList[isActive ? 'add' : 'remove']('ring-red-500')
    }

    const handleInput = (e) => {
        const { name, value } = e.target;
        switch (name) {
            case 'nama lengkap': setFullname(value); break;
            case 'email': setEmail(value); break;
            case 'nomor whatsApp': if (/^\d*$/.test(value) && value.length <= 14) setPhone(value); break;
            case 'tanggal lahir': setDateOfBirth(value); break;
            case 'agama': setReligion(value); break;

            case 'jurusan': setMajor(value); break;
            case 'semester': setSemester(value); break;
            case 'gender': setGender(value); break;

            case 'alamat lengkap': setAddress(value); break;
            case 'alasan bergabung': setReason(value); break;

            default: break;
        }
    };

    const handleInputFile = (e) => {
        const imageSelect = e.target.files[0]
        let fileName = imageSelect.name.split('.')
        let fileFormat = fileName.pop();

        if (fileFormat === 'png' || fileFormat === 'jpg' || fileFormat === 'jpeg') {
            setPhoto(imageSelect)
            redInput('foto pribadi', false)
            setAlertTextPhoto('')
        } else {
            setAlertTextPhoto('Gunakan file dengan format png, jpg, atau jpeg')
        }

    };

    const checkPerInput = (value, idInput) => {
        const inputValue = value
        !inputValue ? redInput(idInput) : redInput(idInput, false)
        
        if (idInput === 'email') {
            !email.includes('@gmail.com') ? redInput(idInput) : redInput(idInput, false)
            !email.includes('@gmail.com') ? setAlertTextEmail('Email tidak valid') : setAlertTextEmail('')
        }

    }

    const handleCheckbox = (e, id1, id2) => {
        handleInput(e)
        redInput(id1, false)
        redInput(id2, false)
    }
    
    const checkValidation = () => {
        !fullname ? redInput('nama lengkap') : null
        !email ? redInput('email') : null
        !phone ? redInput('nomor whatsApp') : null
        !dateOfBirth ? redInput('tanggal lahir') : null
        !religion ? redInput('agama') : null

        if (!major) { redInput('Teknik informatika'); redInput('Sistem informasi') }
        if (!semester) { redInput('1'); redInput('3') }
        if (!gender) { redInput('male'); redInput('female') }

        !photo ? redInput('foto pribadi') : null
        !address ? redInput('alamat lengkap') : null
        !reason ? redInput('alasan bergabung'): null

        if (!fullname || !email || !phone || !dateOfBirth || !religion || !major || !semester || !gender || !address || !reason || !photo) {
            setAlertMessage('Periksa dan lengkapi data dirimu!')
            return false
        } else if (!email.includes('@gmail.com')) {
            setAlertTextEmail('Email tidak valid')
            setAlertMessage('Email yang kamu masukan tidak valid!')
            return false
        } else if (phone.length < 12 || phone.length > 14) {
            redInput('nomor whatsApp')
            setAlertMessage('Periksa kembali nomor WhatsApp mu!')
            return false
        } {
            return true
        }
    }

    const executeRegisterCa = async () => {
        const formData = new FormData();
        formData.append('name', fullname)
        formData.append('email', email)
        formData.append('phone', phone)
        formData.append('date_of_birth', dateOfBirth)
        formData.append('religion', religion)

        formData.append('major', major)
        formData.append('semester', semester)
        formData.append('gender', gender)

        formData.append('photo', photo)
        formData.append('address', address)
        formData.append('reason_register', reason)

        await axios.post('/api/v1/register-ca', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
    }

    const registerCa = async () => {
        try {
            const statusValidation = checkValidation()
    
            if (statusValidation) {
                openModal('loading')

                await executeRegisterCa()   /* <-- send data */

                closeModal()
                openModal('success')
            } else {
                openModal('alert')
            }

        } catch (error) {
            if (error && !error.response.data.data.email[0]) {
                setAlertMessage('Mohon hubungi panitia!')
            } else if (error.response.data.data.email[0]) {
                setAlertMessage('Email sudah terdaftar! gunakan yang lain.')
            } else {
                setAlertMessage('Mohon hubungi panitia!')
            }

            openModal('alert')
        }
    }

    useEffect(() => { checkPerInput(dateOfBirth, 'tanggal lahir') }, [dateOfBirth])
    useEffect(() => { checkPerInput(religion, 'agama') }, [religion])

    useEffect(() => {
        redInput('tanggal lahir', false)
        redInput('agama', false)
    }, [])

    return (
        <>
            <div className="flex items-center justify-center w-full min-h-screen bg-center bg-cover p-0" style={{backgroundImage: `url(${coverImg})`}}>
                <div className="w-full max-w-80 max-h-fit sm:max-w-md md:max-w-xl h-fit bg-transparent px-8 py-4 my-4 rounded-lg shadow-lg backdrop-blur-lg border overflow-hidden">

                    <h2 className="text-2xl font-bold mb-8 text-center text-gray-100">Register Form</h2>
                    
                    <div>
                        <BaseInput
                            name='nama lengkap'
                            onChange={handleInput}
                            onKeyUp={() => checkPerInput(fullname, 'nama lengkap')}
                        />

                        <BaseInput
                            name='email'
                            type='email'
                            onChange={handleInput}
                            onKeyUp={() => checkPerInput(email, 'email')}
                            alertText={alertTextEmail}
                        />

                        <BaseInput
                            name='nomor whatsApp'
                            onChange={handleInput}
                            value={phone}
                            onKeyUp={() => checkPerInput(phone, 'nomor whatsApp')}
                        />

                        <BaseInput
                            name='tanggal lahir'
                            type='date'
                            onChange={handleInput}
                            max={today}
                        />

                        <SelectInput name='agama' onChange={handleInput} value={religion}>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="kindu">Hindu</option>
                            <option value="budha">Budha</option>
                            <option value="konghucu">Konghucu</option>
                        </SelectInput>

                        <CheckboxInput
                            onChange={(e) => handleCheckbox(e, 'Teknik informatika', 'Sistem informasi')}
                            name='jurusan'
                            value1='Teknik informatika'
                            value2='Sistem informasi'
                        />

                        <CheckboxInput
                            onChange={(e) => handleCheckbox(e, '1', '3')}
                            name='semester'
                            value1='1'
                            value2='3'
                        />
                        
                        <CheckboxInput
                            onChange={(e) => handleCheckbox(e, 'male', 'female')}
                            name='gender'
                            value1='male'
                            valueName1='laki-laki'
                            value2='female'
                            valueName2='perempuan'
                        />
                        
                        <BaseInput
                            name='foto pribadi'
                            type='file'
                            onChange={handleInputFile}
                            alertText={alertTextPhoto}
                        />

                        <BaseInput
                            name='alamat lengkap'
                            onChange={handleInput}
                            onKeyUp={() => checkPerInput(address, 'alamat lengkap')}
                        />

                        <TextareaInput
                            name='alasan bergabung'
                            onChange={handleInput}
                            onKeyUp={() => checkPerInput(reason, 'alasan bergabung')}
                        />

                        <div className="flex justify-between pt-4">
                            <Link to={'/'}>
                                <button className="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 duration-200">
                                    <i className="fa-solid fa-angle-left mr-2"></i>
                                    <span>Back</span>
                                </button>
                            </Link>
                            <button onClick={registerCa} className="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 duration-200" >
                                <span>Submit</span>
                                <i className="fa-solid fa-paper-plane ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <RegisterModal show={isModalOpen} onClose={closeModal} alertMessage={alertMessage} />
        </>
    )
}

export default UserRegister