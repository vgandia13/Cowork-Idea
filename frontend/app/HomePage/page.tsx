import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Search, Zap, Coffee, Wifi } from "lucide-react";

const HomePage = () => {
  return (
    <div className="min-h-screen bg-gray-50 p-8 space-y-12">
      {/* Hero Section */}
      <section className="text-center space-y-4">
        <h1 className="text-4xl font-bold tracking-tight">Tu Espacio de Trabajo Ideal</h1>
        <p className="text-lg text-gray-600">Reserva escritorios y salas de reuniones al instante.</p>
        <div className="flex justify-center gap-2 max-w-lg mx-auto">
          <Input placeholder="Ciudad o ubicación..." />
          <Button>
            <Search className="mr-2 h-4 w-4" /> Buscar
          </Button>
        </div>
      </section>

      {/* Features Section */}
      <section className="grid grid-cols-1 md:grid-cols-3 gap-6">
        <Card>
          <CardHeader className="flex flex-row items-center gap-2">
            <Wifi className="h-6 w-6 text-blue-500" />
            <CardTitle>Conexión Ultra Rápida</CardTitle>
          </CardHeader>
          <CardContent>Internet de alta velocidad para que nunca pares de trabajar.</CardContent>
        </Card>
        <Card>
          <CardHeader className="flex flex-row items-center gap-2">
            <Coffee className="h-6 w-6 text-amber-600" />
            <CardTitle>Zona de Café</CardTitle>
          </CardHeader>
          <CardContent>Café artesanal y áreas de descanso para recargar energías.</CardContent>
        </Card>
        <Card>
          <CardHeader className="flex flex-row items-center gap-2">
            <Zap className="h-6 w-6 text-yellow-500" />
            <CardTitle>Ambiente Productivo</CardTitle>
          </CardHeader>
          <CardContent>Espacios diseñados para maximizar tu enfoque y creatividad.</CardContent>
        </Card>
      </section>

      {/* CTA Section */}
      <section className="text-center bg-blue-600 text-white p-12 rounded-lg">
        <h2 className="text-3xl font-bold mb-4">¿Listo para empezar?</h2>
        <Button size="lg" variant="secondary">Explorar todos los espacios</Button>
      </section>
    </div>
  );
};

export default HomePage;
