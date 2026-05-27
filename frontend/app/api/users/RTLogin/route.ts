import { NextRequest, NextResponse } from "next/server";
import axios from "axios";
import { serialize } from "cookie";

const API_URL = "http://localhost:8080/api/v1/auth";

export async function POST(req: NextRequest) {
  const body = await req.json();
  const { email, password } = body || {};

  if (!email || !password) {
    return NextResponse.json({ error: "Faltan credenciales" }, { status: 400 });
  }

  try {
    const response = await axios.post(`${API_URL}/login`, { email, password });
    const { token } = response.data;

    if (!token) {
      return NextResponse.json(
        { error: "El servidor no devolvió un token válido" },
        { status: 500 }
      );
    }

    const serializedCookie = serialize("auth_token", token, {
      httpOnly: true,
      secure: process.env.NODE_ENV === "production",
      sameSite: "strict",
      maxAge: 60 * 60 * 24 * 7,
      path: "/",
    });

    const tokenParts = token.split(".");
    let userData = {};
    if (tokenParts.length === 3) {
      const payloadBase64 = tokenParts[1].replace(/-/g, "+").replace(/_/g, "/");
      const payloadDecoded = Buffer.from(payloadBase64, "base64").toString(
        "utf-8",
      );
      userData = JSON.parse(payloadDecoded);
    }

    const responseData = NextResponse.json({ user: userData });
    responseData.headers.append("Set-Cookie", serializedCookie);
    return responseData;
  } catch (error) {
    if (axios.isAxiosError(error)) {
      return NextResponse.json(
        { error: error.response?.data?.message || "Error en la API externa" },
        { status: error.response?.status || 500 }
      );
    }
    return NextResponse.json({ error: "Error interno del servidor" }, { status: 500 });
  }
}
