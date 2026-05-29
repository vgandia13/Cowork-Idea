import { NextRequest, NextResponse } from "next/server";
import { proxyRequest } from "@/lib/api";

export async function DELETE(req: NextRequest) {
  const { searchParams } = new URL(req.url);
  const id = searchParams.get("id");
  try {
    await proxyRequest(req, {
      method: "DELETE",
      url: `/subscriptions/${id}`,
    });
    return new NextResponse(null, { status: 204 });
  } catch (error: any) {
    return NextResponse.json(
      { error: error.response?.data?.message || "Error en la API externa" },
      { status: error.response?.status || 500 }
    );
  }
}
