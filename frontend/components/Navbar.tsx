"use client";
import { Button } from "@/components/ui/button";
import Link from "next/link";
import { useAuth } from "@/app/Context/AuthContext";
import { useRouter } from "next/navigation";
import { Skeleton } from "./ui/skeleton";
import { useMounted } from "@/app/hooks/useMounted";

const Navbar = () => {
  const mounted = useMounted();
  const { user, logout } = useAuth();
  const router = useRouter();

  const handleLogout = async () => {
    await fetch("/api/users/RTLogout", { method: "POST" });
    logout();
    router.push("/login");
  };

  if (!mounted) {
    return (
      <nav className="flex items-center justify-between p-4 border-b bg-white">
        <Skeleton className="text-xl font-bold text-text-dark" />
      </nav>
    );
  }

  return (
    <nav className="flex items-center justify-between p-4 border-b bg-white">
      <div className="text-xl font-bold text-text-dark">
        <Link href="/">CoworkSpace</Link>
      </div>
      <ul className="flex items-center gap-6 text-sm font-medium text-gray-600">
        <li>
          <Link href="/" className="hover:text-text-dark">
            Explorar
          </Link>
        </li>
        <li>
          <Link href="/nosotros" className="hover:text-text-dark">
            Nosotros
          </Link>
        </li>
      </ul>
      <div className="flex gap-2 items-center">
        {user ? (
          <>
            <Link
              href="/profile"
              className="text-sm text-gray-600 hover:text-text-dark"
            >
              {user.first_name} {user.last_name}
            </Link>
            <Button variant="ghost" onClick={handleLogout} className="h-9">
              Cerrar sesión
            </Button>
          </>
        ) : (
          <>
            <Button variant="ghost" asChild>
              <Link href="/login">Iniciar sesión</Link>
            </Button>
            <Button variant="outline" asChild>
              <Link href="/register">Registrarse</Link>
            </Button>
          </>
        )}
      </div>
    </nav>
  );
};

export default Navbar;
