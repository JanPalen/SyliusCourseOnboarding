<?php

declare(strict_types=1);

namespace App\Context;

use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Channel\Model\ChannelInterface;

class TimeBasedChannelContext implements ChannelContextInterface
{

    public function getChannel(): ChannelInterface
    {
        // TODO: Implement getChannel() method.
    }
}
