import { NextRequest, NextResponse } from "next/server";
import { proxyRequest } from "@/lib/api";
import axios from "axios";

export async function POST(req: NextRequest) {
  try {
    const body = await req.json();
    const response = await proxyRequest(req, {
      method: "POST",
      url: "/auth/register",
      data: body,
    });
    return NextResponse.json(response.data, { status: 201 });
  } catch (error) {
    if (axios.isAxiosError(error)) {
      console.error("Error de Laravel:", error.response?.data);
      return NextResponse.json(
        { error: error.response?.data?.message || "Error en la API externa" },
        { status: error.response?.status || 500 },
      );
    }
    return NextResponse.json(
      { error: "Error interno del servidor" },
      { status: 500 },
    );
  }
}
