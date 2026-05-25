import { NextRequest, NextResponse } from 'next/server';
import { Booking } from '@/types/Booking';

export async function POST(req: NextRequest) {
  try {
    const body = await req.json();
    const booking = body as Partial<Booking>;
    if (!booking.userId || !booking.spaceId || !booking.startDate || !booking.endDate) {
      return NextResponse.json({ error: 'Campos requeridos faltantes' }, { status: 400 });
    }
    return NextResponse.json({ id: "1", ...body }, { status: 201 });
  } catch (error) {
    return NextResponse.json({ error: 'Error' }, { status: 500 });
  }
}
