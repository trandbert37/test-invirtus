<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ViewRepository")
 */
class View {
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\Location", mappedBy="view")
	 * @var ArrayCollection
	 */
	private $locations;

	/**
	 * @return ArrayCollection
	 */
	public function getLocations() {
		return $this->locations;
	}

	/**
	 * @param ArrayCollection $locations
	 *
	 * @return View
	 */
	public function setLocations( $locations ) {
		$this->locations = $locations;

		return $this;
	}

	/**
	 * @param Location $location
	 */
	public function addLocation( Location $location ) {
		$this->locations->add( $location );
	}

	public function getId(): ?int {
		return $this->id;
	}


}
