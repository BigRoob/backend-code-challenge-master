<?php

namespace App\Entities;

use Carbon\Carbon;

class ScheduledOrder
{
    /**
     * The delivery date of this scheduled order.
     *
     * @var \Carbon\Carbon
     */
    protected $deliveryDate;

    /**
     * Is this delivery marked as a holiday that will be skipped.
     *
     * @var bool
     */
    protected $holiday = false;

    /**
     * Is this scheduled order an opt in order that is not part of the normal subscription's plan cycle.
     *
     * @var bool
     */
    protected $optIn = false;

    /**
     * Is this scheduled order part of the subscriptions normal plan cycle.
     *
     * @var bool
     */
    protected $interval = true;

    /**
     * ScheduledOrder constructor.
     *
     * @param \Carbon\Carbon     $deliveryDate
     * @param bool $isInterval
     */
    public function __construct(Carbon $deliveryDate, bool $isInterval)
    {
        $this->deliveryDate = $deliveryDate;
        $this->interval     = $isInterval;
    }

    /**
     * Get the if the users order is part of the subscriptions normal plan cycle.
     *
     * @var bool
     */
    public function isInterval()
    {
        return $this->interval;
    }

    /**
     * Set the order to indicate it is on holiday status and should be skipped.
     *
     * @param  bool  $true
     */
    public function setHoliday($true)
    {
        if ($this->interval){
            $this->holiday = $true;
        };
    }

    /**
     * Get if this delivery is marked as a holiday that will be skipped.
     *
     * @var bool
     */
    public function isHoliday()
    {
        return $this->holiday;
    }

    /**
     * Get if this delivery is marked as a holiday that will be skipped.
     *
     * @var \Carbon\Carbon
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * Set the order to indicate the user has opted in for an unscheduled delivery.
     *
     * @param  bool  $true
     */
    public function setOptIn($true)
    {
        if (!$this->interval){
            $this->optIn = $true;
        };
    }

    /**
     * Get if this order was marked as an unscheduled delivery.
     *
     * @var \Carbon\Carbon
     */
    public function isOptIn()
    {
        return $this->optIn;
    }
}