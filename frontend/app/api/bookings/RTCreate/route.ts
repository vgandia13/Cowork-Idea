import { NextRequest, NextResponse } from "next/server";
import { proxyRequest } from "@/lib/api";
import { Booking } from "@/types/Booking";

export async function POST(req: NextRequest) {
  try {
    const response = await proxyRequest(req, {
      method: "POST",
      url: "/bookings",
      data: await req.json(),
    });
    return NextResponse.json(response.data, { status: 201 });
  } catch (error: any) {
    return NextResponse.json(
      { error: error.response?.data?.message || "Error en la API externa" },
      { status: error.response?.status || 500 }
    );
  }
}
