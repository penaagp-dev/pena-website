import React from 'react'

const BaseInput = (props) => {
    return (
        <div className="mb-7">
            <div className='capitalize font-medium text-white mb-1'>{props.name}</div>
            <input type={props.type || 'text'}
                placeholder={props.placeholder || props.name}
                name={props.name}
                value={props.value}
                onChange={props.onChange}
                onKeyUp={props.onKeyUp}
                max={props.max}
                id={props.id || props.name}
                className='w-full px-3 py-2 border rounded-md ring-2 focus:outline-none focus:ring-blue-500 bg-white' required
            />
            { props.note ? 
                <p className='text-white text-sm italic mt-1'>*{props.note}</p>
            : null}
            <p className='text-red-500 font-semibold text-sm'>
                <i>{props.alertText}</i>
            </p>
        </div>
    )
}

export default BaseInput
