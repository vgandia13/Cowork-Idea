import { NextRequest, NextResponse } from "next/server";
import { proxyRequest } from "@/lib/api";
import { User } from "@/types/User";

export async function PUT(req: NextRequest) {
  const { searchParams } = new URL(req.url);
  const id = searchParams.get("id");
  const body = await req.json();
  try {
    const response = await proxyRequest(req, {
      method: "PUT",
      url: `/users/${id}`,
      data: body as Partial<User>,
    });
    return NextResponse.json(response.data, { status: 200 });
  } catch (error) {
    return NextResponse.json(
      { error: error.response?.data?.message || "Error en la API externa" },
      { status: error.response?.status || 500 }
    );
  }
}
