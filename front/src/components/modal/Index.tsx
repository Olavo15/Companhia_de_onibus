import React, { useEffect, useState } from 'react';
import api from '../../service/api';
import Assentos from './Assentos';
import { FormUser } from './FormUser';
import { Resumo } from './Resumo';

interface ModalProps{
    close: () => void;
    origin: string,
    originDt: string,
    chegada: string,
    chegadaDt: string,
    onibus_id:string,
    id: string;
    max_assento: number;
}

export function Modal(props: ModalProps){

    const [assentos, setAssentos] = useState(0)
    const [posicaoModal, setPosicaoModal] = useState(0)
    const [passageira, setPassageiro] = useState({
        nome: "",
        dataNascimento: "",
        cpf: "",
    })
    const [assentosOCP, setAssentosOPC] = useState<number[]>([])

    const [passagem, setPassagem] = useState({
        viagem_id: props.id,
        passageiro_id: 0,
        assento_id: 0,
        onibus_id: props.onibus_id,
        create_at: new Date()
    })

    useEffect(() => {
        async function fetchViagens() {
          try {
            const response = await api.get("/viagens");
            setAssentos(response.data);
          } catch (error) {
            console.error('Erro ao buscar viagens:', error);
          }
        }

        async function fetchAssentos(){
            try {
                const response = await api.get(`/assento/search?onibus=${passagem.onibus_id}`);
                const assentosTodos = response.data.map(assento => parseInt(assento.n_assento));
                setAssentosOPC(assentosTodos);
            } catch (error) {
                
            }
        }

        fetchViagens();
        fetchAssentos();
      }, []);

    let assentosDisponiveis :number[] = []
    
    for(let i = 0; i <= props.max_assento ; i++){
      assentosDisponiveis.push(i);
    }

    function selecionarAssento(index: number){
        setAssentos(index)
    }
    

    function avancarModal(){
        setPosicaoModal(posicaoModal + 1)
    }


    function voltar(){
        if(posicaoModal == 0){
            return
        }
        setPosicaoModal(posicaoModal - 1)
    }

    function criarAssento(){
        const service = api.post('/assento', {
            n_assento: assentos,
            disponivel: 0,
            onibus_id: passagem.onibus_id
        })
    }

    function criarPassageiro(){
        const service = api.post('/assento', {
            n_assento: assentos,
            disponivel: 0,
            onibus_id: passagem.onibus_id
        })
    }

    console.log(assentos)
    

    return(
        <div className='w-screen h-screen absolute bg-zinc-300 bg-opacity-30 flex items-center justify-center'>
            <div className='bg-zinc-50 flex flex-col rounded-lg drop-shadow-md overflow-hidden h-[50%] relative w-[50%]'>
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
                <div className='flex-1 h-full'>
                    {
                        posicaoModal == 0 ? <Assentos assentosDisponiveis={assentosDisponiveis} assentosOcupado={assentosOCP} assentoSelecionado={assentos} slectAseento={(index) => selecionarAssento(index)}/> :
                        posicaoModal == 1 ? <FormUser onSubmit={(data) => setPassageiro(data)}/> : 
                        posicaoModal == 2 ? <Resumo cpf={passageira.cpf} dataNascimento={passageira.dataNascimento} dataOrigem={props.chegadaDt} dataDestino={props.chegadaDt} nome={passageira.nome} origem={props.origin} Destino={props.chegada} cadeira={assentos} onibus={props.onibus_id}/> : null
                    } 
                </div>
                <div className='flex gap-2 w-full justify-end items-center px-2 py-2'>
                    {posicaoModal > 0 ? <button onClick={voltar} className='px-2 py-1 bg-red-400 rounded-md'>
                        voltar
                    </button> : null}
                    {posicaoModal <= 1 ? <button onClick={avancarModal} className='px-2 py-1 bg-green-400 rounded-md'>
                        Continuar
                    </button> : <button className='px-2 py-1 bg-green-400 rounded-md'>
                        Emitir bilhete 
                    </button> }
                </div>
            </div>
        </div>
    )
}