import { NextRequest, NextResponse } from 'next/server';
import { MembershipPlan } from '@/types/MembershipPlan';

export async function POST(req: NextRequest) {
  try {
    const body = await req.json();
    const plan = body as Partial<MembershipPlan>;
    if (!plan.name || !plan.price) {
      return NextResponse.json({ error: 'Nombre y precio requeridos' }, { status: 400 });
    }
    return NextResponse.json({ id: "1", ...body }, { status: 201 });
  } catch (error) {
    return NextResponse.json({ error: 'Error' }, { status: 500 });
  }
}
