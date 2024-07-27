import React from 'react'
import joinUsImg from '../assets/img/join-us.jpeg'
import BaseButton from '../components/BaseButton'

const JoinsUs = () => {
  return (
    <div className="pt-32 pb-32 bg-cover bg-center relative" style={{backgroundImage: `url(${joinUsImg})`}}>
        <div className="absolute inset-0  bg-slate-950 bg-opacity-60"></div>
        <div className="container mx-auto text-center relative">
            <h1 className="text-4xl font-bold mb-4 text-white">Welcome to Our Website</h1>
            <p className="text-lg mb-8 text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum.</p>
            <BaseButton title="I'm Ready" />
        </div>
    </div>
  )
}

export default JoinsUs
