import React from 'react'
import joinUsImg from '../assets/img/join-us.jpeg'
import BaseButton from '../components/BaseButton'
import { Link } from 'react-router-dom'

const JoinsUs = () => {
    return (
        <div className="py-28 px-8 md:px-16 bg-cover bg-center relative" style={{backgroundImage: `url(${joinUsImg})`}}>
            <div className="absolute inset-0  bg-slate-950 bg-opacity-60"></div>
            <div className="container mx-auto text-center relative">
                <h1 className="text-3xl md:text-4xl font-bold mb-4 text-white">Kamu Siap Menjadi Generasi Selanjutnya?</h1>
                <p className="text-lg mb-8 text-white">
                    Bergabung untuk kembangkan skill IT mu dan buka peluang karier di dunia teknologi!
                </p>
                <Link to={'/wait'}>
                    <BaseButton title="Yeah, Aku Siap" />
                </Link>
            </div>
        </div>
    )
}

export default JoinsUs
