import { NextRequest, NextResponse } from "next/server";
import { proxyRequest } from "@/lib/api";
import { User } from "@/types/User";

export async function POST(req: NextRequest) {
  try {
    const body = await req.json();
    const response = await proxyRequest(req, {
      method: "POST",
      url: "/users",
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
