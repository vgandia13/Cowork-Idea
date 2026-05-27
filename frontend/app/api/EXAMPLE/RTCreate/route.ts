import { NextRequest, NextResponse } from "next/server";
import axios from "axios";
import { BusinessHours } from "@/types/BusinessHours";

export async function POST(req: NextRequest) {
  try {
    const body = await req.json();
    const response = await axios.post<BusinessHours>(
      `${process.env.NEXT_PUBLIC_API_URL || "http://localhost:8080/api/v1"}/business-hours`,
      body,
    );
    if (response.status !== 201) {
      return NextResponse.json(
        { error: "Failed to create business hours" },
        { status: response.status }
      );
    }
    return NextResponse.json(response.data, { status: 201 });
  } catch (error) {
    if (error instanceof Error) {
      return NextResponse.json({ error: error.message }, { status: 500 });
    }

    if (axios.isAxiosError(error)) {
      return NextResponse.json(
        {
          error: error.response?.data?.message || "Error en la API externa",
        },
        { status: error.response?.status || 500 }
      );
    }
  }
}
