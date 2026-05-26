export interface BusinessHours {
    id?: string;
    name: string;
    isActive: boolean;
    isDefault: boolean;
    timezone: string;
    mondayStartTime?: string;
    mondayEndTime?: string;
    tuesdayStartTime?: string;
    tuesdayEndTime?: string;
    wednesdayStartTime?: string;
    wednesdayEndTime?: string;
    thursdayStartTime?: string;
    thursdayEndTime?: string;
    fridayStartTime?: string;
    fridayEndTime?: string;
    saturdayStartTime?: string;
    saturdayEndTime?: string;
    sundayStartTime?: string;
    sundayEndTime?: string;
    holidayCalendarId?: string;
}