import React from 'react';

export function Modal(){
    return(
        <div className='w-screen h-screen absolute bg-zinc-300 bg-opacity-30 flex items-center justify-center'>
            <div className='bg-zinc-50 rounded-lg drop-shadow-md overflow-hidden h-[50%] w-[50%]'>
                <div className='flex gap-10 items-center px-2 py-5 bg-fruru w-full h-fit'>    
                    <div>
                        <h2>
                            Origem:
                        </h2>
                        <p>
                            data:
                        </p>
                    </div>
                    <div>
                        <h2>
                            Chegada:
                        </h2>
                        <p>
                            data:
                        </p>
                    </div>
                </div>

            </div>
        </div>
    )
}