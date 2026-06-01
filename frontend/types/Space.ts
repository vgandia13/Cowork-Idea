export interface Space {
    id: string;
    coworking_id: string;
    amenities: [];
    name: string;
    slug: string;
    type: SpaceType;
    description: string;
    capacity: number;
    price_hour: number;
    price_day: number;
    price_month: number;
    size_m2: number;
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