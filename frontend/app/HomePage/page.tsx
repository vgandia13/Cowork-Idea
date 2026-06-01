"use client";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import {
  Search,
  Zap,
  Coffee,
  Wifi,
  Users,
  Maximize2,
  CheckCircle2,
  XCircle,
} from "lucide-react";
import { useEffect, useState } from "react";
import { Space, SpaceType } from "@/types/Space";

const HomePage = () => {
  const [spaces, setSpaces] = useState<Space[]>([]);

  useEffect(() => {
    const fetchSpaces = async () => {
      try {
        const response = await fetch("/api/spaces/RTGetAll", { method: "GET" });
        const resData = await response.json();
        console.log("Datos recibidos de la API:", resData);
        setSpaces(resData.data || []);
      } catch (error) {
        console.error("Error al cargar los espacios:", error);
      }
    };
    fetchSpaces();
  }, []);

  // Función auxiliar para formatear los tipos de espacio visualmente
  const getTypeBadge = (type: SpaceType) => {
    const styles: Record<SpaceType, string> = {
      [SpaceType.Flex]: "bg-blue-50 text-blue-700 border-blue-200",
      [SpaceType.Fixed]: "bg-indigo-50 text-indigo-700 border-indigo-200",
      [SpaceType.Private]: "bg-purple-50 text-purple-700 border-purple-200",
      [SpaceType.Meeting]: "bg-amber-50 text-amber-700 border-amber-200",
      [SpaceType.Event]: "bg-rose-50 text-rose-700 border-rose-200",
    };

    const labels: Record<SpaceType, string> = {
      [SpaceType.Flex]: "Escritorio Flex",
      [SpaceType.Fixed]: "Escritorio Fijo",
      [SpaceType.Private]: "Oficina Privada",
      [SpaceType.Meeting]: "Sala de Reuniones",
      [SpaceType.Event]: "Espacio de Eventos",
    };

    return (
      <span
        className={`text-xs font-medium px-2.5 py-1 rounded-full border ${styles[type]}`}
      >
        {labels[type] || type}
      </span>
    );
  };

  return (
    <div className="min-h-screen bg-slate-50 p-8 space-y-16">
      {/* Hero Section */}
      <section className="text-center space-y-4 max-w-2xl mx-auto pt-8">
        <h1 className="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">
          Tu Espacio de Trabajo Ideal
        </h1>
        <p className="text-lg text-slate-600">
          Reserva escritorios y salas de reuniones al instante. Sin fricciones.
        </p>
        <div className="flex flex-col sm:flex-row justify-center gap-2 max-w-lg mx-auto pt-4">
          <Input
            placeholder="Ciudad o ubicación..."
            className="bg-white shadow-sm"
          />
          <Button className="bg-primary text-white hover:bg-primary/95 shadow-sm font-medium">
            <Search className="mr-2 h-4 w-4" /> Buscar
          </Button>
        </div>
      </section>

      {/* Features Section */}
      <section className="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
        <Card className="border-none shadow-sm bg-white hover:shadow-md transition-shadow">
          <CardHeader className="flex flex-row items-center gap-3 pb-2">
            <div className="p-2 bg-blue-50 rounded-lg text-blue-600">
              <Wifi className="h-6 w-6" />
            </div>
            <CardTitle className="text-xl font-bold text-slate-800">
              Conexión Ultra Rápida
            </CardTitle>
          </CardHeader>
          <CardContent className="text-slate-600 text-sm leading-relaxed">
            Internet de alta velocidad simétrica para que tus videollamadas y
            despliegues nunca se detengan.
          </CardContent>
        </Card>

        <Card className="border-none shadow-sm bg-white hover:shadow-md transition-shadow">
          <CardHeader className="flex flex-row items-center gap-3 pb-2">
            <div className="p-2 bg-amber-50 rounded-lg text-amber-600">
              <Coffee className="h-6 w-6" />
            </div>
            <CardTitle className="text-xl font-bold text-slate-800">
              Zona de Café
            </CardTitle>
          </CardHeader>
          <CardContent className="text-slate-600 text-sm leading-relaxed">
            Café de especialidad ilimitado, té y áreas de descanso diseñadas
            para desconectar y socializar.
          </CardContent>
        </Card>

        <Card className="border-none shadow-sm bg-white hover:shadow-md transition-shadow">
          <CardHeader className="flex flex-row items-center gap-3 pb-2">
            <div className="p-2 bg-emerald-50 rounded-lg text-emerald-600">
              <Zap className="h-6 w-6" />
            </div>
            <CardTitle className="text-xl font-bold text-slate-800">
              Ambiente Productivo
            </CardTitle>
          </CardHeader>
          <CardContent className="text-slate-600 text-sm leading-relaxed">
            Zonas silenciosas con mobiliario ergonómico para maximizar tu
            enfoque, rendimiento y creatividad.
          </CardContent>
        </Card>
      </section>

      {/* Spaces Section */}
      <section className="space-y-6 max-w-6xl mx-auto">
        <div className="flex items-center justify-between border-b border-slate-200 pb-4">
          <div>
            <h2 className="text-2xl font-bold text-slate-900">
              Espacios Destacados
            </h2>
            <p className="text-sm text-slate-500">
              Espacios listos para reservar por horas, días o meses
            </p>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {spaces.map((space) => (
            <Card
              key={space.id}
              className="flex flex-col overflow-hidden border border-slate-200/80 bg-white hover:border-slate-300 hover:shadow-lg transition-all duration-200 rounded-xl"
            >
              {/* Card Header con Badge de Tipo y Disponibilidad */}
              <div className="p-5 pb-3 flex items-start justify-between gap-2">
                <div className="space-y-1.5">
                  <div className="mb-1">{getTypeBadge(space.type)}</div>
                  <h3 className="text-lg font-bold text-slate-900 tracking-tight leading-snug">
                    {space.name}
                  </h3>
                </div>

                {/* Indicador de Disponibilidad */}
                <div>
                  {space.available ? (
                    <span className="flex items-center text-xs font-medium text-emerald-700 bg-emerald-50 px-2 py-1 rounded-md border border-emerald-200">
                      <CheckCircle2 className="w-3.5 h-3.5 mr-1 text-emerald-600" />{" "}
                      Disponible
                    </span>
                  ) : (
                    <span className="flex items-center text-xs font-medium text-slate-500 bg-slate-100 px-2 py-1 rounded-md">
                      <XCircle className="w-3.5 h-3.5 mr-1 text-slate-400" />{" "}
                      Ocupado
                    </span>
                  )}
                </div>
              </div>

              {/* Descripción */}
              <CardContent className="px-5 py-2 grow">
                <p className="text-sm text-slate-600 line-clamp-2 leading-relaxed">
                  {space.description ||
                    "Sin descripción disponible para este espacio."}
                </p>

                {/* Características técnicas (Capacidad y tamaño) */}
                <div className="flex items-center gap-4 mt-4 pt-4 border-t border-slate-100 text-slate-500 text-xs">
                  <div className="flex items-center gap-1">
                    <Users className="w-4 h-4 text-slate-400" />
                    <span>
                      Capacidad:{" "}
                      <strong className="text-slate-700">
                        {space.capacity} pers.
                      </strong>
                    </span>
                  </div>
                  {space.size_m2 > 0 && (
                    <div className="flex items-center gap-1">
                      <Maximize2 className="w-4 h-4 text-slate-400" />
                      <span>
                        Dimensión:{" "}
                        <strong className="text-slate-700">
                          {space.size_m2} m²
                        </strong>
                      </span>
                    </div>
                  )}
                </div>
              </CardContent>

              {/* Footer con los Precios y Acción */}
              <div className="p-5 pt-3 bg-slate-50/70 border-t border-slate-100 flex items-center justify-between mt-auto">
                <div>
                  <p className="text-xs text-slate-400 font-medium uppercase tracking-wider">
                    Desde
                  </p>
                  <p className="text-slate-900 font-extrabold text-xl">
                    {space.price_hour > 0 ? (
                      <>
                        {space.price_hour}€
                        <span className="text-xs font-normal text-slate-500">
                          /hora
                        </span>
                      </>
                    ) : space.price_day > 0 ? (
                      <>
                        {space.price_day}€
                        <span className="text-xs font-normal text-slate-500">
                          /día
                        </span>
                      </>
                    ) : (
                      <>
                        {space.price_month}€
                        <span className="text-xs font-normal text-slate-500">
                          /mes
                        </span>
                      </>
                    )}
                  </p>
                </div>

                <Button
                  disabled={!space.available}
                  size="sm"
                  className={`font-semibold shadow-sm ${
                    space.available
                      ? "bg-slate-900 text-white hover:bg-slate-800"
                      : "bg-slate-200 text-slate-400 cursor-not-allowed"
                  }`}
                >
                  Reservar
                </Button>
              </div>
            </Card>
          ))}
        </div>
      </section>

      {/* CTA Section */}
      <section className="text-center bg-slate-900 text-white p-12 rounded-2xl max-w-6xl mx-auto shadow-sm">
        <h2 className="text-3xl font-bold mb-3">¿Listo para empezar?</h2>
        <p className="text-slate-400 max-w-md mx-auto mb-6 text-sm">
          Únete a nuestra comunidad y accede a flexibilidad total en tus
          espacios de trabajo.
        </p>
        <Button
          size="lg"
          className="bg-white text-slate-900 hover:bg-slate-100 font-semibold shadow-md"
        >
          Explorar todos los espacios
        </Button>
      </section>
    </div>
  );
};

export default HomePage;
