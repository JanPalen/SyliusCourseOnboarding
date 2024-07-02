<?php

declare(strict_types=1);

namespace App\ShippingCalculator;

use http\Exception\InvalidArgumentException;
use Sylius\Component\Core\Model\OrderItemInterface;
use Sylius\Component\Shipping\Calculator\CalculatorInterface;
use Sylius\Component\Shipping\Model\ShipmentInterface;

final class WeightBasedShippingCalculator implements CalculatorInterface
{
    public function calculate(ShipmentInterface $subject, array $configuration): int
    {
        $totalWeight = 0.0;
        $order = $subject->getOrder();

        if (null === $order) {
            throw new InvalidArgumentException('Order was not found.');
        }

        /** @var OrderItemInterface $item */
        foreach ($order->getItems() as $item) {
            $variant = $item->getVariant();
            if (null !== $variant) {
                $totalWeight += $variant->getWeight() * $item->getQuantity();
            }
        }

        if ($totalWeight >= $configuration['weight']) {
            return $configuration['above_or_equal'];
        }

        return $configuration['below'];
    }

    public function getType(): string
    {
        return 'weight_based';
    }
}
