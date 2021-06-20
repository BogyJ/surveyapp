<?php
	class Process {
		 private $imeKorisnika;
		 private $prezimeKorisnika;
		 private $emailAdresa;
		 private $telefonKorisnika;
		 private $adresaKorisnika;
		 private $restoran;
		 private $grad;
		 private $nazivArtikla;
		 private $dodatneInformacije;
		 private $price = 100;


		 public function __construct(
		 	string $imeKorisnika,
		 	string $prezimeKorisnika,
		 	string $emailAdresa,
		 	string $telefonKorisnika,
		 	string $adresaKorisnika,
		 	string $restoran,
		 	string $grad,
		 	string $nazivArtikla,
		 	string $dodatneInformacije
		 ) {
		 	$this->imeKorisnika = $imeKorisnika;
		 	$this->prezimeKorisnika = $prezimeKorisnika;
		 	$this->emailAdresa = $emailAdresa;
		 	$this->telefonKorisnika = $telefonKorisnika;
		 	$this->adresaKorisnika = $adresaKorisnika;
		 	$this->restoran = $restoran;
		 	$this->grad = $grad;
		 	$this->nazivArtikla = $nazivArtikla;
		 	$this->dodatneInformacije = $dodatneInformacije;
		 }

		 private function isEmpty(): bool {
		 	$result = true;

		 	if ($this->imeKorisnika === '') {
		 		$result = false;
		 	}

		 	if ($this->prezimeKorisnika === '') {
		 		$result = false;
		 	}

		 	if ($this->emailAdresa === '') {
		 		$result = false;
		 	}

		 	if ($this->telefonKorisnika === '') {
		 		$result = false;
		 	}

		 	if ($this->adresaKorisnika === '') {
		 		$result = false;
		 	}

		 	if ($this->restoran === '') {
		 		$result = false;
		 	}

		 	if (strtolower($this->grad) !== 'beograd') {
		 		$this->price *= 2;
		 	}

		 	if ($this->nazivArtikla === '') {
		 		$result = false;
		 	}

		 	if ($this->dodatneInformacije === '') {
		 		$result = false;
		 	}

		 	return $result;
		 }

		 public function getPrice() {
		 	$result = $this->isEmpty();

		 	return [
		 		"isEmpty" => $result,
		 		"price" => $this->price
		 	];
		 }

	}
