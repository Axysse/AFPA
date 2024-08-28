<?php

namespace App\Entity;

use App\Repository\FormationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationsRepository::class)]
class Formations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $texte1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $texte2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $texte3 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $image1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $image2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $image3 = null;

    #[ORM\ManyToOne(inversedBy: 'formations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Poles $pole = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getTexte1(): ?string
    {
        return $this->texte1;
    }

    public function setTexte1(?string $texte1): static
    {
        $this->texte1 = $texte1;

        return $this;
    }

    public function getTexte2(): ?string
    {
        return $this->texte2;
    }

    public function setTexte2(?string $texte2): static
    {
        $this->texte2 = $texte2;

        return $this;
    }

    public function getTexte3(): ?string
    {
        return $this->texte3;
    }

    public function setTexte3(?string $texte3): static
    {
        $this->texte3 = $texte3;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(?string $image1): static
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): static
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): static
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getPole(): ?Poles
    {
        return $this->pole;
    }

    public function setPole(?Poles $pole): static
    {
        $this->pole = $pole;

        return $this;
    }

        public function __toString(){
          return $this->name; 
        }
}
