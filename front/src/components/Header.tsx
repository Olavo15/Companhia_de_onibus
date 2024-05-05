import React from "react"
import logo from '../assets/logoBus.png';

export default function Header(){
    return(
        <header className="w-full flex items-center gap-2 px-2 py-4 bg-amaulelo">
            <figure>
                <img src={logo} className="w-14" alt="" />
            </figure>
            <h1 className="font-bold text-xl">
                Viação FAP
            </h1>
        </header>
    )
}