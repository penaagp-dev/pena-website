import React from 'react'
import Icon from '../components/Icon'

const About = () => {
  return (
    <div id="about" className="py-16 dark:bg-gray-900">
        <div className="px-8 md:px-16">
            <h4 className="font-bold uppercase text-cyan-400 text-2xl mb-4">
                About Pena
            </h4>

            <div className="flex flex-wrap dark:text-white">
                <div className="w-full mb-10 lg:w-1/2 lg:pr-4">
                    <p className="text-base text-slate-600 lg:text-lg dark:text-slate-200">
                        PENA (Programming Engineering and Networking Adhi Guna) merupakan Unit Kegiatan Mahasiswa yang berfokus di bidang IT dan sebagai wadah bagi mahasiswa yang ingin mengembangkan pengetahuan dan keterampilan di bidang pemrograman, rekayasa perangkat lunak, jaringan komputer dan multimedia.    
                    </p>
                </div>
                <div className="w-full lg:w-1/2 lg:pl-4">
                    <p className="text-base text-slate-600 mb-6 lg:text-lg dark:text-slate-200">
                        PENA tidak hanya berfokus pada aspek teknis semata, tetapi juga pada pengembangan soft skills yang penting bagi karier di industri IT. Dengan mengadakan berbagai kegiatan yang mendorong kreativitas, kerjasama tim, dan kemampuan komunikasi, sehingga siap menghadapi tantangan di dunia profesional.
                    </p>
                    <p className="text-base text-slate-600 mb-6 lg:text-lg dark:text-slate-200">
                        Dengan bergabung di PENA, mahasiswa mendapatkan kesempatan untuk belajar dan berkembang bersama dalam lingkungan yang suportif.
                    </p>
                    <div className="flex items-center pb-6">
                        <Icon className='mr-3' name='fa-youtube' href='https://www.youtube.com/@penaofficial3731' />
                        <Icon className='mr-3' name='fa-instagram' href='https://www.instagram.com/pena_stmikadhiguna/' />
                        <Icon className='mr-3' name='fa-facebook' href='https://www.facebook.com/penastmikadhiguna' />
                    </div>
                </div>
            </div>
        </div>
    </div>
  )
}

export default About
