import { NextRequest, NextResponse } from 'next/server';
import { Space, SpaceType, SpaceStatus } from '@/types/Space';

export async function POST(req: NextRequest) {
  try {
    const body = await req.json();

    const { coworkingId, name, slug, type, description, capacity, pricePerHour, pricePerDay, pricePerMonth, size, amenities } = body as Partial<Space>;
    
    // Validate required fields
    if (!coworkingId || !name || !slug || !type) {
      return NextResponse.json({ error: 'Datos inválidos o campos requeridos faltantes' }, { status: 400 });
    }

    // Simulation of space creation (stub)
    const newSpace: Space = { 
        id: "550e8400-e29b-41d4-a716-446655440002",
        coworkingId: coworkingId!,
        name: name!,
        slug: slug!,
        type: type!,
        description: description || '',
        capacity: capacity || 0,
        pricePerHour: pricePerHour || 0,
        pricePerDay: pricePerDay || 0,
        pricePerMonth: pricePerMonth || 0,
        size: size || 0,
        amenities: amenities || '',
        images: [],
        available: true,
        status: SpaceStatus.Active
    };
    
    return NextResponse.json(newSpace, { status: 201 });

  } catch (error) {
    return NextResponse.json({ error: 'Error interno del servidor' }, { status: 500 });
  }
}
