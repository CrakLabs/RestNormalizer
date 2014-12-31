<?php
/**
 * Created by bcolucci <bcolucci@crakmedia.com>
 */

namespace Crak\Component\RestNormalizer;

use Bcol\Component\Type\NonEmptyString;

/**
 * Class Error
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class Error implements ErrorInterface
{
    const CLASS_NAME = __CLASS__;

    /**
     * @var NonEmptyString
     */
    private $message;

    /**
     * @var NonEmptyString
     */
    private $reason;

    /**
     * @param NonEmptyString $message
     * @param NonEmptyString $reason
     */
    public function __construct(NonEmptyString $message, NonEmptyString $reason)
    {
        $this->message = $message;
        $this->reason = $reason;
    }

    /**
     * @inheritdoc
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @inheritdoc
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $message
     * @param string $reason
     * @return Error
     */
    public static function create($message, $reason)
    {
        return new self(new NonEmptyString($message), new NonEmptyString($reason));
    }
} 