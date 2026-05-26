import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";

const AboutPage = () => {
  return (
    <div className="min-h-screen bg-background-light p-8 space-y-8 max-w-4xl mx-auto">
      <h1 className="text-4xl font-bold text-center text-text-dark">Sobre Nosotros</h1>
      
      <Card className="border-primary">
        <CardHeader>
          <CardTitle className="text-primary">Nuestra Misión</CardTitle>
        </CardHeader>
        <CardContent className="text-text-dark leading-relaxed">
          En CoworkSpace, nuestra misión es transformar la manera en que trabajas. 
          Proporcionamos espacios colaborativos que inspiran creatividad, 
          fomentan la conexión entre profesionales y optimizan la productividad.
        </CardContent>
      </Card>

      <Card className="border-secondary">
        <CardHeader>
          <CardTitle className="text-secondary">Nuestros Valores</CardTitle>
        </CardHeader>
        <CardContent className="text-text-dark leading-relaxed">
          <ul className="list-disc pl-5 space-y-2">
            <li><strong>Comunidad:</strong> Creemos en el poder de colaborar.</li>
            <li><strong>Flexibilidad:</strong> Adaptamos los espacios a tus necesidades.</li>
            <li><strong>Sostenibilidad:</strong> Espacios diseñados de manera eficiente.</li>
            <li><strong>Innovación:</strong> Tecnología de punta en cada rincón.</li>
          </ul>
        </CardContent>
      </Card>
    </div>
  );
};

export default AboutPage;
