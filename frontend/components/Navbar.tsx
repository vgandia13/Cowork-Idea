import { Button } from "@/components/ui/button";
import Link from "next/link";

const Navbar = () => {
  return (
    <nav className="flex items-center justify-between p-4 border-b bg-white">
      <div className="text-xl font-bold text-text-dark"><Link href="/">CoworkSpace</Link></div>
      <ul className="flex items-center gap-6 text-sm font-medium text-gray-600">
        <li>
          <Link href="/" className="hover:text-text-dark">Explorar</Link>
        </li>
        <li>
          <Link href="/nosotros" className="hover:text-text-dark">Nosotros</Link>
        </li>
      </ul>
      <div className="flex gap-2">
        <Button variant="ghost"><Link href="/login">Iniciar sesión</Link></Button>
        <Button><Link href="/register">Registrarse</Link></Button>
      </div>
    </nav>
  );
};

export default Navbar;
