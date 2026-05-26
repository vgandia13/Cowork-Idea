'use client';

import { Card, CardContent, CardHeader } from "@/components/ui/card";
import { Field, FieldLabel } from "@/components/ui/field";
import { Input } from "@/components/ui/input";
import { Eye, EyeOff } from "lucide-react";
import { useState } from "react";

const LoginPage = () => {
  const [viewPassword, setViewPassword] = useState(false);

  return (
    <Card className="bg-background-light p-8 space-y-12 w-1/2 mx-auto mt-16">
      <CardHeader className="text-center">
        <h1 className="text-4xl font-bold tracking-tight text-text-dark">
          Iniciar Sesión
        </h1>
        <p className="text-lg text-text-dark">
          Accede a tu cuenta para reservar tu espacio de trabajo ideal.
        </p>
      </CardHeader>
      <CardContent className="space-y-6">
        <Field>
          <FieldLabel className="text-text-dark">Nombre de Usuario</FieldLabel>
          <Input type="text" placeholder="johndoe" className="text-text-dark" />
        </Field>
        <Field>
          <FieldLabel className="text-text-dark">Correo Electrónico</FieldLabel>
          <Input
            type="email"
            placeholder="example@gmail.com"
            className="text-text-dark"
          />
        </Field>
        <Field>
          <FieldLabel className="text-text-dark">Contraseña</FieldLabel>
          <div className="relative">
            <Input
              type={viewPassword ? "text" : "password"}
              placeholder="********"
              className="text-text-dark pr-10"
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
        </Field>
      </CardContent>
    </Card>
  );
};

export default LoginPage;
