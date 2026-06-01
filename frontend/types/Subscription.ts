export interface Subscription {
    id: string;
    user_id: string;
    plan_id: string;
    start_date: Date;
    end_date: Date;
    auto_renewal: boolean;
    status: SubscriptionStatus;
}

export enum SubscriptionStatus {
    Active = "active",
    Cancelled = "cancelled",
    Expired = "expired",
    Pending = "pending"
}
