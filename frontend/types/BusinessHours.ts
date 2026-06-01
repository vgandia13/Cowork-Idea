export interface BusinessHours {
    id?: string;
    name: string;
    is_active: boolean;
    is_default: boolean;
    timezone: string;
    monday_start_time?: string;
    monday_end_time?: string;
    tuesday_start_time?: string;
    tuesday_end_time?: string;
    wednesday_start_time?: string;
    wednesday_end_time?: string;
    thursday_start_time?: string;
    thursday_end_time?: string;
    friday_start_time?: string;
    friday_end_time?: string;
    saturday_start_time?: string;
    saturday_end_time?: string;
    sunday_start_time?: string;
    sunday_end_time?: string;
    holiday_calendar_id?: string;
}