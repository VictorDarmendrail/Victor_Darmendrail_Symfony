<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $Intitule;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $Mission;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $AdresseMail;

    /**
     * @ORM\OneToMany(targetEntity=Entreprise::class, mappedBy="nom", orphanRemoval=true)
     */
    private $nomEntreprise;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class, mappedBy="stages")
     */
    private $Stages;

    public function __construct()
    {
        $this->nomEntreprise = new ArrayCollection();
        $this->Stages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->Intitule;
    }

    public function setIntitule(string $Intitule): self
    {
        $this->Intitule = $Intitule;

        return $this;
    }

    public function getMission(): ?string
    {
        return $this->Mission;
    }

    public function setMission(?string $Mission): self
    {
        $this->Mission = $Mission;

        return $this;
    }

    public function getAdresseMail(): ?string
    {
        return $this->AdresseMail;
    }

    public function setAdresseMail(?string $AdresseMail): self
    {
        $this->AdresseMail = $AdresseMail;

        return $this;
    }

    /**
     * @return Collection|Entreprise[]
     */
    public function getNomEntreprise(): Collection
    {
        return $this->nomEntreprise;
    }

    public function addNomEntreprise(Entreprise $nomEntreprise): self
    {
        if (!$this->nomEntreprise->contains($nomEntreprise)) {
            $this->nomEntreprise[] = $nomEntreprise;
            $nomEntreprise->setNom($this);
        }

        return $this;
    }

    public function removeNomEntreprise(Entreprise $nomEntreprise): self
    {
        if ($this->nomEntreprise->removeElement($nomEntreprise)) {
            // set the owning side to null (unless already changed)
            if ($nomEntreprise->getNom() === $this) {
                $nomEntreprise->setNom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getStages(): Collection
    {
        return $this->Stages;
    }

    public function addStage(Formation $stage): self
    {
        if (!$this->Stages->contains($stage)) {
            $this->Stages[] = $stage;
            $stage->addStage($this);
        }

        return $this;
    }

    public function removeStage(Formation $stage): self
    {
        if ($this->Stages->removeElement($stage)) {
            $stage->removeStage($this);
        }

        return $this;
    }
}
