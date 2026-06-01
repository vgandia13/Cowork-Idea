export interface Booking {
    id: string;
    user_id: string;
    space_id: string;
    start_date: Date;
    end_date: Date;
    created_at: Date;
    total: number;
    status: BookingStatus;
    notes: string;
    booking_code: string;
}

export enum BookingStatus {
    Pending = "pending",
    Confirmed = "confirmed",
    Cancelled = "cancelled",
    Completed = "completed"
}
