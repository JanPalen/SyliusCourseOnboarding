<?php

declare (strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'app_supplier')]
class Supplier implements SupplierInterface
{
    public const STATE_NEW = 'new';
    public const STATE_TRUSTED = 'trusted';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id;

    #[ORM\Column(name: 'name', type: 'string', length: 255)]
    private ?string $name;

    #[ORM\Column(name: 'email', type: 'string', length: 255)]
    private ?string $email;

    #[ORM\Column(name: 'state', type: 'string', length: 255)]
    private ?string $state = self::STATE_NEW;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): void
    {
        $this->state = $state;
    }
}
