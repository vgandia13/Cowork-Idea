import { NextRequest, NextResponse } from 'next/server';
import { BookingStatus } from '@/types/Booking';

export async function GET(req: NextRequest) {
  try {
    const { searchParams } = new URL(req.url);
    const id = searchParams.get('id');
    if (!id) return NextResponse.json({ error: 'ID requerido' }, { status: 400 });
    return NextResponse.json({ 
        id, 
        userId: "u1", 
        spaceId: "s1", 
        startDate: new Date().toISOString(), 
        endDate: new Date().toISOString(), 
        createdAt: new Date().toISOString(), 
        total: 100, 
        status: BookingStatus.Pending, 
        notes: "", 
        bookingCode: "ABC" 
    }, { status: 200 });
  } catch (error) {
    return NextResponse.json({ error: 'Error' }, { status: 500 });
  }
}
