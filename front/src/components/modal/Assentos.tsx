import React from 'react';

interface Iprops {
    assentosDisponiveis: number[];
    slectAseento: (index: number) => void;
    assentoSelecionado: number;
    assentosOcupado: number[];
}

export default function Assentos({ assentosDisponiveis, slectAseento, assentoSelecionado, assentosOcupado }: Iprops) {
    return (
        <div className='p-2 w-full h-fit'>
            <div className='flex gap-1 flex-wrap'>
                {
                    assentosDisponiveis.map((cadeira, index) => {
                        const active = assentosOcupado.includes(index);
                        return (
                            <button
                                key={index}
                                disabled={active}
                                onClick={() => slectAseento(index)}
                                className={`px-4 py-2 ${active ? 'bg-red-300' : null} font-semibold relative rounded-md border ${assentoSelecionado === cadeira ? 'bg-green-300' : ''} border-black w-fit ${cadeira === 0 ? 'hidden' : ''}`}
                            >
                                {cadeira < 10 ? '0' + cadeira : cadeira}
                            </button>
                        );
                    })
                }
            </div>
        </div>
    );
}
