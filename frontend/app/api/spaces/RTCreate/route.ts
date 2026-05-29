import { NextRequest, NextResponse } from "next/server";
import { proxyRequest } from "@/lib/api";
import { Space } from "@/types/Space";

export async function POST(req: NextRequest) {
  const body = await req.json();
  try {
    const response = await proxyRequest(req, {
      method: "POST",
      url: "/spaces",
      data: body,
    });
    return NextResponse.json(response.data, { status: 201 });
  } catch (error: any) {
    return NextResponse.json(
      { error: error.response?.data?.message || "Error en la API externa" },
      { status: error.response?.status || 500 }
    );
  }
}
