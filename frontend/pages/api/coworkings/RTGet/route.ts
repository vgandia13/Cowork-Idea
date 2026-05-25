import { NextRequest, NextResponse } from 'next/server';

export async function GET(req: NextRequest) {
  try {
    const { searchParams } = new URL(req.url);
    const id = searchParams.get('id');
    
    if (!id) {
      return NextResponse.json({ error: 'ID requerido' }, { status: 400 });
    }

    // Simulation of coworking retrieval (stub)
    return NextResponse.json({ 
        id: id,
        name: "Coworking Centro Madrid",
        slug: "centro-madrid",
        city: "Madrid",
        active: true,
        spaces: [],
        amenities: []
    }, { status: 200 });

  } catch (error) {
    return NextResponse.json({ error: 'Error interno del servidor' }, { status: 500 });
  }
}
