import React from 'react'

const CardDivisi = (props) => {
  return (
    <div className="relative bg-cover bg-red-200 transition-transform transform hover:scale-105 w-1/2 md:w-3/4 lg:w-1/2 h-80 lg:h-[430px] rounded-lg bg-center"
        style={{backgroundImage: `url(${props.picture})`}}
    >
        <div className="absolute inset-0 flex flex-col items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300 bg-slate-500 bg-opacity-50 rounded-lg">
            <div className="bg-white p-4 text-center mb-3 absolute bottom-0 bg-opacity-75 rounded-md">
                <h4 className="text-slate-700 text-lg font-bold capitalize">{props.name}</h4>
                <p className="text-slate-700 capitalize">{props.subname}</p>
                <a href={props.sublink} 
                    target='_blank'
                    className="inline-flex items-center px-2 py-2 mt-2 bg-cyan-500 text-white font-normal rounded-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                    <span>Cek Profile</span>
                  </a>
            </div>
        </div>
    </div>
  )
}

export default CardDivisi
