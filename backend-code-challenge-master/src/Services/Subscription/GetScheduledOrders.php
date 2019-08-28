<?php

namespace App\Services\Subscription;

use App\Entities\ScheduledOrder;
use App\Entities\Subscription;

class GetScheduledOrders
{
    /**
     * Handle generating the array of scheduled orders for the given number of weeks and subscription.
     *
     * @param \App\Entities\Subscription $subscription
     * @param int                        $forNumberOfWeeks
     *
     * @return array
     */
    public function handle(Subscription $subscription, $forNumberOfWeeks = 6)
    {
        $deliveryDates = [];

        // Initial subscription check if it has been canceled.
        if ($subscription->getStatus() == 'Cancelled') {
            return $deliveryDates;
        };

        $nextDeliveryDate = $subscription->getNextDeliveryDate();
        $hasIntervals = $subscription->getPlan() == 'Fortnightly';
        $isInterval = null;

        for ($i = 0; $i < $forNumberOfWeeks; $i++) {
            if ($hasIntervals && $i % 2) {
                $isInterval = false;
            } else {
                $isInterval = true;
            };

            $scheduledDelivery = $nextDeliveryDate->copy();

            $scheduledOrder = new ScheduledOrder($scheduledDelivery->addWeeks($i), $isInterval);
            $deliveryDates[$i] = $scheduledOrder;
        };

        return $deliveryDates;
    }
}