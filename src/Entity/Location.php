<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocationRepository")
 */
class Location {
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $datetime;

	/**
	 * @ORM\Column(type="float")
	 */
	private $longitude;

	/**
	 * @ORM\Column(type="float")
	 */
	private $latitude;

	/**
	 * @ORM\ManyToOne(targetEntity="App\Entity\View", inversedBy="locations")
	 * @var View
	 */
	private $view;

	public function getId(): ?int {
		return $this->id;
	}

	public function getDatetime(): ?\DateTimeInterface {
		return $this->datetime;
	}

	public function setDatetime( \DateTimeInterface $datetime ): self {
		$this->datetime = $datetime;

		return $this;
	}

	public function getLongitude(): ?float {
		return $this->longitude;
	}

	public function setLongitude( float $longitude ): self {
		$this->longitude = $longitude;

		return $this;
	}

	public function getLatitude(): ?float {
		return $this->latitude;
	}

	public function setLatitude( float $latitude ): self {
		$this->latitude = $latitude;

		return $this;
	}
}
