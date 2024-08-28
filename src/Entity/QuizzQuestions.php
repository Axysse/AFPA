<?php

namespace App\Entity;

use App\Repository\QuizzQuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizzQuestionsRepository::class)]
class QuizzQuestions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'quizzQuestions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Poles $pole = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Question1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Question2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Question3 = null;

    /**
     * @var Collection<int, QuizzReponses>
     */
    #[ORM\ManyToMany(targetEntity: QuizzReponses::class, mappedBy: 'Question')]
    private Collection $quizzReponses;

    public function __construct()
    {
        $this->quizzReponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuestion1(): ?string
    {
        return $this->Question1;
    }

    public function setQuestion1(?string $Question1): static
    {
        $this->Question1 = $Question1;

        return $this;
    }

    public function getQuestion2(): ?string
    {
        return $this->Question2;
    }

    public function setQuestion2(?string $Question2): static
    {
        $this->Question2 = $Question2;

        return $this;
    }

    public function getQuestion3(): ?string
    {
        return $this->Question3;
    }

    public function setQuestion3(?string $Question3): static
    {
        $this->Question3 = $Question3;

        return $this;
    }

    public function __toString(){
        return $this->Question1; 
      }

    /**
     * @return Collection<int, QuizzReponses>
     */
    public function getQuizzReponses(): Collection
    {
        return $this->quizzReponses;
    }

    public function addQuizzReponse(QuizzReponses $quizzReponse): static
    {
        if (!$this->quizzReponses->contains($quizzReponse)) {
            $this->quizzReponses->add($quizzReponse);
            $quizzReponse->addQuestion($this);
        }

        return $this;
    }

    public function removeQuizzReponse(QuizzReponses $quizzReponse): static
    {
        if ($this->quizzReponses->removeElement($quizzReponse)) {
            $quizzReponse->removeQuestion($this);
        }

        return $this;
    }
}
