<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Easy4D Code ne peut pas être vide.")]
    #[Assert\Length(max: 255)]
    private ?string $Easy4DCode = null;

    #[ORM\Column(length: 255)]
    private ?string $EANCode = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "La désignation ne peut pas être vide.")]
    #[Assert\Length(max: 255)]
    private ?string $Designation = null;

    #[ORM\Column(length: 255)]
    private ?string $CategoryTyreName = null;

    #[ORM\Column(length: 255)]
    private ?string $BrandName = null;

    #[ORM\Column(length: 255)]
    private ?string $FamilyName = null;

    #[ORM\Column(length: 255)]
    private ?string $Width = null;

    #[ORM\Column(length: 255)]
    private ?string $Height = null;

    #[ORM\Column(length: 255)]
    private ?string $diameter = null;

    #[ORM\Column(length: 255)]
    private ?string $Construction = null;

    #[ORM\Column(length: 255)]
    private ?string $LoadIndex = null;

    #[ORM\Column(length: 255)]
    private ?string $SpeedIndex = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Segment ne peut pas être vide.")]
    #[Assert\Length(max: 255)]
    private ?string $Segment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEasy4DCode(): ?string
    {
        return $this->Easy4DCode;
    }

    public function setEasy4DCode(string $Easy4DCode): static
    {
        $this->Easy4DCode = $Easy4DCode;

        return $this;
    }

    public function getEANCode(): ?string
    {
        return $this->EANCode;
    }

    public function setEANCode(string $EANCode): static
    {
        $this->EANCode = $EANCode;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->Designation;
    }

    public function setDesignation(string $Designation): static
    {
        $this->Designation = $Designation;

        return $this;
    }

    public function getCategoryTyreName(): ?string
    {
        return $this->CategoryTyreName;
    }

    public function setCategoryTyreName(string $CategoryTyreName): static
    {
        $this->CategoryTyreName = $CategoryTyreName;

        return $this;
    }

    public function getBrandName(): ?string
    {
        return $this->BrandName;
    }

    public function setBrandName(string $BrandName): static
    {
        $this->BrandName = $BrandName;

        return $this;
    }

    public function getFamilyName(): ?string
    {
        return $this->FamilyName;
    }

    public function setFamilyName(string $FamilyName): static
    {
        $this->FamilyName = $FamilyName;

        return $this;
    }

    public function getWidth(): ?string
    {
        return $this->Width;
    }

    public function setWidth(string $Width): static
    {
        $this->Width = $Width;

        return $this;
    }

    public function getHeight(): ?string
    {
        return $this->Height;
    }

    public function setHeight(string $Height): static
    {
        $this->Height = $Height;

        return $this;
    }

    public function getDiameter(): ?string
    {
        return $this->diameter;
    }

    public function setDiameter(string $diameter): static
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getConstruction(): ?string
    {
        return $this->Construction;
    }

    public function setConstruction(string $Construction): static
    {
        $this->Construction = $Construction;

        return $this;
    }

    public function getLoadIndex(): ?string
    {
        return $this->LoadIndex;
    }

    public function setLoadIndex(string $LoadIndex): static
    {
        $this->LoadIndex = $LoadIndex;

        return $this;
    }

    public function getSpeedIndex(): ?string
    {
        return $this->SpeedIndex;
    }

    public function setSpeedIndex(string $SpeedIndex): static
    {
        $this->SpeedIndex = $SpeedIndex;

        return $this;
    }

    public function getSegment(): ?string
    {
        return $this->Segment;
    }

    public function setSegment(string $Segment): static
    {
        $this->Segment = $Segment;

        return $this;
    }
}
