import { NextRequest, NextResponse } from "next/server";
import axios from "axios";
import { BusinessHours } from "@/types/BusinessHours";

export async function GET(req: NextRequest) {
  try {
    const response = await axios.get<BusinessHours[]>(
      `${process.env.NEXT_PUBLIC_API_URL || "http://localhost:8000/api/v1"}/business-hours`,
    );
    if (response.status !== 200) {
      return NextResponse.json(
        { error: "Failed to fetch business hours" },
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
