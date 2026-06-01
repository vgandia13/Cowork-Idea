export interface User {
    id?: string;
    first_name?: string;
    last_name?: string;
    email: string;
    phone?: string;
    password?: string;
    role: Role;
    registration_date?: Date;
    active: boolean;
}

export enum Role {
    Admin = "admin",
    Member = "member",
    Guest = "guest"
}