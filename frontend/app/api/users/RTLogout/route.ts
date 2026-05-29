import { NextRequest, NextResponse } from "next/server";
import { proxyRequest } from "@/lib/api";
import { serialize } from "cookie";

export async function POST(req: NextRequest) {
  try {
    // 1. Intentar invalidar el token en el backend
    // Laravel espera una petición autorizada (el token viene en el header gracias al proxy)
    const response = await proxyRequest(req, {
      method: "POST",
      url: "/auth/logout",
    });

    // 2. Limpiar la cookie independientemente de si el backend tuvo éxito o no
    // Si el backend responde 400 (no hay token) o 200 (éxito), procedemos a limpiar
    const expiredCookie = serialize("auth_token", "", {
      httpOnly: true,
      secure: process.env.NODE_ENV === "production",
      sameSite: "strict",
      expires: new Date(0),
      path: "/",
    });

    const finalResponse = NextResponse.json({ 
        message: response.status === 200 ? "Sesión cerrada correctamente" : "Sesión finalizada localmente" 
    });
    finalResponse.headers.append("Set-Cookie", expiredCookie);
    return finalResponse;
    
  } catch (error: any) {
    // Incluso si falla la petición al backend, debemos borrar la cookie local
    const expiredCookie = serialize("auth_token", "", {
      httpOnly: true,
      secure: process.env.NODE_ENV === "production",
      sameSite: "strict",
      expires: new Date(0),
      path: "/",
    });

    const response = NextResponse.json({ error: "Error al cerrar sesión" }, { status: 500 });
    response.headers.append("Set-Cookie", expiredCookie);
    return response;
  }
}
