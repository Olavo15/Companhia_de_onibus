import React, { useState } from "react";

interface FormData {
  nome: string;
  dataNascimento: string;
  cpf: string;
}

interface FormUserProps {
  onSubmit: (data: FormData) => void;
}

export function FormUser({ onSubmit }: FormUserProps) {
  const [formData, setFormData] = useState<FormData>({
    nome: "",
    dataNascimento: "",
    cpf: "",
  });

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>, field: keyof FormData) => {
    setFormData({
      ...formData,
      [field]: e.target.value,
    });
    // Chamada para o onSubmit sempre que houver uma mudança nos dados
    onSubmit(formData);
  };

  return (
    <form className="flex flex-col items-center justify-center px-10 py-2">
      <label className="font-semibold text-xl">Nome Completo</label>
      <input
        type="text"
        value={formData.nome}
        onChange={(e) => handleChange(e, "nome")}
        className="w-full border rounded-md border-zinc-700 px-2 py-1"
      />
      <label className="font-semibold text-xl">Data Nascimento</label>
      <input
        type="text"
        value={formData.dataNascimento}
        onChange={(e) => handleChange(e, "dataNascimento")}
        className="w-full border rounded-md border-zinc-700 px-2 py-1"
      />
      <label className="font-semibold text-xl">CPF</label>
      <input
        type="text"
        value={formData.cpf}
        onChange={(e) => handleChange(e, "cpf")}
        className="w-full border rounded-md border-zinc-700 px-2 py-1"
      />
    </form>
  );
}
