import { NextRequest, NextResponse } from "next/server";
import { proxyRequest } from "@/lib/api";
import { BusinessHours } from "@/types/BusinessHours";

export async function GET(req: NextRequest) {
  const { searchParams } = new URL(req.url);
  const id = searchParams.get("id");
  try {
    const response = await proxyRequest(req, {
      method: "GET",
      url: `/business-hours/${id}`,
    });
    return NextResponse.json(response.data, { status: 200 });
  } catch (error: any) {
    return NextResponse.json(
      { error: error.response?.data?.message || "Error en la API externa" },
      { status: error.response?.status || 500 }
    );
  }
}
