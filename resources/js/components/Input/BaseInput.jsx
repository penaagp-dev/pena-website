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
                max={props.max}
                className="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" required
            />
        </div>
    )
}

export default BaseInput
