import type { NextApiRequest, NextApiResponse } from "next";
import axios from "axios";
import { serialize } from "cookie";

const API_URL =
  process.env.NEXT_PUBLIC_API_URL || "http://localhost:8080/api/v1";

export default async function handler(
  req: NextApiRequest,
  res: NextApiResponse,
) {
  if (req.method !== "POST") {
    res.setHeader("Allow", ["POST"]);
    return res.status(405).json({ error: `Método ${req.method} no permitido` });
  }
  const { email, password } = req.body || {};
  if (!email || !password) {
    return res.status(400).json({ error: "Faltan credenciales" });
  }
  try {
    const response = await axios.post(`${API_URL}/login`, { email, password });
    const { token } = response.data;

    if (!token) {
      return res
        .status(500)
        .json({ error: "El servidor no devolvió un token válido" });
    }

    const serializedCookie = serialize("auth_token", token, {
      httpOnly: true,
      secure: process.env.NODE_ENV === "production",
      sameSite: "strict",
      maxAge: 60 * 60 * 24 * 7,
      path: "/",
    });

    res.setHeader("Set-Cookie", serializedCookie);

    const tokenParts = token.split(".");
    let userData = {};
    if (tokenParts.length === 3) {
      const payloadBase64 = tokenParts[1].replace(/-/g, "+").replace(/_/, "/");
      const payloadDecoded = Buffer.from(payloadBase64, "base64").toString(
        "utf-8",
      );
      userData = JSON.parse(payloadDecoded);
    }

    return res.status(200).json({ user: userData });
  } catch (error) {
    if (axios.isAxiosError(error)) {
      return res.status(error.response?.status || 500).json({
        error: error.response?.data?.message || "Error en la API externa",
      });
    }
    return res.status(500).json({ error: "Error interno del servidor" });
  }
}
