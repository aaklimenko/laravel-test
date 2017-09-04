<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/4/17
 * Time: 18:09
 */

namespace App\Events;


use Ramsey\Uuid\Uuid;

/**
 * Class Event
 * @package App\Events
 */
class Event
{
    /**
     * @var string
     */
    private $eventId;

    /**
     * Event constructor.
     */
    public function __construct()
    {
       $this->eventId = Uuid::uuid4()->toString();
    }

    /**
     * @return string
     */
    public function getEventId() :string
    {
        return $this->eventId;
    }
}