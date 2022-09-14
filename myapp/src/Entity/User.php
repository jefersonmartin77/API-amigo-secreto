<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Ignore;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userName;

    /**
     * @ORM\OneToMany(targetEntity=ListaDesejo::class, mappedBy="owner")
     * @Ignore()
     */
    private $listaDesejos;

    public function __construct()
    {
        $this->listaDesejos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->Nome;
    }

    public function setNome(string $Nome): self
    {
        $this->Nome = $Nome;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function addListaDesejo(ListaDesejo $listaDesejo): self
    {
        if (!$this->listaDesejos->contains($listaDesejo)) {
            $this->listaDesejos[] = $listaDesejo;
            $listaDesejo->setOwner($this);
        }

        return $this;
    }

    public function removeListaDesejo(ListaDesejo $listaDesejo): self
    {
        if ($this->listaDesejos->removeElement($listaDesejo)) {
            // set the owning side to null (unless already changed)
            if ($listaDesejo->getOwner() === $this) {
                $listaDesejo->setOwner(null);
            }
        }

        return $this;
    }
}
