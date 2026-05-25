import { NextRequest, NextResponse } from 'next/server';
import { SubscriptionStatus } from '@/types/Subscription';

export async function GET(req: NextRequest) {
  try {
    return NextResponse.json([{ 
        id: "1", 
        userId: "u1", 
        planId: "p1", 
        startDate: new Date().toISOString(), 
        endDate: new Date().toISOString(), 
        autoRenewal: true, 
        status: SubscriptionStatus.Active 
    }], { status: 200 });
  } catch (error) {
    return NextResponse.json({ error: 'Error' }, { status: 500 });
  }
}
