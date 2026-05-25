import { NextRequest, NextResponse } from 'next/server';
import { Subscription } from '@/types/Subscription';

export async function POST(req: NextRequest) {
  try {
    const body = await req.json();
    const sub = body as Partial<Subscription>;
    if (!sub.userId || !sub.planId || !sub.startDate || !sub.endDate) {
      return NextResponse.json({ error: 'Campos requeridos faltantes' }, { status: 400 });
    }
    return NextResponse.json({ id: "1", ...body }, { status: 201 });
  } catch (error) {
    return NextResponse.json({ error: 'Error' }, { status: 500 });
  }
}
