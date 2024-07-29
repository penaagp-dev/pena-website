import React from 'react'

const NavMenu = (props) => {
    return (
        <li className="group">
            <a href={props.href || '#'} className="text-base text-white py-2 mx-4 flex group-hover:text-cyan-300 duration-200">
                {props.text}
            </a>
        </li>
    )
}

export default NavMenu
