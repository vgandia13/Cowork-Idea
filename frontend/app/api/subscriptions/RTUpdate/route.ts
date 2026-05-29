import { NextRequest, NextResponse } from "next/server";
import { proxyRequest } from "@/lib/api";
import { Subscription } from "@/types/Subscription";

export async function PUT(req: NextRequest) {
  const { searchParams } = new URL(req.url);
  const id = searchParams.get("id");
  const body = await req.json();
  try {
    const response = await proxyRequest(req, {
      method: "PUT",
      url: `/subscriptions/${id}`,
      data: body,
    });
    return NextResponse.json(response.data, { status: 200 });
  } catch (error: any) {
    return NextResponse.json(
      { error: error.response?.data?.message || "Error en la API externa" },
      { status: error.response?.status || 500 }
    );
  }
}
