<?php

namespace App\Entity;

use App\Repository\QuizzReponsesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizzReponsesRepository::class)]
class QuizzReponses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, QuizzQuestions>
     */
    #[ORM\ManyToMany(targetEntity: QuizzQuestions::class, inversedBy: 'quizzReponses')]
    private Collection $Question;

    #[ORM\Column(length: 255)]
    private ?string $Reponse1 = null;

    #[ORM\Column(length: 255)]
    private ?string $Reponse2 = null;

    #[ORM\Column(length: 255)]
    private ?string $Reponse3 = null;

    #[ORM\Column(length: 255)]
    private ?string $Reponse4 = null;

    #[ORM\Column(length: 255)]
    private ?string $Reponse5 = null;

    #[ORM\Column(length: 255)]
    private ?string $Reponse6 = null;

    #[ORM\Column(length: 255)]
    private ?string $Reponse7 = null;

    #[ORM\Column(length: 255)]
    private ?string $Reponse8 = null;

    #[ORM\Column(length: 255)]
    private ?string $Reponse9 = null;

    public function __construct()
    {
        $this->Question = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, QuizzQuestions>
     */
    public function getQuestion(): Collection
    {
        return $this->Question;
    }

    public function addQuestion(QuizzQuestions $question): static
    {
        if (!$this->Question->contains($question)) {
            $this->Question->add($question);
        }

        return $this;
    }

    public function removeQuestion(QuizzQuestions $question): static
    {
        $this->Question->removeElement($question);

        return $this;
    }

    public function getReponse1(): ?string
    {
        return $this->Reponse1;
    }

    public function setReponse1(string $Reponse1): static
    {
        $this->Reponse1 = $Reponse1;

        return $this;
    }

    public function getReponse2(): ?string
    {
        return $this->Reponse2;
    }

    public function setReponse2(string $Reponse2): static
    {
        $this->Reponse2 = $Reponse2;

        return $this;
    }

    public function getReponse3(): ?string
    {
        return $this->Reponse3;
    }

    public function setReponse3(string $Reponse3): static
    {
        $this->Reponse3 = $Reponse3;

        return $this;
    }

    public function getReponse4(): ?string
    {
        return $this->Reponse4;
    }

    public function setReponse4(string $Reponse4): static
    {
        $this->Reponse4 = $Reponse4;

        return $this;
    }

    public function getReponse5(): ?string
    {
        return $this->Reponse5;
    }

    public function setReponse5(string $Reponse5): static
    {
        $this->Reponse5 = $Reponse5;

        return $this;
    }

    public function getReponse6(): ?string
    {
        return $this->Reponse6;
    }

    public function setReponse6(string $Reponse6): static
    {
        $this->Reponse6 = $Reponse6;

        return $this;
    }

    public function getReponse7(): ?string
    {
        return $this->Reponse7;
    }

    public function setReponse7(string $Reponse7): static
    {
        $this->Reponse7 = $Reponse7;

        return $this;
    }

    public function getReponse8(): ?string
    {
        return $this->Reponse8;
    }

    public function setReponse8(string $Reponse8): static
    {
        $this->Reponse8 = $Reponse8;

        return $this;
    }

    public function getReponse9(): ?string
    {
        return $this->Reponse9;
    }

    public function setReponse9(string $Reponse9): static
    {
        $this->Reponse9 = $Reponse9;

        return $this;
    }

    public function __toString(){
        return $this->Reponse1; 
      }
}
