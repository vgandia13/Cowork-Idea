import { Card, CardContent, CardHeader } from "@/components/ui/card";
import { Field } from "@/components/ui/field";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";

const LoginPage = () => {
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
          <Label className="text-text-dark">Nombre de Usuario</Label>
          <Input type="text" placeholder="johndoe" className="text-text-dark" />
        </Field>
        <Field>
          <Label className="text-text-dark">Correo Electrónico</Label>
          <Input
            type="email"
            placeholder="example@gmail.com"
            className="text-text-dark"
          />
        </Field>
        <Field>
          <Label className="text-text-dark">Contraseña</Label>
          <Input
            type="password"
            placeholder="********"
            className="text-text-dark"
          />
        </Field>
      </CardContent>
    </Card>
  );
};

export default LoginPage;
