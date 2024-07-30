import React from 'react'
import penaLogo from '../assets/img/pena.png'
import heroSectionImg from '../assets/img/cover.webp'
import BaseButton from '../components/BaseButton'
import ToggleTheme from '../components/ToggleTheme'
import NavMenu from '../components/NavMenu'
import { Link } from 'react-router-dom'

const HeroSection = () => {
    return (
        <div className="flex flex-col h-screen bg-slate-800 text-white bg-center bg-cover bg-blend-overlay bg-fixed bg-black/30" style={{ backgroundImage: `url(${heroSectionImg})` }}>
            <header id='header' className="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
                
                <div className="w-full px-8 md:px-16 sm:py-2">
                    <div className="flex items-center justify-between relative">
                        <div className="">
                            <div className="logo mt-1 ml-1 flex justify-center items-center">
                                <img src={penaLogo} alt="logo" className="w-10 h-10 my-3 sm:my-0"/>
                                <h1 className="ml-2 text-xl font-bold text-white">PENA</h1>
                            </div>
                        </div>
                        <div className="flex items-center">
                            <button id="hamburger" name="hamburger" type="button" className="block absolute right-4 lg:hidden">
                                <span className="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                                <span className="hamburger-line transition duration-300 ease-in-out"></span>
                                <span className="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                            </button>
                            
                            <nav id="nav-menu" className="hidden absolute mt-4 lg:mt-0 bg-cyan-800 bg-opacity-60 transition duration-500 shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                                <ul className="block lg:flex">
                                    <NavMenu href='#home' text='Home' />
                                    <NavMenu href='#about' text='About' />
                                    <NavMenu href='#gallery' text='Gallery' />
                                    <NavMenu href='#contact' text='Contact' />
                                    <li className="flex items-center pl-4 py-2 lg:py-0">
                                        <ToggleTheme/>
                                    </li>
                                </ul>
                            </nav>
                            
                        </div>
                    </div>
                </div>
            </header>
            
            <div id='home' className="flex-1 flex items-center">
                <div className="text-center mx-auto">
                    <h1 className="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold tracking-wider">PENA</h1>
                    <p className="font-light text-xl sm:text-2xl md:text-3xl mt-5">Programming Engineering & Networking Adhi Guna</p>
                    <Link to={'/register'}>
                        <BaseButton title='Join Us' />
                    </Link>
                </div>
            </div>
        </div>
    )
}

export default HeroSection
