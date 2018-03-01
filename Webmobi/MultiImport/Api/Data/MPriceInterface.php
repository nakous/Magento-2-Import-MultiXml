<?php
namespace Webmobi\MultiImport\Api\Data;

interface MPriceInterface
{
	 public function getId();
	 public function getPricemin();
	 public function getPricemax();
	 public function getAdded();
	 public function getMxml();
	 
	 public function setId($id);
	 public function setPricemin($pricemin);
	 public function setPricemax($pricemax);
	 public function setAdded($added);
	 public function setMxml($mxml);
}