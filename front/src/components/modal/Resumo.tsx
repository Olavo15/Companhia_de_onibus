import React from "react";

interface ResumoProps {
  nome: string;
  cpf: string;
  dataNascimento: string;
  origem: string;
  Destino: string;
  dataDestino: string;
  dataOrigem: string;
  cadeira: number;
  onibus: string;

}

export function Resumo({ nome, cpf, dataNascimento, origem, Destino, dataDestino, dataOrigem,cadeira,onibus}: ResumoProps) {
  return (
    <div className="w-full flex flex-col px-10 py-4 items-center justify-center">
      <h2 className="font-bold text-2xl">Resumo</h2>
      <div className="w-[50%] text-left">
        <p><strong>Nome:</strong> {nome}</p>
        <p><strong>CPF:</strong> {cpf}</p>
        <p><strong>Data de Nascimento:</strong> {dataNascimento}</p>
        <p><strong>Onibus:</strong> {onibus}</p>
        <p><strong>cadeira</strong> {cadeira.toString()}</p>
        <p><strong>Origem:</strong> {origem}</p>
        <p><strong>Destino:</strong> {Destino}</p>
        <p><strong>Data de Saída:</strong> {dataDestino}</p>
        <p><strong>Data de Chegada:</strong> {dataOrigem}</p>
      </div>
    </div>
  );
}
