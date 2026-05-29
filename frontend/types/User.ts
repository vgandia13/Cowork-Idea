export interface User {
    id?: string;
    firstName?: string;
    lastName?: string;
    email: string;
    phone?: string;
    password?: string;
    role: Role;
    registrationDate?: Date;
    active: boolean;
}

export enum Role {
    Admin = "admin",
    Member = "member",
    Guest = "guest"
}