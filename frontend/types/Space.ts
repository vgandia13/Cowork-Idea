export interface Space {
    id: string;
    coworkingId: string;
    amenities: string;
    name: string;
    slug: string;
    type: SpaceType;
    description: string;
    capacity: number;
    pricePerHour: number;
    pricePerDay: number;
    pricePerMonth: number;
    size: number;
    images: string[];
    available: boolean;
    status: SpaceStatus;
}

export enum SpaceType {
    Flex = "flex",
    Fixed = "fixed",
    Private = "private",
    Meeting = "meeting",
    Event = "event"
}

export enum SpaceStatus {
    Active = "active",
    Maintenance = "maintenance",
    Hidden = "hidden"
}