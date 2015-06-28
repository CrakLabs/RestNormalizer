<?php
/**
 * Created by bcolucci <bcolucci@crakmedia.com>
 */

namespace Crak\Component\RestNormalizer;

use Bcol\Component\Type\NonEmptyString;
use Bcol\Component\Type\String;

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
     * @var String
     */
    private $location;

    /**
     * @param NonEmptyString $message
     * @param NonEmptyString $reason
     * @param String $location = null
     */
    public function __construct(NonEmptyString $message, NonEmptyString $reason, String $location = null)
    {
        $this->message = $message;
        $this->reason = $reason;

        $this->location = $location;
        if (!$this->location) {
            $this->location = new String('');
        }
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
     * @inheritdoc
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $message
     * @param string $reason
     * @param string $location = null
     * @return Error
     */
    public static function create($message, $reason, $location = null)
    {
        if (is_null($location)) {
            $location = '';
        }

        return new self(new NonEmptyString($message), new NonEmptyString($reason), new String($location));
    }
} 
