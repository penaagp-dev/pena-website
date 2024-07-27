import React, { useState, useEffect } from 'react'
import penaLogo from '../assets/img/pena.png'
import heroSectionImg from '../assets/img/hero-section.jpeg'
import BaseButton from '../components/BaseButton'

const HeroSection = () => {

    const setMode = (mode) => {
        const html = document.querySelector('html');
        mode === 'dark' ? html.classList.add('dark') : html.classList.remove('dark') 
        localStorage.theme = mode
    }

    const handleDarkMode = () => {
        const darkToggle = document.querySelector('#dark-toggle');
        darkToggle.checked ? setMode('dark') : setMode('light')
    }

    const checkDarkmodeCondition = () => {
        const darkToggle = document.querySelector('#dark-toggle');

        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            darkToggle.checked = true;
            setMode('dark')
        } else {
            darkToggle.checked = false;
            setMode('loght')
        }
    }

    useEffect(() => {
        checkDarkmodeCondition()
    }, [])

    return (
        <div className="flex flex-col h-screen bg-slate-800 text-white bg-center bg-cover bg-blend-overlay bg-fixed bg-black/30" style={{ backgroundImage: `url(${heroSectionImg})` }}>
            <header id='header' className="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
                
                <div className="w-full">
                    <div className="flex items-center justify-between relative">
                        <div className="px-4">
                            <div className="logo mt-1 ml-1 flex justify-center items-center">
                                <img src={penaLogo} alt="logo" className="w-10 h-10 my-3 sm:my-0"/>
                                <h1 className="ml-2 text-xl font-bold text-white">PENA</h1>
                            </div>
                        </div>
                        <div className="flex items-center px-4">
                            <button id="hamburger" name="hamburger" type="button" className="block absolute right-4 lg:hidden">
                                <span className="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                                <span className="hamburger-line transition duration-300 ease-in-out"></span>
                                <span className="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                            </button>
                            
                            <nav id="nav-menu" className="hidden absolute py-5 bg-cyan-800 bg-opacity-60 transition duration-500 shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                                <ul className="block lg:flex">
                                    <li className="group">
                                        <a href="#home" className="text-base text-white py-2 mx-8 flex group-hover:text-cyan-500">Home</a>
                                    </li>
                                    
                                    <li className="group">
                                        <a href="#about" className="text-base text-white py-2 mx-8 flex group-hover:text-cyan-500">About</a>
                                    </li>
                                    
                                    <li className="group">
                                        <a href="#gallery" className="text-base text-white py-2 mx-8 flex group-hover:text-cyan-500">Gallery</a>
                                    </li>
                                    
                                    <li className="group">
                                        <a href="#contact" className="text-base text-white py-2 mx-8 flex group-hover:text-cyan-500">Contact</a>
                                    </li>

                                    <li className="flex items-center pl-8">
                                        <div className="flex">
                                            <span className="mr-2 text-sm text-white">light</span>
                                            <input onChange={handleDarkMode} type="checkbox" className="hidden" id="dark-toggle"/>
                                            <label  htmlFor="dark-toggle">
                                                <div className="flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-700 p-1">
                                                    <div className="toggle-circle h-4 w-4 rounded-full bg-white transition duration-300 ease-in-out">
                                                    </div>
                                                </div>
                                            </label>
                                            <span className="ml-2 text-sm text-white">dark</span>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                            
                        </div>
                    </div>
                </div>
            </header>
            
            <div id='home' className="flex-1 flex items-center">
                <div className="text-center mx-auto">
                    <h1 className="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-semibold">PENA</h1>
                    <p className="font-light text-xl sm:text-2xl md:text-3xl mt-5">Programming Engineering & Networking Adhi Guna</p>
                    <BaseButton title='Join Us' />
                </div>
            </div>
        </div>
    )
}

export default HeroSection
