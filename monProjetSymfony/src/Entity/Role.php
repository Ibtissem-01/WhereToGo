<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role", uniqueConstraints={@ORM\UniqueConstraint(name="idRole", columns={"idRole"})})
 * @ORM\Entity(repositoryClass="App\Repository\RoleRepository")
 */
class Role
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRole", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrole;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelleRole", type="string", length=32, nullable=true)
     */
    private $libellerole;

    public function getIdrole(): ?string
    {
        return $this->idrole;
    }

    public function getLibellerole(): ?string
    {
        return $this->libellerole;
    }

    public function setLibellerole(?string $libellerole): self
    {
        $this->libellerole = $libellerole;

        return $this;
    }


}
