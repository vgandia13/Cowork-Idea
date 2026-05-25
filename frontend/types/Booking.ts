export interface Booking {
    id: string;
    userId: string;
    spaceId: string;
    startDate: Date;
    endDate: Date;
    createdAt: Date;
    total: number;
    status: BookingStatus;
    notes: string;
    bookingCode: string;
}

export enum BookingStatus {
    Pending = "pending",
    Confirmed = "confirmed",
    Cancelled = "cancelled",
    Completed = "completed"
}
