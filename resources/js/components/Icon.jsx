import React from 'react'

const Icon = (props) => {
    return (
        <a href={props.href || '#'} target="_blank" className={`${props.className} w-9 h-9 text-xl rounded-full flex justify-center items-center border border-slate-400 text-slate-400 hover:border-cyan-500 hover:bg-cyan-500 hover:text-white`}>
            <i className={`fa-brands ${props.name}`}></i>
        </a>
    )
}

export default Icon
