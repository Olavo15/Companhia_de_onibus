import React, { useEffect, useState } from 'react';
import api from '../../service/api';
import iconCadeira from '../../assets/iconCadeira.png';

interface ModalProps{
    close: () => void;
    origin: string,
    originDt: string,
    chegada: string,
    chegadaDt: string,
    onibus_id:string,
    max_assento: number;
}

export function Modal(props: ModalProps){

    const [assentos, setAssentos] = useState()

    useEffect(() => {
        async function fetchViagens() {
          try {
            const response = await api.get("/viagens");
            setAssentos(response.data);
          } catch (error) {
            console.error('Erro ao buscar viagens:', error);
          }
        }
    
        fetchViagens();
      }, []);

    let assentosDisponiveis :number[] = []
    
    for(let i = 0; i <= props.max_assento ; i++){
      assentosDisponiveis.push(i);
    }


    return(
        <div className='w-screen h-screen absolute bg-zinc-300 bg-opacity-30 flex items-center justify-center'>
            <div className='bg-zinc-50 flex-flex-col rounded-lg drop-shadow-md overflow-hidden h-[50%] relative w-[50%]'>
                <button onClick={props.close} className='p-2 hover:bg-zinc-500 bg-opacity-15 rounded-md absolute right-2 w-10 top-2 text-amaulelo'>
                    X
                </button>
                <div className='flex text-amaulelo gap-10 items-center px-2 py-5 bg-fruru w-full h-fit'>    
                    <div>
                        <h2>
                            Origem: {props.origin}
                        </h2>
                        <p>
                            data: {props.originDt}
                        </p>
                    </div>
                    <div>
                        <h2>
                            Chegada: {props.chegada}
                        </h2>
                        <p>
                            data: {props.chegadaDt}
                        </p>
                    </div>
                </div>
                
                <div className='p-2 w-full h-80'>
                    <div className='h-56 border-2 border-black items-center justify-center rounded-lg px-10 py-2 flex flex-col flex-wrap gap-1'>
                        {
                            assentosDisponiveis.map((cadeira, index) => {
                                return (
                                    <button className={`px-4 py-2 font-semibold relative  rounded-md border border-black w-fit ${cadeira == 0 ? 'hidden' : null}`}>
                                        <img className='absolute opacity-10 rotate-90 w-10 left-1 top-0' src={iconCadeira} alt="" />
                                        {cadeira < 10 ? '0'+cadeira : cadeira}
                                    </button>
                                )
                            })
                        }     
                    </div>
                </div>
                <div className='flex gap-2 w-full justify-end items-center px-2 py-2'>
                    <button>
                        Cancelar
                    </button>
                    <button>
                        Continuar
                    </button>
                </div>
            </div>
        </div>
    )
}