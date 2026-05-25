import {
  Card,
  CardContent,
  CardFooter,
  CardHeader,
} from "@/components/ui/card";

const HomePage = () => {
  return (
    <div className="flex items-center justify-center">
      <Card>
        <CardHeader>Header</CardHeader>
        <CardContent>Bienvenido a la página de inicio</CardContent>
        <CardFooter>Footer</CardFooter>
      </Card>
    </div>
  );
};
export default HomePage;
