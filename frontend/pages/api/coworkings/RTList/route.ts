import { NextRequest, NextResponse } from 'next/server';

export async function GET(req: NextRequest) {
  try {
    // Simulation of coworking list retrieval (stub)
    return NextResponse.json([
        { 
            id: "550e8400-e29b-41d4-a716-446655440001",
            name: "Coworking Centro Madrid",
            slug: "centro-madrid",
            active: true
        }
    ], { status: 200 });

  } catch (error) {
    return NextResponse.json({ error: 'Error interno del servidor' }, { status: 500 });
  }
}
