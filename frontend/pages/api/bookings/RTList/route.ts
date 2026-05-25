import { NextRequest, NextResponse } from 'next/server';
import { BookingStatus } from '@/types/Booking';

export async function GET(req: NextRequest) {
  try {
    return NextResponse.json([{ 
        id: "1", 
        userId: "u1", 
        spaceId: "s1", 
        startDate: new Date().toISOString(), 
        endDate: new Date().toISOString(), 
        createdAt: new Date().toISOString(), 
        total: 100, 
        status: BookingStatus.Pending, 
        notes: "", 
        bookingCode: "ABC" 
    }], { status: 200 });
  } catch (error) {
    return NextResponse.json({ error: 'Error' }, { status: 500 });
  }
}
