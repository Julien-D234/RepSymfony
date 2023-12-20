<?php

namespace App\Entity;

use App\Repository\ChansonRepository;
<<<<<<< Updated upstream
<<<<<<< HEAD
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
=======
>>>>>>> 238871b21a9a14a406e41aaa7e47d386061676e2
=======
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
>>>>>>> Stashed changes
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChansonRepository::class)]
class Chanson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateSortie = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

    #[ORM\Column(length: 255)]
    private ?string $langue = null;

    #[ORM\Column(length: 255)]
    private ?string $photoCouverture = null;

<<<<<<< Updated upstream
<<<<<<< HEAD
=======
>>>>>>> Stashed changes
    #[ORM\ManyToMany(targetEntity: Artiste::class, mappedBy: 'chanson')]
    private Collection $artistes;

    public function __construct()
    {
        $this->artistes = new ArrayCollection();
    }

<<<<<<< Updated upstream
=======
>>>>>>> 238871b21a9a14a406e41aaa7e47d386061676e2
=======
>>>>>>> Stashed changes
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getPhotoCouverture(): ?string
    {
        return $this->photoCouverture;
    }

    public function setPhotoCouverture(string $photoCouverture): self
    {
        $this->photoCouverture = $photoCouverture;

        return $this;
    }
<<<<<<< Updated upstream
<<<<<<< HEAD
=======
>>>>>>> Stashed changes

    /**
     * @return Collection<int, Artiste>
     */
    public function getArtistes(): Collection
    {
        return $this->artistes;
    }

    public function addArtiste(Artiste $artiste): self
    {
        if (!$this->artistes->contains($artiste)) {
            $this->artistes->add($artiste);
            $artiste->addChanson($this);
        }

        return $this;
    }

    public function removeArtiste(Artiste $artiste): self
    {
        if ($this->artistes->removeElement($artiste)) {
            $artiste->removeChanson($this);
        }

        return $this;
    }
<<<<<<< Updated upstream
=======
>>>>>>> 238871b21a9a14a406e41aaa7e47d386061676e2
=======
>>>>>>> Stashed changes
}
