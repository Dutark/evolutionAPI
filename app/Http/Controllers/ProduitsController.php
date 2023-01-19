<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProduitsController extends Controller
{
    function liste(){
        return response()->json(Produit::all());
    }
	
    function listeInfo(){
		$produitListe = Produit::all();
		return view('produits', ['produitListe' => $produitListe]);
    }

	function detail($id){
		return response()->json(Produit::find($id));
	}

	function listeProduitsDeviseEuros($id){
		$produit = Produit::where('id', $id)->first();
		$produit->prix*=1.08;
		return $produit;
	}

	function listeProduitsDeviseUSD($id){
		$produit = Produit::where('id', $id)->first();
		$produit->prix*=1.08;
		return $produit;
	}

	function listeProduitsDeviseBTC($id){
		$produit = Produit::where('id', $id)->first();
		$produit->prix*=0.000052;
		return $produit;
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
