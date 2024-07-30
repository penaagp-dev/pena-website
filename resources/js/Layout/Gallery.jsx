import React, { useState, useEffect } from 'react'
import CardGallery from '../components/CardGallery'
import axios from 'axios'

const Gallery = () => {
    const [dataGallery, setDatGallery] = useState([])

    const getAllData = async () => {
        const response = await axios.get('/v1/core-management')
        setDatGallery(response.data.data)
    }

    useEffect(() => {
        getAllData()
    }, [])

    return (
        <div id="gallery" className="py-16 px-8 md:px-16 bg-slate-200 dark:bg-slate-700">
            <div className="mx-auto text-center">
                <h2 className="text-2xl font-bold text-cyan-500 uppercase pb-8">PENGURUS INTI</h2>
            </div>
            <div className="mx-auto grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                {dataGallery ? dataGallery.map((item) => (
                    <CardGallery key={item.id}
                        name={item.name}
                        subname={item.jabatan}
                        picture={'/uploads/coremanagement/'+item.photo}
                    />
                )) : null}
            </div>
            { !dataGallery ? <p className='text-center text-white'>Data tidak ditemukan</p> : null }
        </div>
    )
}

export default Gallery
