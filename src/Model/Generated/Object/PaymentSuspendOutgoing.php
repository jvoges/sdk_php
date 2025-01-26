<?php

namespace Bunq\Model\Generated\Object;

use Bunq\Model\Core\BunqModel;

/**
 * Represents a PaymentSuspendedOutgoing object.
 */
class PaymentSuspendedOutgoing extends BunqModel
{
    /**
     * @var string|null The status of the suspended payment.
     */
    protected $status;

    /**
     * @var string|null The reason why the payment is suspended.
     */
    protected $reason;

    /**
     * Get the status of the suspended payment.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the status of the suspended payment.
     *
     * @param string|null $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get the reason for suspension.
     *
     * @return string|null
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set the reason for suspension.
     *
     * @param string|null $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * Check if all fields are null.
     *
     * @return bool
     */
    public function isAllFieldNull()
    {
        return $this->status === null && $this->reason === null;
    }
}
