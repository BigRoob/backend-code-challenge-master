<?php

namespace App\Entities;

use Carbon\Carbon;

class Subscription
{
    /**
     * The statuses a subscription can have.
     *
     * @var int
     */
    const STATUS_ACTIVE    = 1;
    const STATUS_CANCELLED = 2;

    /**
     * The allowed statuses.
     *
     * @var array
     */
    const STATUSES_ALLOWED = [
        self::STATUS_ACTIVE    => 'Active',
        self::STATUS_CANCELLED => 'Cancelled',
    ];

    /**
     * The plans a subscription can have.
     *
     * @var int
     */
    const PLAN_WEEKLY      = 1;
    const PLAN_FORTNIGHTLY = 2;

    /**
     * The allowed plans.
     *
     * @var array
     */
    const PLANS_ALLOWED = [
        self::PLAN_WEEKLY      => 'Weekly',
        self::PLAN_FORTNIGHTLY => 'Fortnightly',
    ];

    /**
     * The subscription status.
     *
     * @var int
     */
    protected $status;

    /**
     * Access to the subscription plan.
     *
     * @var int
     */
    public function getStatus()
    {
        return self::STATUSES_ALLOWED[$this->status];
    }

    /**
     * The subscription plan.
     *
     * @var int
     */
    protected $plan;

    /**
     * Access to the subscription plan.
     *
     * @var int
     */
    public function getPlan()
    {
        return $this::PLANS_ALLOWED[$this->plan];
    }

    /**
     * The next delivery date for this subscription.
     *
     * @var \Carbon\Carbon|null
     */
    protected $nextDeliveryDate;

    /**
     * Set the user current status.
     *
     * @param  int  $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Set the user subscription plan type.
     *
     * @param  int  $plan
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
    }

    /**
     * Set the user next programmed delivery date .
     *
     * @param  \Carbon\Carbon  $date
     */
    public function setNextDeliveryDate(Carbon $date)
    {
        $this->nextDeliveryDate = $date;
    }

    /**
     * Get the user next programmed delivery date .
     *
     * @var  bool
     */
    public function getNextDeliveryDate()
    {
        return $this->nextDeliveryDate;
    }

    /**
     * Subscription constructor.
     *
     * @param \Carbon\Carbon        $deliveryDate
     * @param int $status
     * @param int $plan
     */
    public function __construct(Carbon $nextDeliveryDate = null, $status = null, $plan = null)
    {
        $this->nextDeliveryDate = $nextDeliveryDate;
        $this->status           = $status;
        $this->plan             = $plan;
    }


}