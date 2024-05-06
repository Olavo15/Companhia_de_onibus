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
    max_assento: 0
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

  function openModal(chegada,chegadaDt,onibus_id,origin,originDt,max_assento){
    setModalViagem({
      ...modalViagem,
      chegada,
      chegadaDt,
      modal: true,
      onibus_id,
      origin,
      originDt,
      max_assento
    })
  }

  return (
    <div className="flex flex-col w-full h-screen overflow-auto">
      <Header/>
      {
        modalViagem.modal ? <Modal close={() => setModalViagem({...modalViagem, modal: false})} chegada={modalViagem.chegada} chegadaDt={modalViagem.chegadaDt} max_assento={modalViagem.max_assento} onibus_id={modalViagem.onibus_id} origin={modalViagem.origin} originDt={modalViagem.originDt}/> : null
      }
      <h2>Lista de Viagens</h2>
      <ul className="w-full gap-3 flex">
        {viagens.map((viagem) => (
          <button onClick={() => openModal(viagem.destino, viagem.chegada_dt, viagem.onibus_id, viagem.origem, viagem.partida_dt, viagem.max_assento)} key={viagem.id} className="px-3 py-2 bg-zinc-300 w-72 rounded-lg shadow-lg text-left">
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
