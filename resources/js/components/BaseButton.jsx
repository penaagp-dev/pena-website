import React from 'react'

const BaseButton = (props) => {
  return (
    <button className="px-5 py-2 inline-block rounded-lg bg-cyan-600 text-white hover:bg-cyan-500 transition-colors mt-10">
      {props.title}
    </button>
  )
}

export default BaseButton
