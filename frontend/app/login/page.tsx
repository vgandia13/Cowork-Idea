"use client";

import { Card, CardContent, CardHeader } from "@/components/ui/card";
import { Field, FieldLabel } from "@/components/ui/field";
import { Input } from "@/components/ui/input";
import { Eye, EyeOff } from "lucide-react";
import { useState } from "react";
import { useForm } from "react-hook-form";

interface Payload {
  email: string;
  password: string;
}

const LoginPage = () => {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm<Payload>();
  const [viewPassword, setViewPassword] = useState(false);

  const onsubmit = (data: Payload) => {
    console.log("Datos del usuario: ", data);
  };

  return (
    <Card className="bg-background-light p-8 space-y-12 w-1/3 mx-auto mt-16">
      <CardHeader className="text-center">
        <h1 className="text-4xl font-bold tracking-tight text-text-dark">
          Iniciar Sesión
        </h1>
        <p className="text-lg text-text-dark">
          Accede a tu cuenta para reservar tu espacio de trabajo ideal.
        </p>
      </CardHeader>
      <CardContent className="space-y-6">
        <form onSubmit={handleSubmit(onsubmit)}>
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

          <Input type="submit" value="Iniciar Sesión" className="mt-3" />
        </form>
      </CardContent>
    </Card>
  );
};

export default LoginPage;
