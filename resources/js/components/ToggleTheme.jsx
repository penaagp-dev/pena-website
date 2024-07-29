import React, { useEffect } from 'react'

const ToggleTheme = () => {
    const setMode = (mode) => {
        const html = document.querySelector('html');
        mode === 'dark' ? html.classList.add('dark') : html.classList.remove('dark') 
        localStorage.theme = mode
    }
    
    const handleToggleTheme = () => {
        const darkToggle = document.querySelector('#toggleTheme');
        darkToggle.checked ? setMode('dark') : setMode('light')
    }

    const checkDarkmodeCondition = () => {
        const darkToggle = document.querySelector('#toggleTheme');

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
        <label htmlFor='toggleTheme' className="inline-flex items-center relative cursor-pointer">
            <input className="peer hidden" onChange={handleToggleTheme} id="toggleTheme" type="checkbox" />
            <div className="relative w-[60px] h-[35px] bg-white peer-checked:bg-zinc-500 rounded-full after:absolute after:content-[''] after:w-[25px] after:h-[25px] 
            after:bg-gradient-to-r from-orange-500 to-yellow-400 peer-checked:after:from-zinc-900 peer-checked:after:to-zinc-900 after:rounded-full after:top-[5px] 
            after:left-[5px] active:after:w-[50px] peer-checked:after:left-[55px] peer-checked:after:translate-x-[-100%] shadow-sm duration-300 after:duration-300 after:shadow-md"></div>
            
            <span className='fill-white peer-checked:opacity-60 absolute mb-2 w-3 h-3 left-[9px]'>
                <i className="fa-solid fa-sun"></i>
            </span>
            <span className='fill-white text-black peer-checked:text-white opacity-60 peer-checked:opacity-70 mb-2 peer-checked:fill-white absolute w-3 h-3 right-[11px]'>
                <i className="fa-solid fa-moon"></i>
            </span>

        </label>
    )
}

export default ToggleTheme
