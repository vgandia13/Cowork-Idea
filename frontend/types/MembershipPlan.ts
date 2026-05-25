export interface MembershipPlan {
    id: string;
    name: string;
    description: string;
    price: number;
    duration: PlanDuration;
    credits: number;
    meetingHours: number;
    access247: boolean;
    active: boolean;
}

export enum PlanDuration {
    Day = "day",
    Week = "week",
    Month = "month",
    Year = "year"
}
