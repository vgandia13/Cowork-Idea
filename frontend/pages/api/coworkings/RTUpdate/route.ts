import { NextRequest, NextResponse } from 'next/server';

export async function PUT(req: NextRequest) {
  try {
    const { searchParams } = new URL(req.url);
    const id = searchParams.get('id');
    
    if (!id) {
      return NextResponse.json({ error: 'ID requerido' }, { status: 400 });
    }

    const body = await req.json();

    // Validation (same as POST but partial update allowed? Let's assume full update)
    const { name, slug, address, city, country } = body;
    
    if (!name || !slug || !address || !city || !country) {
      return NextResponse.json({ error: 'Datos inválidos o campos requeridos faltantes' }, { status: 400 });
    }

    // Simulation of coworking update (stub)
    return NextResponse.json({ 
        id,
        ...body,
        active: true
    }, { status: 200 });

  } catch (error) {
    return NextResponse.json({ error: 'Error interno del servidor' }, { status: 500 });
  }
}
