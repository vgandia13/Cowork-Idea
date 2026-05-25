export interface Branch {
    id: string;
    name: string;
    slug: string;
    address: string;
    city: string;
    country: string;
    postalCode: string;
    phone: string;
    email: string;
    schedule: string;
    description: string;
    latitude: number;
    longitude: number;
    cover: string;
    gallery: string[];
    services: string[];
    active: boolean;
}