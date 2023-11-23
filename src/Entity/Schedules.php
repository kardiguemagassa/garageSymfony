<?php

namespace App\Entity;

use App\Repository\SchedulesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchedulesRepository::class)]
class Schedules
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $openedDays = null;

    #[ORM\Column(length: 255)]
    private ?string $hoursAM = null;

    #[ORM\Column(length: 255)]
    private ?string $hoursPM = null;

    #[ORM\ManyToOne(inversedBy: 'schedules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Garages $garages = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpenedDays(): ?string
    {
        return $this->openedDays;
    }

    public function setOpenedDays(string $openedDays): static
    {
        $this->openedDays = $openedDays;

        return $this;
    }

    public function getHoursAM(): ?string
    {
        return $this->hoursAM;
    }

    public function setHoursAM(string $hoursAM): static
    {
        $this->hoursAM = $hoursAM;

        return $this;
    }

    public function getHoursPM(): ?string
    {
        return $this->hoursPM;
    }

    public function setHoursPM(string $hoursPM): static
    {
        $this->hoursPM = $hoursPM;

        return $this;
    }

    public function getGarages(): ?Garages
    {
        return $this->garages;
    }

    public function setGarages(?Garages $garages): static
    {
        $this->garages = $garages;

        return $this;
    }
}
