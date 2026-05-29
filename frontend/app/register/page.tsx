"use client";

import { Card, CardContent, CardHeader } from "@/components/ui/card";
import { Field, FieldLabel } from "@/components/ui/field";
import { Input } from "@/components/ui/input";
import { Eye, EyeOff } from "lucide-react";
import { useState } from "react";
import { useForm } from "react-hook-form";
import { useRouter } from "next/navigation";

interface Payload {
  firstName: string;
  lastName: string;
  phone?: string;
  email: string;
  password: string;
}

const RegisterPage = () => {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm<Payload>();
  const [viewPassword, setViewPassword] = useState(false);

  const router = useRouter();

  const onsubmit = async (data: Payload) => {
    // Creamos un nuevo objeto solo con los campos requeridos y el teléfono solo si tiene valor
    const payload = {
      first_name: data.firstName,
      last_name: data.lastName,
      email: data.email,
      password: data.password,
      registration_date: new Date().toISOString().split('T')[0],
      active: true,
      phone: data.phone || null,
    };

    console.log("Payload enviado a la API:", JSON.stringify(payload));

    try {
      const response = await fetch("/api/users/RTRegister", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(payload),
      });

      const result = await response.json();

      if (!response.ok) {
        throw new Error(result.error || "Error al registrar usuario");
      }

      console.log("Registro exitoso:", result);
      
      router.push("/login");
    } catch (error) {
      console.error("Error en el registro:", error);
      alert(error instanceof Error ? error.message : "Error desconocido");
    }
  };

  return (
    <Card className="bg-background-light p-8 space-y-12 w-1/3 mx-auto mt-16">
      <CardHeader className="text-center">
        <h1 className="text-4xl font-bold tracking-tight text-text-dark">
          Registrarse
        </h1>
        <p className="text-lg text-text-dark">
          Crea tu cuenta para reservar tu espacio de trabajo ideal.
        </p>
      </CardHeader>
      <CardContent className="space-y-6 ">
        <form onSubmit={handleSubmit(onsubmit)}>
          <Field>
            <FieldLabel className="text-text-dark">Nombre</FieldLabel>
            <Input
              type="text"
              placeholder="John"
              className="text-text-dark"
              {...register("firstName", { required: true })}
            />
            {errors.firstName && (
              <span className="text-red-500">El nombre es requerido</span>
            )}
          </Field>
          <Field>
            <FieldLabel className="text-text-dark">Apellido</FieldLabel>
            <Input
              type="text"
              placeholder="Pork"
              className="text-text-dark"
              {...register("lastName", { required: true })}
            />
            {errors.lastName && (
              <span className="text-red-500">El apellido es requerido</span>
            )}
          </Field>
          <Field>
            <FieldLabel className="text-text-dark">
              Correo Electrónico
            </FieldLabel>
            <Input
              type="email"
              placeholder="example@gmail.com"
              className="text-text-dark"
              {...register("email", { required: true })}
            />
            {errors.email && (
              <span className="text-red-500">
                El correo electrónico es requerido
              </span>
            )}
          </Field>
          <Field>
            <FieldLabel className="text-text-dark">
              Teléfono (opcional)
            </FieldLabel>
            <Input
              type="tel"
              placeholder="123-456-7890"
              className="text-text-dark"
              {...register("phone", { required: false })}
            />
          </Field>
          <Field>
            <FieldLabel className="text-text-dark">Contraseña</FieldLabel>
            <div className="relative">
              <Input
                type={viewPassword ? "text" : "password"}
                placeholder="********"
                className="text-text-dark pr-10"
                {...register("password", { required: true })}
              />
              {viewPassword ? (
                <Eye
                  className="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500"
                  onClick={() => setViewPassword(false)}
                  size={20}
                />
              ) : (
                <EyeOff
                  className="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500"
                  onClick={() => setViewPassword(true)}
                  size={20}
                />
              )}
            </div>
            {errors.password && (
              <span className="text-red-500">La contraseña es requerida</span>
            )}
          </Field>

          <Input type="submit" value="Registrarse" className="mt-3" />
        </form>
      </CardContent>
    </Card>
  );
};

export default RegisterPage;
