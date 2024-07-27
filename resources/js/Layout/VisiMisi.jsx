import React from 'react'

const VisiMisi = () => {
  return (
    <div className="pt-32 pb-32 dark:bg-black">
        <div className="w-full">
            <div className="flex flex-wrap justify-center lg:justify-between items-center">
                <div className="w-full lg:w-5/12 px-4 mb-10 lg:mb-0">
                    <h1 className="font-bold text-center text-2xl uppercase text-black mb-5 dark:text-white">VISI</h1>
                    <p className="font-medium text-center text-base lg:text-lg dark:text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti ratione, nisi quia dicta animi possimus ex tempore dolores accusamus amet?</p>
                </div>
                <div className="hidden lg:block border-l border-slate-800 h-64 mx-4"></div>
                <div className="w-full lg:w-5/12 px-4">
                    <h1 className="font-bold text-center text-2xl uppercase text-black mb-5 dark:text-white">MISI</h1>
                    <p className="font-medium text-center text-base lg:text-lg dark:text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti ratione, nisi quia dicta animi possimus ex tempore dolores accusamus amet?</p>
                </div>
            </div>
        </div>
    </div>
  )
}

export default VisiMisi
