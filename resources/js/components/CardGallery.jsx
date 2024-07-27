import React from 'react'

const CardGallery = (props) => {
  return (
    <div className="relative bg-cover bg-red-200 transition-transform transform hover:scale-105 w-full h-64 sm:h-80 lg:h-96 rounded-lg bg-center"
        style={{backgroundImage: `url(${props.picture})`}}
    >
        <div className="absolute inset-0 flex flex-col items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300 bg-slate-500 bg-opacity-50 rounded-lg">
            <div className="bg-white p-4 text-center mb-3 absolute bottom-0 bg-opacity-75 rounded-md">
                <h4 className="text-slate-700 text-lg font-bold capitalize">{props.name}</h4>
                <p className="text-slate-700 capitalize">{props.subname}</p>
            </div>
        </div>
    </div>
  )
}

export default CardGallery
