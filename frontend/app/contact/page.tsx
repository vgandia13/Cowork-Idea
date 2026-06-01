"use client";

import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";

const ContactPage = () => {
    const handleSubmit = async (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        const formData = new FormData(e.currentTarget);
        const data = Object.fromEntries(formData.entries());

        console.log("Datos del formulario:", data);
    }

  return (
    <div className="min-h-screen flex items-center justify-center bg-gray-100">
      <div className="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 className="text-2xl font-bold mb-6 text-center">Contáctanos</h1>
        <form className="space-y-4" onSubmit={handleSubmit}>
          <div>
            <Label
              htmlFor="name"
              className="block text-sm font-medium text-gray-700"
            >
              Nombre
            </Label>
            <Input
              type="text"
              id="name"
              name="name"
              className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
              placeholder="Tu nombre"
              required
            />
          </div>
          <div>
            <Label
              htmlFor="email"
              className="block text-sm font-medium text-gray-700"
            >
              Correo Electrónico
            </Label>
            <Input
              type="email"
              id="email"
              name="email"
              className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
              placeholder="Tu correo electrónico"
              required
            />
          </div>
          <div>
            <Label
              htmlFor="message"
              className="block text-sm font-medium text-gray-700"
            >
              Mensaje
            </Label>
            <Textarea
              id="message"
              name="message"
              maxLength={500}
              className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
              placeholder="Tu mensaje"
              required
            />
          </div>
          <div>
            <Button
              type="submit"
              className="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:text-sm"
            >
              Enviar
            </Button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default ContactPage;
