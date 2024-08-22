<?php

namespace App\Entity;

use App\Repository\QuizzRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizzRepository::class)]
class Quizz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Poles $pole_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $question1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $question2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $question3 = null;

    #[ORM\Column(nullable: true)]
    private ?int $reponse1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $reponse2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $reponse3 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoleId(): ?Poles
    {
        return $this->pole_id;
    }

    public function setPoleId(?Poles $pole_id): static
    {
        $this->pole_id = $pole_id;

        return $this;
    }

    public function getQuestion1(): ?string
    {
        return $this->question1;
    }

    public function setQuestion1(?string $question1): static
    {
        $this->question1 = $question1;

        return $this;
    }

    public function getQuestion2(): ?string
    {
        return $this->question2;
    }

    public function setQuestion2(?string $question2): static
    {
        $this->question2 = $question2;

        return $this;
    }

    public function getQuestion3(): ?string
    {
        return $this->question3;
    }

    public function setQuestion3(?string $question3): static
    {
        $this->question3 = $question3;

        return $this;
    }

    public function getReponse1(): ?int
    {
        return $this->reponse1;
    }

    public function setReponse1(?int $reponse1): static
    {
        $this->reponse1 = $reponse1;

        return $this;
    }

    public function getReponse2(): ?int
    {
        return $this->reponse2;
    }

    public function setReponse2(?int $reponse2): static
    {
        $this->reponse2 = $reponse2;

        return $this;
    }

    public function getReponse3(): ?int
    {
        return $this->reponse3;
    }

    public function setReponse3(?int $reponse3): static
    {
        $this->reponse3 = $reponse3;

        return $this;
    }
}
