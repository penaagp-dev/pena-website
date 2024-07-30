import React from 'react'
import Loading from './Loading'
import { Link } from 'react-router-dom'

const RegisterModal = ({show, onClose, alertMessage}) => {
    const BackButton = () => {
        return (
            <div className='w-full flex justify-center mt-8'>
                <button onClick={onClose} className="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 duration-200 text-sm">
                    Kembali
                </button>
            </div>
        )
    }

    return (
        <div className={`fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center transition-opacity duration-300 ${show ? 'opacity-100' : 'opacity-0 pointer-events-none'}`}>
            <div className={`bg-white p-6 rounded shadow-lg w-1/3 transform transition-transform duration-300 ${show ? 'scale-100' : 'scale-95'}`}>
                
                <div id='loadingModal'>
                    <Loading/>
                    <p className="mt-6 text-lg text-center">Mohon tunggu sebentar yaa 😊</p>
                </div>

                <div id='successModal' className='text-center'>
                    <i className="fa-solid fa-check text-6xl text-green-500"></i>
                    <p className='mt-4 mb-1 text-lg font-semibold'>Yeay, kamu berhasil mendaftar!</p>
                    <p>Silahkan periksa <b><i>email</i></b> mu untuk bergabung ke grub WhatsApp!</p>

                    <Link to={'/'}>
                        {BackButton()}
                    </Link>
                </div>

                <div id='alertModal' className='text-center'>
                    <i className="fa-solid fa-circle-exclamation text-6xl text-orange-500"></i>
                    <p className='mt-4 mb-1 text-lg font-semibold'>Ups, terjadi kesalahan!</p>
                    <p>{alertMessage}</p>

                    {BackButton()}
                </div>

            </div>
        </div>
    );
}

export default RegisterModal
