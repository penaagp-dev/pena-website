import React, { useEffect } from 'react'
import HeroSection from '../Layout/HeroSection'
import About from '../Layout/About'
import Gallery from '../Layout/Gallery'
import VisiMisi from '../Layout/VisiMisi'
import JoinsUs from '../Layout/JoinsUs'
import Footer from '../Layout/Footer'

const Home = () => {

    const windowScroll = () => {
        window.onscroll = function() {
            const pathname = window.location.pathname
            if (pathname == '/') {
                const header = document.getElementById('header')
                const fixedNav = header.offsetTop;
                const toTop= document.querySelector('#to-top');
    
                if (window.scrollY > fixedNav) {
                    header.classList.add('navbar-fixed');
                    toTop.classList.remove('hidden');
                    toTop.classList.add('flex');
                } else {
                    header.classList.remove('navbar-fixed');
                    toTop.classList.remove('flex');
                    toTop.classList.add('hidden');
                }
            }
        };
    }

    
    const hamburgerMenu = () => {
        const hamburger = document.querySelector('#hamburger');
        const navMenu = document.querySelector('#nav-menu');
        hamburger.addEventListener('click', function (){
            hamburger.classList.toggle('hamburger-active');
            navMenu.classList.toggle('hidden');
        });
    }

    const clickedOutHamburgerMenu = () => {
        const hamburger = document.querySelector('#hamburger');
        const navMenu = document.querySelector('#nav-menu');
        window.addEventListener('click', function (e) {
            if(e.target != hamburger && e.target != navMenu){
                hamburger.classList.remove('hamburger-active');
                navMenu.classList.add('hidden');
            }
        });
    }


  useEffect(() => {
    windowScroll()
    hamburgerMenu()
    clickedOutHamburgerMenu()

    const header = document.getElementById('header')
    header.scrollIntoView({block: 'start' });
  }, [])

  return (
    <>
        <HeroSection/>
        <About/>
        <JoinsUs/>        
        <Gallery/>
        <VisiMisi/>
        <Footer/>
        
        {/* <!-- Back to top Start --> */}
        <a href="#home" id="to-top" className="fixed z-[9999] hidden justify-center items-center bottom-4 right-4 p-4 h-14 w-14 rounded-full bg-cyan-500 hover:animate-pulse">
            <span className="block w-5 h-5 border-t-2 border-l-2 rotate-45 mt-2"></span>
        </a>
    </>
  )
}

export default Home
