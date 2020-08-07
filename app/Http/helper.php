<?php
date_default_timezone_set('UTC');

function search_clients()
{
	$amount=0;
	if (\Auth::getUser()->user_type=="Admin") {
		$search=App\Clients::all();
	} else {
		$search=App\Clients::where('user_id',\Auth::getUser()->id)->get();
	}
	
	if ($search !== null) {
		$amount=count($search);
	}

	return $amount;
}

function search_providers()
{
	$amount=0;
	if (\Auth::getUser()->user_type=="Admin") {
		$search=App\Providers::all();
	} else {
		$search=App\Providers::where('user_id',\Auth::getUser()->id)->get();
	}
	
	if ($search !== null) {
		$amount=count($search);
	}

	return $amount;
}

function search_quotations()
{
	$amount=0;
	if (\Auth::getUser()->user_type=="Admin") {
		$search=App\Quotations::all();
	} else {
		$search=App\Quotations::all();
		foreach ($search as $key) {
			if ($key->clients->user_id==\Auth::getUser()->id) {
				$amount++;
			}
		}
	}
	
	if ($search !== null) {
		$amount=count($search);
	}

	return $amount;
}

function search_purchase()
{
	$amount=0;
	if (\Auth::getUser()->user_type=="Admin") {
		$search=App\PurchaseOrder::all();
	} else {
		$search=App\PurchaseOrder::where('status','Aprobada')->get();
		foreach ($search as $key) {
			foreach ($key->providers as $key2) {
				if ($key2->user_id==\Auth::getUser()->id) {
					$amount++;
				}
			}
		}
	}
	
	if ($search !== null) {
		$amount=count($search);
	}

	return $amount;
}

