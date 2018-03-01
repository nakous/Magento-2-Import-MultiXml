<?php
namespace Webmobi\MultiImport\Api\Data;

interface MFieldInterface
{
	 public function getId();
	 public function getField();
	 public function getTag();
	 public function getType();
	 public function getDefault();
	 public function getMxml();
	 
	 
	 public function setId($id);
	 public function setField($field);
	 public function setTag($tag);
	 public function setType($type);
	 public function setDefault($default);
	 public function setMxml($mxml);

}