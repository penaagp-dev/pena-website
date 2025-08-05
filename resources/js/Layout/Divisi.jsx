import React, { useState, useEffect } from 'react'
import CardDivisi from '../components/CardDivisi'
import axios from 'axios'

const Divisi = () => {
    const [dataDivisi, setDataDivisi] = useState([])

    const getAllData = async () => {
        try {
            const response = await axios.get('/api/v1/core-management')
            if (response.data.data) {
                // Filter data yang hanya memiliki jabatan 'learning' atau 'entrepreneur'
                const filteredData = response.data.data.filter(item => 
                    item.jabatan === 'learning' || item.jabatan === 'entrepreneur'
                )
                setDataDivisi(filteredData)
            } else {
                setDataDivisi('')
            }
        } catch (error) {
            setDataDivisi('')
        }
    }

    useEffect(() => {
        getAllData()
    }, [])

    return (
        <div id="divisi" className="py-16 px-8 md:px-16 bg-slate-100 dark:bg-slate-700">
            <div className="mx-auto text-center">
                <h2 className="text-2xl font-bold text-cyan-500 uppercase pb-8">Divisi</h2>
            </div>
            <div className="mx-auto grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                {dataDivisi && dataDivisi.map((item) => (
                    <CardDivisi
                        key={item.id}
                        name={item.name}
                        subname={item.jabatan}
                        sublink={item.link}
                        picture={`/uploads/coremanagement/${item.photo}`}
                    />
                ))}
            </div>
            {!dataDivisi || dataDivisi.length === 0 ? <p className='text-center text-white'>Data tidak ditemukan</p> : null}
        </div>
    )
}

export default Divisi