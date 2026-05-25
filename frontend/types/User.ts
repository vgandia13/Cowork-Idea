export interface User {
    id: string;
    firstName: string;
    lastName: string;
    email: string;
    phone: string;
    password: string;
    avatarUrl: string;
    company: string;
    role: Role;
    bio: string;
    registrationDate: Date;
    active: boolean;
}

export enum Role {
    Admin = "admin",
    Member = "member",
    Guest = "guest"
}