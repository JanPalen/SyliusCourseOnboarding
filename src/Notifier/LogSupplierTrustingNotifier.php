<?php

declare (strict_types=1);

namespace App\Notifier;

use App\Entity\SupplierInterface;
use Psr\Log\LoggerInterface;

final class LogSupplierTrustingNotifier implements SupplierTrustingNotifierInterface
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {
    }

    public function notify(SupplierInterface $supplier): void
    {
        $this->logger->info(sprintf('Supplier "%s" has just been trusted', $supplier->getName()));
    }

}
