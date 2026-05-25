import { NextRequest, NextResponse } from 'next/server';
import { SubscriptionStatus } from '@/types/Subscription';

export async function GET(req: NextRequest) {
  try {
    const { searchParams } = new URL(req.url);
    const id = searchParams.get('id');
    if (!id) return NextResponse.json({ error: 'ID requerido' }, { status: 400 });
    return NextResponse.json({ 
        id, 
        userId: "u1", 
        planId: "p1", 
        startDate: new Date().toISOString(), 
        endDate: new Date().toISOString(), 
        autoRenewal: true, 
        status: SubscriptionStatus.Active 
    }, { status: 200 });
  } catch (error) {
    return NextResponse.json({ error: 'Error' }, { status: 500 });
  }
}
