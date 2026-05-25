import { NextRequest, NextResponse } from 'next/server';
import { Branch } from '@/types/Branch';

export async function POST(req: NextRequest) {
  try {
    const body = await req.json();

    // Validation
    const { name, slug, address, city, country, postalCode, phone, email, description, latitude, longitude, schedule, services } = body as Partial<Branch>;
    
    // Validate required fields
    if (!name || !slug || !address || !city || !country) {
      return NextResponse.json({ error: 'Datos inválidos o campos requeridos faltantes' }, { status: 400 });
    }

    // Simulation of coworking creation (stub)
    const newCoworking: Branch = { 
        id: "550e8400-e29b-41d4-a716-446655440001",
        name: name,
        slug: slug,
        address: address,
        city: city,
        country: country,
        postalCode: postalCode || '',
        phone: phone || '',
        email: email || '',
        description: description || '',
        latitude: latitude || 0,
        longitude: longitude || 0,
        schedule: schedule || '',
        services: services || [],
        cover: '',
        gallery: [],
        active: true
    };
    
    return NextResponse.json(newCoworking, { status: 201 });

  } catch (error) {
    return NextResponse.json({ error: 'Error interno del servidor' }, { status: 500 });
  }
}
