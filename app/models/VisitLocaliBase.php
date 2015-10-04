<?php


use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class VisitLocaliBase extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'visit_locali_mese';

	/**
	 * Sets the timestamp method on the model
	 */
	public $timestamps = false;

	/**
	 * Sets the softDelete method on the model
	 */
	protected $softDelete = false;

	/**
	 * The errors used by the view
	 *
	 * @var array
	 */
	private $errors;




	//B::select(DB::raw('RENAME TABLE photos TO images'));

	public static function getFiltered($da, $a)
	{
		$da_mese = substr($da, 4,2);
        $da_anno = substr($da, 0,4);
        $a_mese = substr($a, 4,2);
        $a_anno = substr($a, 0,4);

$result = VisitLocaliBase::
                     select(DB::raw(" `Nome Locale`, `Ragione sociale`, `Citta'`, Indirizzo, max( ultima_visita), nome, cognome, `Piano strategico`, Ruolo, `Area manager`, agente, Developer, `Codice Spedizione`, Fornitore, `QUALITY SERVE MARTINI ROYALE`, `QUALITY SERVE CLASSIC COCKTAILS`, 
									round(ceiling(sum(`Numero barman`* numero_visite )/ sum(numero_visite)),0 ) as `Numero barman`,
									round(ceiling(sum(`persone presenti` * numero_visite )/ sum(numero_visite)),0 ) as `persone presenti`  ,
									round(ceiling(sum(`totale consumazioni martini` * numero_visite )/ sum(numero_visite)),0 ) as `totale consumazioni martini`  ,
									round(ceiling(sum(`totale consumazioni martini royale bianco` * numero_visite )/ sum(numero_visite)),0 ) as `totale consumazioni martini royale bianco`  ,
									round(ceiling(sum(`totale consumazioni martini royale rosato`* numero_visite )/ sum(numero_visite)),0 ) as `totale consumazioni martini royale rosato` ,
									round(ceiling(sum( Negroni* numero_visite )/ sum(numero_visite)),0 ) as  Negroni ,
									round(ceiling(sum( Sbagliato* numero_visite )/ sum(numero_visite)),0 ) as  Sbagliato ,
									round(ceiling(sum( Orange* numero_visite )/ sum(numero_visite)),0 ) as  Orange ,
									round(ceiling(sum( Americano* numero_visite )/ sum(numero_visite)),0 ) as  Americano ,
									round(ceiling(sum( `Aperol Spritz`* numero_visite )/ sum(numero_visite)),0 ) as  `Aperol Spritz` ,
									round(ceiling(sum( `altri aperitivi` * numero_visite )/ sum(numero_visite)),0 ) as  `altri aperitivi`  ,
									round(ceiling(sum( gadget* numero_visite )/ sum(numero_visite)),0 ) as  gadget ,
									round(ceiling(sum( `Martini Royale a settimana`* numero_visite )/ sum(numero_visite)),0 ) as  `Martini Royale a settimana` ,
									round(ceiling(sum( `Negroni a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `Negroni a settimana`  ,
									round(ceiling(sum( `Sbagliato  a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `Sbagliato  a settimana`  ,
									round(ceiling(sum( `Americano  a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `Americano  a settimana`  ,
									round(ceiling(sum( `Spritz aperol  a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `Spritz aperol  a settimana`  ,
									round(ceiling(sum( `altri cocktail  a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `altri cocktail  a settimana`  ,
									round(ceiling(sum( `vino o prosecco  a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `vino o prosecco  a settimana`  ,
									round(ceiling(sum( `birra a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `birra a settimana`  ,
									round(ceiling(sum( `totale alcolici  a settimana`* numero_visite )/ sum(numero_visite)),0 ) as  `totale alcolici  a settimana` ,
									 `CLASSIFICAZIONE TEAM SELL OUT`, `Aperitivo autogestito`, Frequenza, Advocacy, `Frequenza advocacy`, `Serata Consumer`, `Frequenza Serata Consumer`, `PRESENTE LA VETROFANIA`, `PRESENTE LA LAVAGNA`, `PRESENTE L'ESPOSITORE`, `PRESENTI LOCANDINE`, `PRESENTE IL BRAND BLOCK NEL BACK BAR`, `PRESENTE IL QUADRO LUMINOSO MARTINI RACING`, `PRESENTE IL BARMAT`, `PRESENTI I BICCHIERI`, `PRESENTE L'ICE BUCKET`, `IL PERSONALE HA LE DIVISE MARTINI`, `PRESENTE IL KIT BARMAN`, `PRESENTI I CAVALIERINI`, `PRESENTI I MENU'`, `PRESENTE IL MARTINI ROYALE SUL MENU' LOCALE`, `PRESENTE almeno un MARTINI classic cocktail SUL MENU' LOCALE`, `STATO PROPOSTO IL MARTINI ROYALE CONTEST (ad almeno un barman)`, `STATO PROPOSTO IL MARTINI workshop (ad almeno un barman)`, `descrizione autogestito`, `in coppia con` "))
                     ->whereRaw(' anno >= '.$da_anno.' and mese >= '. $da_mese .' and  anno <='. $a_anno .' and mese <= '.$a_mese)
                     ->groupBy("Nome Locale")
                     ->groupBy("Citta'")
                     ->get();
/*
		$result =  DB::select(DB::raw("select `Nome Locale`, `Ragione sociale`, `Citta'`, Indirizzo, max( ultima_visita), nome, cognome, `Piano strategico`, Ruolo, `Area manager`, agente, Developer, `Codice Spedizione`, Fornitore, `QUALITY SERVE MARTINI ROYALE`, `QUALITY SERVE CLASSIC COCKTAILS`, 
									round(ceiling(sum(`Numero barman`* numero_visite )/ sum(numero_visite)),0 ) as `Numero barman`,
									round(ceiling(sum(`persone presenti` * numero_visite )/ sum(numero_visite)),0 ) as `persone presenti`  ,
									round(ceiling(sum(`totale consumazioni martini` * numero_visite )/ sum(numero_visite)),0 ) as `totale consumazioni martini`  ,
									round(ceiling(sum(`totale consumazioni martini royale bianco` * numero_visite )/ sum(numero_visite)),0 ) as `totale consumazioni martini royale bianco`  ,
									round(ceiling(sum(`totale consumazioni martini royale rosato`* numero_visite )/ sum(numero_visite)),0 ) as `totale consumazioni martini royale rosato` ,
									round(ceiling(sum( Negroni* numero_visite )/ sum(numero_visite)),0 ) as  Negroni ,
									round(ceiling(sum( Sbagliato* numero_visite )/ sum(numero_visite)),0 ) as  Sbagliato ,
									round(ceiling(sum( Orange* numero_visite )/ sum(numero_visite)),0 ) as  Orange ,
									round(ceiling(sum( Americano* numero_visite )/ sum(numero_visite)),0 ) as  Americano ,
									round(ceiling(sum( `Aperol Spritz`* numero_visite )/ sum(numero_visite)),0 ) as  `Aperol Spritz` ,
									round(ceiling(sum( `altri aperitivi` * numero_visite )/ sum(numero_visite)),0 ) as  `altri aperitivi`  ,
									round(ceiling(sum( gadget* numero_visite )/ sum(numero_visite)),0 ) as  gadget ,
									round(ceiling(sum( `Martini Royale a settimana`* numero_visite )/ sum(numero_visite)),0 ) as  `Martini Royale a settimana` ,
									round(ceiling(sum( `Negroni a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `Negroni a settimana`  ,
									round(ceiling(sum( `Sbagliato  a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `Sbagliato  a settimana`  ,
									round(ceiling(sum( `Americano  a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `Americano  a settimana`  ,
									round(ceiling(sum( `Spritz aperol  a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `Spritz aperol  a settimana`  ,
									round(ceiling(sum( `altri cocktail  a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `altri cocktail  a settimana`  ,
									round(ceiling(sum( `vino o prosecco  a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `vino o prosecco  a settimana`  ,
									round(ceiling(sum( `birra a settimana` * numero_visite )/ sum(numero_visite)),0 ) as  `birra a settimana`  ,
									round(ceiling(sum( `totale alcolici  a settimana`* numero_visite )/ sum(numero_visite)),0 ) as  `totale alcolici  a settimana` ,
									 `CLASSIFICAZIONE TEAM SELL OUT`, `Aperitivo autogestito`, Frequenza, Advocacy, `Frequenza advocacy`, `Serata Consumer`, `Frequenza Serata Consumer`, `PRESENTE LA VETROFANIA`, `PRESENTE LA LAVAGNA`, `PRESENTE L'ESPOSITORE`, `PRESENTI LOCANDINE`, `PRESENTE IL BRAND BLOCK NEL BACK BAR`, `PRESENTE IL QUADRO LUMINOSO MARTINI RACING`, `PRESENTE IL BARMAT`, `PRESENTI I BICCHIERI`, `PRESENTE L'ICE BUCKET`, `IL PERSONALE HA LE DIVISE MARTINI`, `PRESENTE IL KIT BARMAN`, `PRESENTI I CAVALIERINI`, `PRESENTI I MENU'`, `PRESENTE IL MARTINI ROYALE SUL MENU' LOCALE`, `PRESENTE almeno un MARTINI classic cocktail SUL MENU' LOCALE`, `STATO PROPOSTO IL MARTINI ROYALE CONTEST (ad almeno un barman)`, `STATO PROPOSTO IL MARTINI workshop (ad almeno un barman)`, `descrizione autogestito`, `in coppia con`, numero_visite 
									from visit_locali_mese_solid
									where  anno *100 + mese >= ".$da." and 
									anno *100 + mese <= ".$a."
									group by `Nome Locale`, `Citta'`"));
*/
	
		//print_r($result);
		//exit;
		return $result;
	}



}