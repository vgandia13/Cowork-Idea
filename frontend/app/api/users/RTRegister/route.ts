import { NextRequest, NextResponse } from "next/server";
import axios from "axios";
import { User } from "@/types/User";

const API_URL = process.env.NEXT_PUBLIC_API_URL || "http://localhost:8000/api/v1";

export async function POST(req: NextRequest) {
  try {
    const body = await req.json();
    const response = await axios.post<Partial<User>>(`${API_URL}/users`, body);
    return NextResponse.json(response.data, { status: 201 });
  } catch (error) {
    if (axios.isAxiosError(error)) {
      return NextResponse.json(
        { error: error.response?.data?.message || "Error en la API externa" },
        { status: error.response?.status || 500 }
      );
    }
    if (error instanceof Error) {
      return NextResponse.json({ error: error.message }, { status: 500 });
    }
    return NextResponse.json({ error: "Error desconocido" }, { status: 500 });
  }
}
