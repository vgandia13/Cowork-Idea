import { NextRequest, NextResponse } from 'next/server';
import { Service } from '@/types/Service';

export async function POST(req: NextRequest) {
  try {
    const body = await req.json();
    const { name } = body as Partial<Service>;
    if (!name) return NextResponse.json({ error: 'Nombre requerido' }, { status: 400 });
    return NextResponse.json({ id: "1", ...body }, { status: 201 });
  } catch (error) {
    return NextResponse.json({ error: 'Error' }, { status: 500 });
  }
}
