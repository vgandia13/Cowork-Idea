import { NextRequest, NextResponse } from 'next/server';

export async function POST(req: NextRequest) {
  try {
    const body = await req.json();

    // Validation
    const { first_name, last_name, email, password_hash, role } = body;
    
    // Validate required fields
    if (!first_name || !last_name || !email || !password_hash || !role) {
      return NextResponse.json({ error: 'Datos inválidos o campos requeridos faltantes' }, { status: 400 });
    }

    // Validate role
    const validRoles = ['admin', 'member', 'guest'];
    if (!validRoles.includes(role)) {
      return NextResponse.json({ error: 'Rol inválido' }, { status: 422 });
    }

    // Simulation of user creation (stub)
    return NextResponse.json({ 
        id: "550e8400-e29b-41d4-a716-446655440000",
        first_name,
        last_name,
        email,
        role,
        active: true,
        registration_date: new Date().toISOString()
    }, { status: 201 });

  } catch (error) {
    return NextResponse.json({ error: 'Error interno del servidor' }, { status: 500 });
  }
}
