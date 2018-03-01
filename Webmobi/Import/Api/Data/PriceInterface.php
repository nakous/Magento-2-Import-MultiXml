<?php
namespace Webmobi\Import\Api\Data;

interface PriceInterface
{
	const PRICE_ID      	= 'price_id';
	const PRICEMIN      	= 'pricemin';
	const PRICEMAX      	= 'pricemax';
	const ADDED 			= 'added';
	const FEED_ID			= 'feed_id';

	public function getId();
	public function getPricemin();
	public function getPricemax();
	public function getAdded();
	public function getFeed();

	public function setId($id);
	public function setPricemin($pricemin);
	public function setPricemax($pricemax);
	public function setAdded($added);
	public function setFeed($feed);
}