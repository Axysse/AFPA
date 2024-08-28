<?php

namespace App\Entity;

use App\Repository\PolesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolesRepository::class)]
class Poles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

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

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $video = null;

    /**
     * @var Collection<int, Formations>
     */
    #[ORM\OneToMany(targetEntity: Formations::class, mappedBy: 'pole', orphanRemoval: true)]
    private Collection $formations;

    /**
     * @var Collection<int, QuizzQuestions>
     */
    #[ORM\OneToMany(targetEntity: QuizzQuestions::class, mappedBy: 'pole', orphanRemoval: true)]
    private Collection $quizzQuestions;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
        $this->quizzQuestions = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): static
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Collection<int, Formations>
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formations $formation): static
    {
        if (!$this->formations->contains($formation)) {
            $this->formations->add($formation);
            $formation->setPole($this);
        }

        return $this;
    }

    public function removeFormation(Formations $formation): static
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getPole() === $this) {
                $formation->setPole(null);
            }
        }

        return $this;
    }
    
    public function __toString(){
        return $this->name; 
      }

    /**
     * @return Collection<int, QuizzQuestions>
     */
    public function getQuizzQuestions(): Collection
    {
        return $this->quizzQuestions;
    }

    public function addQuizzQuestion(QuizzQuestions $quizzQuestion): static
    {
        if (!$this->quizzQuestions->contains($quizzQuestion)) {
            $this->quizzQuestions->add($quizzQuestion);
            $quizzQuestion->setPole($this);
        }

        return $this;
    }

    public function removeQuizzQuestion(QuizzQuestions $quizzQuestion): static
    {
        if ($this->quizzQuestions->removeElement($quizzQuestion)) {
            // set the owning side to null (unless already changed)
            if ($quizzQuestion->getPole() === $this) {
                $quizzQuestion->setPole(null);
            }
        }

        return $this;
    }
}
