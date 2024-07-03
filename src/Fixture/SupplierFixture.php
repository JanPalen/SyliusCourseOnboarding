<?php

declare (strict_types=1);

namespace App\Fixture;

use Doctrine\Persistence\ObjectManager;
use Faker\Generator;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class SupplierFixture extends AbstractFixture
{
    public function __construct(
        private readonly FactoryInterface $supplierFactory,
        private readonly ObjectManager $supplierManager,
        private readonly Generator $generator,
    ) {
    }

    public function load(array $options): void
    {
        for ($i =0; $i < $options['count']; $i++) {
            $supplier = $this->supplierFactory->createNew();
            $supplier->setEmail($this->generator->companyEmail);
            $supplier->setName($this->generator->name);
            $this->supplierManager->persist($supplier);
        }

        $this->supplierManager->flush();
    }

    public function getName(): string
    {
        return 'supplier';
    }

    protected function configureOptionsNode(ArrayNodeDefinition $optionsNode): void
    {
        $optionsNode
            ->children()
            ->integerNode('count')
        ;
    }

}
