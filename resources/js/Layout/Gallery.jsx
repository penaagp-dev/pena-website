import React from 'react'
import profilePicture from '../assets/img/profile4.jpeg'
import CardGallery from '../components/CardGallery'

const Gallery = () => {
  return (
    <div id="gallery" className="pt-32 pb-32 bg-slate-200 dark:bg-slate-700">
        <div className="container mx-auto text-center">
            <h2 className="text-2xl font-bold text-cyan-400 uppercase pb-7">PENGURUS INTI</h2>
        </div>
        <div className="container mx-auto grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 px-4">
           <CardGallery name='bambang' subname='ketua umum' picture={profilePicture} />
           <CardGallery name='surtono yoyon' subname='wakil ketua' picture={profilePicture} />
           <CardGallery name='micahlaela s' subname='sekretaris' picture={profilePicture} />
           <CardGallery name='sarimi isi dua' subname='bendahara' picture={profilePicture} />
        </div>
    </div>
  )
}

export default Gallery
