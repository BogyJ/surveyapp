<?php
   require_once 'Process.php';

   $imeKorisnika       = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);
   $prezimeKorisnika   = filter_input(INPUT_POST, 'prezime', FILTER_SANITIZE_STRING);
   $emailAdresa        = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
   $telefonKorisnika   = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
   $adresaKorisnika    = filter_input(INPUT_POST, 'adresa', FILTER_SANITIZE_STRING);
   $restoran           = filter_input(INPUT_POST, 'restoran', FILTER_SANITIZE_STRING);
   $grad               = filter_input(INPUT_POST, 'grad', FILTER_SANITIZE_STRING);
   $kolicinaArtikla    = filter_input(INPUT_POST, 'kolicina', FILTER_SANITIZE_NUMBER_INT);
   $nazivArtikla       = filter_input(INPUT_POST, 'imeArtikla', FILTER_SANITIZE_STRING);
   $dodatneInformacije = filter_input(INPUT_POST, 'informacije', FILTER_SANITIZE_STRING);

   # $restoraniPromocija = ['KFC', 'McDonalds', 'Poncho'];
   # $cenaDostave = 100;
   # $finalniRacun = '';

   $proces = new Process(
      $imeKorisnika,
      $prezimeKorisnika,
      $emailAdresa,
      $telefonKorisnika,
      $adresaKorisnika,
      $restoran,
      $grad,
      $nazivArtikla,
      $dodatneInformacije
   );

   $result = $proces->getPrice();

   if (!$result["isEmpty"]) {
      header("Location: /projects/phpvezbe/");
   }

   echo "Kupili ste: " . $nazivArtikla . " po ceni " . $result["price"];
   
