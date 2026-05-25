import { NextRequest, NextResponse } from 'next/server';
import { PlanDuration } from '@/types/MembershipPlan';

export async function GET(req: NextRequest) {
  try {
    return NextResponse.json([{ 
        id: "1", 
        name: "Basic Plan", 
        description: "Basic plan", 
        price: 50, 
        duration: PlanDuration.Month, 
        credits: 10, 
        meetingHours: 2, 
        access247: false, 
        active: true 
    }], { status: 200 });
  } catch (error) {
    return NextResponse.json({ error: 'Error' }, { status: 500 });
  }
}
