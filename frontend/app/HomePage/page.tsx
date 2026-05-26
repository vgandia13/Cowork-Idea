import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Search, Zap, Coffee, Wifi } from "lucide-react";

const HomePage = () => {
  return (
    <div className="min-h-screen bg-background-light p-8 space-y-12">
      {/* Hero Section */}
      <section className="text-center space-y-4">
        <h1 className="text-4xl font-bold tracking-tight text-text-dark">Tu Espacio de Trabajo Ideal</h1>
        <p className="text-lg text-text-dark">Reserva escritorios y salas de reuniones al instante.</p>
        <div className="flex justify-center gap-2 max-w-lg mx-auto">
          <Input placeholder="Ciudad o ubicación..." />
          <Button className="bg-primary text-white hover:bg-secondary">
            <Search className="mr-2 h-4 w-4" /> Buscar
          </Button>
        </div>
      </section>

      {/* Features Section */}
      <section className="grid grid-cols-1 md:grid-cols-3 gap-6">
        <Card className="border-primary">
          <CardHeader className="flex flex-row items-center gap-2">
            <Wifi className="h-6 w-6 text-primary" />
            <CardTitle className="text-text-dark">Conexión Ultra Rápida</CardTitle>
          </CardHeader>
          <CardContent className="text-text-dark">Internet de alta velocidad para que nunca pares de trabajar.</CardContent>
        </Card>
        <Card className="border-primary">
          <CardHeader className="flex flex-row items-center gap-2">
            <Coffee className="h-6 w-6 text-secondary" />
            <CardTitle className="text-text-dark">Zona de Café</CardTitle>
          </CardHeader>
          <CardContent className="text-text-dark">Café artesanal y áreas de descanso para recargar energías.</CardContent>
        </Card>
        <Card className="border-primary">
          <CardHeader className="flex flex-row items-center gap-2">
            <Zap className="h-6 w-6 text-primary" />
            <CardTitle className="text-text-dark">Ambiente Productivo</CardTitle>
          </CardHeader>
          <CardContent className="text-text-dark">Espacios diseñados para maximizar tu enfoque y creatividad.</CardContent>
        </Card>
      </section>

      {/* CTA Section */}
      <section className="text-center bg-primary text-white p-12 rounded-lg">
        <h2 className="text-3xl font-bold mb-4">¿Listo para empezar?</h2>
        <Button size="lg" className="bg-secondary text-text-dark hover:bg-white">Explorar todos los espacios</Button>
      </section>
    </div>
  );
};

export default HomePage;
