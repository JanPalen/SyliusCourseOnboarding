<?php

declare(strict_types=1);

namespace App\Context;

use App\DateTime\ClockInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;

final class TimeBasedChannelContext implements ChannelContextInterface
{
    public function __construct(
        private readonly ChannelRepositoryInterface $channelRepository,
        private readonly ClockInterface $clock,
    ) {
    }

    public function getChannel(): ChannelInterface
    {
        if ($this->clock->isNight()) {
            return $this->channelRepository->findOneByCode('NIGHT');
        }

        return $this->channelRepository->findOneBy([]);
    }
}
