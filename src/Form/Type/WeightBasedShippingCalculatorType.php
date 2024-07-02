<?php

declare(strict_types=1);

namespace App\Form\Type;

use Sylius\Bundle\MoneyBundle\Form\Type\MoneyType;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;

final class WeightBasedShippingCalculatorType extends AbstractType
{
    public function __construct(
        private readonly ChannelContextInterface $channelContext,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('weight', NumberType::class)
            ->add('above_or_equal', MoneyType::class, [
                'currency' => 'USD',
            ])
            ->add('below', MoneyType::class, [
                'currency' => 'USD',
            ])
        ;
    }

    private function getDefaultCurrency(): string
    {
        $channel = $this->channelContext->getChannel();

        return $channel->getBaseCurrency()->getCode();
    }
}
