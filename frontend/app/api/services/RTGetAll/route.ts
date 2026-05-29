import { NextRequest, NextResponse } from "next/server";
import { proxyRequest } from "@/lib/api";
import { Service } from "@/types/Service";

export async function GET(req: NextRequest) {
  try {
    const response = await proxyRequest(req, {
      method: "GET",
      url: "/amenities",
    });
    return NextResponse.json(response.data, { status: 200 });
  } catch (error: any) {
    return NextResponse.json(
      { error: error.response?.data?.message || "Error en la API externa" },
      { status: error.response?.status || 500 }
    );
  }
}
