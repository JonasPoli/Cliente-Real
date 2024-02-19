<?php

namespace App\Entity;

use App\Repository\WhoWeArePageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: WhoWeArePageRepository::class)]
#[Vich\Uploadable]
class WhoWeArePage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $presentationPart1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $presentationPart2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $presentationPart3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $youtubeVideoCode = null;

    #[ORM\Column(nullable: true)]
    private ?int $language = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image1 = null;

    #[Vich\UploadableField(mapping: 'whoWeAreImage',fileNameProperty: 'image1')]
    private ?File $imageFile1 = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $imgUpdatedAt1 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPresentationPart1(): ?string
    {
        return $this->presentationPart1;
    }

    public function setPresentationPart1(?string $presentationPart1): static
    {
        $this->presentationPart1 = $presentationPart1;

        return $this;
    }

    public function getPresentationPart2(): ?string
    {
        return $this->presentationPart2;
    }

    public function setPresentationPart2(?string $presentationPart2): static
    {
        $this->presentationPart2 = $presentationPart2;

        return $this;
    }

    public function getPresentationPart3(): ?string
    {
        return $this->presentationPart3;
    }

    public function setPresentationPart3(?string $presentationPart3): static
    {
        $this->presentationPart3 = $presentationPart3;

        return $this;
    }

    public function getYoutubeVideoCode(): ?string
    {
        return $this->youtubeVideoCode;
    }

    public function setYoutubeVideoCode(?string $youtubeVideoCode): static
    {
        $this->youtubeVideoCode = $youtubeVideoCode;

        return $this;
    }

    public function getLanguage(): ?int
    {
        return $this->language;
    }

    public function setLanguage(?int $language): static
    {
        $this->language = $language;

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

    public function getImageFile1(): ?File
    {
        return $this->imageFile1;
    }

    public function setImageFile1(?File $imageFile1 = null):void
    {
        $this->imageFile1 = $imageFile1;
        if (null !== $imageFile1){
            $this->imgUpdatedAt1 = new \DateTimeImmutable();
        }
    }

    public function getImgUpdatedAt1(): ?\DateTimeImmutable
    {
        return $this->imgUpdatedAt1;
    }

    public function setImgUpdatedAt1(?\DateTimeImmutable $imgUpdatedAt1): void
    {
        $this->imgUpdatedAt1 = $imgUpdatedAt1;
    }

}
