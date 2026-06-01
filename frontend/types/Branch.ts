import { Service } from "./Service";

export interface Branch {
    id: string;
    name: string;
    slug: string;
    address: string;
    city: string;
    postal_code: string;
    phone: string;
    email: string;
    schedule: string;
    description: string;
    latitude: number;
    longitude: number;
    cover: string;
    gallery: string[];
    services: Service[];
    active: boolean;
}