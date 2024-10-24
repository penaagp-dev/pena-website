import React from 'react'
import { Link } from 'react-router-dom'

const PageNotFound = () => {
    return (
        <div className='w-full h-screen flex justify-center items-center'>
            <div className='text-center'>
                <h1 className='text-9xl font-semibold text-gray-800'>404</h1>
                <h1 className='text-2xl font-medium text-gray-800'>Oops! Page Not Found</h1>
                <Link to={'/'}>
                    <button className='mt-8 bg-cyan-600 hover:bg-cyan-500 duration-200 rounded-md px-3 py-1 text-sm text-white'>
                        Back to Home
                    </button>
                </Link>
            </div>
        </div>
    )
}

export default PageNotFound
