<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Voyage
 *
 * @ORM\Table(name="voyage", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="FK_voyage_idUtilisateur", columns={"idUtilisateur"}) })
 * @ORM\Entity(repositoryClass="App\Repository\VoyageRepository")
 */
class Voyage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titre", type="string", length=32, nullable=true)
     */
    private $titre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pays", type="string", length=32, nullable=true)
     */
    private $pays;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var string|null
     *
     * @ORM\Column(name="duree", type="string", length=25, nullable=true)
     */
    private $duree;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateDebutVoyage", type="date", nullable=true)
     */
    private $datedebutvoyage;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateFinVoyage", type="date", nullable=true)
     */
    private $datefinvoyage;

    /**
     * @var float|null
     *
     * @ORM\Column(name="cout", type="float", precision=10, scale=0, nullable=true)
     */
    private $cout;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="createdAt", type="date", nullable=true)
     */
    private $createdAt;

    /**
     * @var int
     *
     * @ORM\Column(name="idUtilisateur", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $idutilisateur;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="voyage", orphanRemoval=true)
     */
    private $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }


    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDatedebutvoyage(): ?\DateTimeInterface
    {
        return $this->datedebutvoyage;
    }

    public function setDatedebutvoyage(?\DateTimeInterface $datedebutvoyage): self
    {
        $this->datedebutvoyage = $datedebutvoyage;

        return $this;
    }

    public function getDatefinvoyage(): ?\DateTimeInterface
    {
        return $this->datefinvoyage;
    }

    public function setDatefinvoyage(?\DateTimeInterface $datefinvoyage): self
    {
        $this->datefinvoyage = $datefinvoyage;

        return $this;
    }

    public function getCout(): ?float
    {
        return $this->cout;
    }

    public function setCout(?float $cout): self
    {
        $this->cout = $cout;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIdutilisateur(): ?string
    {
        return $this->idutilisateur;
    }

    public function setIdutilisateur(string $idutilisateur): self
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setVoyage($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getVoyage() === $this) {
                $comment->setVoyage(null);
            }
        }

        return $this;
    }


}
