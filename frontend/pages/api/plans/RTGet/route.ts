import { NextRequest, NextResponse } from 'next/server';
import { PlanDuration } from '@/types/MembershipPlan';

export async function GET(req: NextRequest) {
  try {
    const { searchParams } = new URL(req.url);
    const id = searchParams.get('id');
    if (!id) return NextResponse.json({ error: 'ID requerido' }, { status: 400 });
    return NextResponse.json({ 
        id, 
        name: "Basic Plan", 
        description: "Basic plan", 
        price: 50, 
        duration: PlanDuration.Month, 
        credits: 10, 
        meetingHours: 2, 
        access247: false, 
        active: true 
    }, { status: 200 });
  } catch (error) {
    return NextResponse.json({ error: 'Error' }, { status: 500 });
  }
}
