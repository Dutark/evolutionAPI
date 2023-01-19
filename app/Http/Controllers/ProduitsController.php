<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;


class ProduitsController extends Controller
{
    function liste(){
        return response()->json(Produit::all());
    }
	
	function detail($id){
		return response()->json(Produit::find($id));
	}

	function listeProduitsDeviseEuros($id){
		$produit = Produit::where('id', $id)->first();
		$prixProd = $produit['prix'] * 1;
		return $prixProd;
	}

	function listeProduitsDeviseUSD($id){
		$produit = Produit::where('id', $id)->first();
		$prixProd = $produit['prix'] * 1.08;
		return $prixProd;
	}

	function listeProduitsDeviseBTC($id){
		$produit = Produit::where('id', $id)->first();
		$prixProd = $produit['prix'] * 0.000052;
		return $prixProd;
	}

	function ajouter(Request $request){
		$produit = new Produit();
		$produit->nom = $request->nom;
		$produit->description = $request->description;
		$produit->lien_image = $request->lien_image;
		$produit->prix = $request->prix;
		$produit->tva = $request->tva;
		$produit->save();
		return response()->json($produit);
	}
}
