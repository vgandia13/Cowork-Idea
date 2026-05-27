import { NextRequest, NextResponse } from "next/server";
import axios from "axios";
import { Branch } from "@/types/Branch";

const API_URL = process.env.NEXT_PUBLIC_API_URL || "http://localhost:8080/api/v1";

export async function GET(req: NextRequest) {
  try {
    const response = await axios.get<Branch[]>(`${API_URL}/coworkings`);
    return NextResponse.json(response.data, { status: 200 });
  } catch (error) {
    if (axios.isAxiosError(error)) {
      return NextResponse.json(
        {
          error: error.response?.data?.message || "Error en la API externa",
        },
        { status: error.response?.status || 500 }
      );
    }
    if (error instanceof Error) {
      return NextResponse.json({ error: error.message }, { status: 500 });
    }
  }
}
