<?php

namespace App\Entity;

use App\Repository\ArtisteRepository;
<<<<<<< HEAD
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
=======
>>>>>>> 238871b21a9a14a406e41aaa7e47d386061676e2
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteRepository::class)]
class Artiste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuNaissance = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

<<<<<<< HEAD
    #[ORM\Column()]
    private ?string $description = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    #[ORM\ManyToMany(targetEntity: Chanson::class, inversedBy: 'artistes')]
    private Collection $chanson;

    public function __construct()
    {
        $this->chanson = new ArrayCollection();
    }

=======
    #[ORM\Column(length: 255)]
    private ?string $description = null;

>>>>>>> 238871b21a9a14a406e41aaa7e47d386061676e2
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
<<<<<<< HEAD

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Chanson>
     */
    public function getChanson(): Collection
    {
        return $this->chanson;
    }

    public function addChanson(Chanson $chanson): self
    {
        if (!$this->chanson->contains($chanson)) {
            $this->chanson->add($chanson);
        }

        return $this;
    }

    public function removeChanson(Chanson $chanson): self
    {
        $this->chanson->removeElement($chanson);

        return $this;
    }
=======
>>>>>>> 238871b21a9a14a406e41aaa7e47d386061676e2
}
