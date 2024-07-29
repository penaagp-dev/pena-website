import React from 'react'
import Icon from '../components/Icon'

const FooterTextMenu = (props) => {
    return (
        <li>
            <a href={props.href || '#'} className="text-base hover:text-cyan-400 inline-block pb-1">
                {props.text}    
            </a>
        </li>
    )
}

const Footer = () => {
  return (
    <footer id="contact" className="bg-slate-800 py-24 px-8 md:px-16">
        <div>
            <div className="flex flex-wrap">
                <div className="w-full mb-8 text-slate-300 md:w-1/3 flex justify-center md:justify-start text-center md:text-start">
                    <div>
                        <h2 className="font-bold text-4xl text-white mb-3 dark:text-cyan-400">PENA</h2>
                        <h3 className="font-bold text-2xl mb-2">Hubungi Kami</h3>
                        <p>pena.adhiguna13@gmail.com</p>
                        <p>Rumah PENA Jl Kesadaran 3</p>
                        <p>Kota Palu</p>
                    </div>
                </div>

                <div className="w-full mb-8 md:w-1/3 flex justify-center text-center md:text-start">
                    <div>
                        <h3 className="font-semibold text-xl text-white mb-3">Kategori</h3>
                        <ul className="text-slate-300 ">
                            <FooterTextMenu text='Programming'/>
                            <FooterTextMenu text='Engineering'/>
                            <FooterTextMenu text='Networking'/>
                            <FooterTextMenu text='Multimedia'/>
                        </ul>
                    </div>
                </div>

                <div className="w-full mb-8 md:w-1/3 flex justify-center md:justify-end text-center md:text-start">
                    <div>
                        <h3 className="font-semibold text-xl text-white mb-3">Tautan</h3>
                        <ul className="text-slate-300 ">
                            <FooterTextMenu href='#' text='Home'/>
                            <FooterTextMenu href='#about' text='About'/>
                            <FooterTextMenu href='#gallery' text='Gallery'/>
                            <FooterTextMenu href='#contact' text='Contact'/>
                        </ul>
                    </div>
                </div>
            </div>

            <div className="w-full border-t border-slate-800">
                <div className="flex items-center justify-center">
                    <Icon className='mr-3' name='fa-youtube' href='https://www.youtube.com/@penaofficial3731' />
                    <Icon className='mr-3' name='fa-instagram' href='https://www.instagram.com/pena_stmikadhiguna/' />
                    <Icon name='fa-facebook' href='https://www.facebook.com/penastmikadhiguna' />
                </div>
            </div>
        </div>
    </footer>
  )
}

export default Footer
