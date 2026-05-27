import { NextRequest, NextResponse } from "next/server";
import axios from "axios";
import { BusinessHours } from "@/types/BusinessHours";

export async function PUT(req: NextRequest) {
  try {
    const body = await req.json();
    const response = await axios.put<BusinessHours>(
      `${process.env.NEXT_PUBLIC_API_URL || "http://localhost:8080/api/v1"}/business-hours`,
      body,
    );
    if (response.status !== 200) {
      return NextResponse.json(
        { error: "Failed to update business hours" },
        { status: response.status }
      );
    }
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
