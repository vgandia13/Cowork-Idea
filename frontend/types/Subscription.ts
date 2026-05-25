export interface Subscription {
    id: string;
    userId: string;
    planId: string;
    startDate: Date;
    endDate: Date;
    autoRenewal: boolean;
    status: SubscriptionStatus;
}

export enum SubscriptionStatus {
    Active = "active",
    Cancelled = "cancelled",
    Expired = "expired",
    Pending = "pending"
}
