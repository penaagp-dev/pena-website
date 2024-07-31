import React from 'react'

const BaseText = (props) => {
    return (
        <div className={`w-full lg:w-5/12 px-4 ${props.className}`}>
            <h1 className="font-bold text-center text-2xl uppercase text-black mb-5 dark:text-white">{props.title}</h1>
            <p className="text-center text-base lg:text-lg dark:text-white">{props.description}</p>
        </div>
    )
}

const VisiMisi = () => {
    return (
        <div className="py-16 px-8 md:px-16 dark:bg-gray-900">
            <div className="w-full">
                <div className="flex flex-wrap justify-center lg:justify-between items-center">
                    <BaseText
                        title='visi'
                        className='mb-10 lg:mb-0'
                        description='Menjadi UKM terdepan dalam mengembangkan keterampilan IT mahasiswa, serta menciptakan generasi muda yang inovatif dan siap bersaing di dunia teknologi.'
                    />
                    <div className="hidden lg:block border-l border-slate-700 h-64 mx-4"></div>
                    <BaseText
                        title='misi'
                        description='Mendorong kolaborasi dan inovasi melalui proyek-proyek bersama dan kegiatan kompetitif. Mengembangkan soft skills anggota seperti kerjasama tim, komunikasi, dan kepemimpinan.'
                    />
                </div>
            </div>
        </div>
    )
}

export default VisiMisi
