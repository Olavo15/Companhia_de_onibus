import Header from "./components/Header"
import React, { useState, useEffect } from 'react';
import api from './service/api';
import { Modal } from "./components/modal/Index";

function App() {

  const [viagens, setViagens] = useState([]);
  const [modalViagem, setModalViagem] = useState({
    modal: false,
    origin: '',
    originDt: '',
    chegada: '',
    chegadaDt: '',
    onibus_id:'',
  })

  useEffect(() => {
    async function fetchViagens() {
      try {
        const response = await api.get("/viagens");
        setViagens(response.data);
      } catch (error) {
        console.error('Erro ao buscar viagens:', error);
      }
    }

    fetchViagens();
    console.log(viagens)
  }, []);

  function openModal(){
    setModalViagem({
      ...modalViagem,
      chegada,
      chegadaDt,
      modal,
      onibus_id,
      origin,
      originDt
    })
  }

  return (
    <div className="flex flex-col w-full h-screen overflow-auto">
      <Header/>
      {
        modalViagem.modal ? <Modal/> : null
      }
      <h2>Lista de Viagens</h2>
      <ul>
        {viagens.map((viagem) => (
          <button onClick={() => setModalViagem({...modalViagem, modal: true})} key={viagem.id} className="p-2 bg-zinc-300 w-fit rounded-lg shadow-lg text-left">
            <p>
              Origem: {viagem.origem}
            </p>
            <p>
              {viagem.partida_dt}
            </p>
            <p>
              Destino: {viagem.destino}
            </p>
            <p>
              {viagem.chegada_dt}
            </p>
            <p>
              Assentos {viagem.max_assento - viagem.assentos_ocupados} / {viagem.max_assento}
            </p>
          </button>
        ))}
      </ul>
    </div>
  )
}

export default App
