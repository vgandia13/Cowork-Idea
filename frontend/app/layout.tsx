import type { Metadata } from "next";
import "./globals.css";

export const metadata: Metadata = {
  title: "CoworkSpace",
  description: "Reserva tu espacio de coworking",
};

import { AuthProvider } from "./Context/AuthContext";
import Navbar from "@/components/Navbar";

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="es">
      <body>
        <AuthProvider>
          <Navbar />
          {children}
        </AuthProvider>
      </body>
    </html>
  );
}
