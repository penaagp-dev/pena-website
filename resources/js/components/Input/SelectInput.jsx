import React from 'react'

const SelectInput = (props) => {
    return (
        <div className="mb-7">
            <div className='capitalize font-medium text-white mb-2'>
                {props.name}
            </div>
            <select onChange={props.onChange} name={props.name} value={props.value} className="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="" disabled >{props.name}</option>
                {props.children}
            </select>
        </div>
    )
}

export default SelectInput
