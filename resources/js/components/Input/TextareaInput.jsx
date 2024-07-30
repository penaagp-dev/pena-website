import React from 'react'

const TextareaInput = (props) => {
    return (
        <div className="mb-7">
            <div className='capitalize font-medium text-white mb-1'>{props.name}</div>
            <textarea
                placeholder={props.placeholder || props.name}
                name={props.name}
                value={props.value}
                onChange={props.onChange}
                onKeyUp={props.onKeyUp}
                id={props.id || props.name}
                className="w-full px-3 py-2 border rounded-md focus:outline-none ring-2 focus:ring-blue-500 bg-white h-24"
            >

            </textarea>
        </div>
    )
}

export default TextareaInput
