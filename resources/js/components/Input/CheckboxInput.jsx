import React from 'react'

const CheckboxInput = (props) => {
    return (
        <div className="mb-5 text-gray-200">
            <label className="block text-gray-100 font-semibold mb-1 capitalize">{props.name}</label>
            <div className="flex flex-col md:flex-row sm:flex-row">

                <label className="mr-4 flex items-center">
                    <input onChange={props.onChange} type="radio" className="ui-checkbox mr-1" name={props.name} value={props.value1} />
                    <span className='capitalize'>{props.valueName1 || props.value1}</span>
                </label>
                <label className='flex items-center'>
                    <input onChange={props.onChange} type="radio" className="ui-checkbox mr-1" name={props.name} value={props.value2} />
                    <span className='capitalize'>{props.valueName2 || props.value2}</span>
                </label>

            </div>
        </div>
    )
}

export default CheckboxInput
