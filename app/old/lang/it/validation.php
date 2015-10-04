<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"         => ":attribute deve essere accettato.",
	"active_url"       => ":attribute non è un URL valido.",
	"after"            => ":attribute deve essere successivo a :date.",
	"alpha"            => ":attribute può contenere solo lettere.",
	"alpha_dash"       => ":attribute può contenere solo lettere, numeri e simboli.",
	"alpha_num"        => ":attribute può contenere solo lettere e numeri.",
	"array"            => ":attribute deve essere un array.",
	"before"           => ":attribute deve essere precedente a :date.",
	"between"          => array(
		"numeric" => ":attribute deve essere compreso tra :min e :max.",
		"file"    => ":attribute deve essere compreso tra :min e :max kilobytes.",
		"string"  => ":attribute deve essere compreso tra :min e :max caratteri.",
		"array"   => ":attribute deve essere compreso tra :min e :max elementi.",
	),
	"confirmed"        => ":attribute non coincide con la precedente.",
	"date"             => ":attribute non è una data valida.",
	"date_format"      => ":attribute non è nel formato previsto (:format).",
	"different"        => ":attribute e :other devono essere differenti.",
	"digits"           => ":attribute deve essere lungo almeno :digits .",
	"digits_between"   => ":attribute deve essere compreso tra :min e :max caratteri.",
	"email"            => ":attribute non è nel formato valido.",
	"exists"           => ":attribute selezionato non è valido.",
	"image"            => ":attribute deve essere un'immagine.",
	"in"               => ":attribute selezionato non è valido.",
	"integer"          => ":attribute deve essere un intero.",
	"ip"               => ":attribute deve essere un indirizzo IP valido.",
	"max"              => array(
		"numeric" => ":attribute non può essere pù grande di :max.",
		"file"    => ":attribute non può essere pù grande di :max kilobytes.",
		"string"  => ":attribute non può essere pù lungo di :max caratteri.",
		"array"   => "Per :attribute non è possibile selezionare più di :max valori.",
	),
	"mimes"            => ":attribute deve essere un file di tipo: :values.",
	"min"              => array(
		"numeric" => ":attribute deve essere maggiore di :min.",
		"file"    => ":attribute deve essere più grande di :min kilobytes.",
		"string"  => ":attribute deve essere più lungo di :min caratteri.",
		"array"   => ":attribute deve avere almeno :min elementi.",
	),
	"not_in"           => ":attribute selezionato non è valido.",
	"numeric"          => ":attribute deve essere un numero.",
	"regex"            => ":attribute ha un formato non valido.",
	"required"         => "E' necessario compilare :attribute.",
	"required_if"      => "E' necessario compilare :attribute  quando :other è :value.",
	"required_with"    => "E' necessario compilare :attribute quando :values è valorizzato.",
	"required_without" => "E' necessario compilare :attribute  quando :values non è valorizzato.",
	"same"             => "E' necessario compilare :attribute e :other devono coincidere.",
	"size"             => array(
		"numeric" => ":attribute deve essere :size.",
		"file"    => ":attribute deve essere :size kilobytes.",
		"string"  => ":attribute deve essere :size caratteri.",
		"array"   => ":attribute must contain :size elementi.",
	),
	"unique"           => ":attribute è già presente nel sistema.",
	"url"              => ":attribute ha un formato non valido.",
	"toomuchcommunity" => "Con la licenza scelta è possibile scegliere un massimo di :number community",
	"afterdate" => ":attribute deve essere successivo a :other ",
	'offersstartinto' => 'La pianificazione si sovrappone con quella di ":other" . Verifica la sovrapposizione e seleziona "Sovrascrivi" per proseguire.',
	'offersstartintoR' => 'Ripetizione :repeat -  La pianificazione si sovrappone con quella di ":other" . Verifica la sovrapposizione e seleziona "Sovrascrivi" per proseguire.',
	'offersendinto' => 'La pianificazione si sovrappone con quella di ":other" . Verifica la sovrapposizione e seleziona "Sovrascrivi" per proseguire.',
	'offersendintoR' => 'Repeat :repeat - Offer plan end into ":other" . Verifica la sovrapposizione e seleziona "Sovrascrivi" per proseguire.',
	'offerscontains' => 'La pianificazione si sovrappone con quella di ":other". Verifica la sovrapposizione e seleziona "Sovrascrivi" per proseguire.',
	'offerscontainsR' => 'Ripetizione :repeat - La pianificazione si sovrappone con quella di ":other" . Verifica la sovrapposizione e seleziona "Sovrascrivi" per proseguire.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(

		'username' => 'la mail di accesso',
	    'password' => 'la password',
	    'login' => 'Login',
	    'role' => 'Ruolo',
	    'access_code' => 'Codice d\'accesso',
	    'initial_code' => 'Codice d\'accesso',
	    'name' => 'Nome',
	    'surname' => 'Cognome',
	    'company' => 'Azienda',
	    'phone' => 'Telefono',
	    'email' => 'Email',
	    'note' => 'Note',
	    'address' => 'Indirizzo',
	    'city' => 'Città',
	    'cap' => 'CAP',
	    'state' => 'Provincia',
	    'country' => 'Nazione',
	    'license' => 'Licenza',
	    'fax' => 'Fax',
	    'web' => 'Sito web ',
	    'company_code' => 'Codice azienda',
	    'contract_from' => 'Contratto valido da',
	    'contract_to' => 'Scadenza contratto',
	    'reference' => 'Referente aziendale',
	    'phone_reference' => 'Telefono del referente',
	    'email_reference' => 'Mail del referente',
	    'company_description' => 'Presentazione dell\'azienda',
	    'visit_at' => 'data visita',
        'city' => 'città',
        'address' => 'indirizzo',
        'local' => 'locale',
        'local_definition' => 'ragione sociale',
        'furniture' => 'fornitore',
        'aperitif_auto' => 'Aperitivo autogestito',
        'advocacy' => 'Advocacy',
        'typevisit' => 'Tipo visite',
        's_consumer' => 'Serata consumer',
        'l_advocacy' => 'Light Advocacy',
        'first_visit' => 'Prima visita',
        'pot' => 'Potenziale',
        're' => 'Ripassaggio',
        'qsmr' => 'Serve Martini Royal',
        'qscc' => 'Serve Martini Cocktail',
        'case_1' => 'se è presente la vetrofania',
        'case_2' => 'se è presente la lavagna',
        'case_3' => 'se è presente l\'espositore',
        'case_4' => 'se sono presenti le locandine',
       // 'case_5' => 'se sono presenti i drink sul menù',
        'case_5' => 'se è presente il brand block',
        'case_6' => 'se è presente il quadro luminoso',
        'case_7' => 'se è presente il barmat',
        'case_8'=> 'se sono presenti i bicchieri',
        'case_9' => 'se è presente l\'ice bucket',
        'case_10' => 'se il personale ha le divise martini',
        'case_11' => 'se è presente il kit barman',
        'case_12' => 'se sono presenti i cavalierini',
        'case_13' => 'se sono presenti i menù',
        'case_14' => 'se è presente il Martini Royale  sul menù',
        'case_16' => 'se è presente almeno un cocktail sul menù',
        'case_17' => 'se è stato proposto il Martini Royale contest',
        'case_18' => 'se è stato proposto il Martini workshop',
       
        'nbarman' => 'il numero di barman presenti ',
        'mcons_1' => ' se non si indica la quantità va indicata una motivazione',
        'mcons_2' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_3' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_4' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_5' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_6' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_7' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_8' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_9' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_10' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_11' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_12' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_13' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_14' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_15' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_16' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_17' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_18' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_19' => 'se non si indica la quantità va indicata una motivazione',
        'mcons_20' => 'se non si indica la quantità va indicata una motivazione',
		'cons_1' => 'N° PERSONE PRESENTI NEL LOCALE',
		'cons_2' => 'N° TOTALE CONSUMAZIONI MARTINI',
		'cons_3' => 'N° CONSUMAZIONI MARTINI ROYALE BIANCO',
		'cons_4' => 'N° CONSUMAZIONI MARTINI ROYALE ROSATO',
		'cons_5' => 'N° CONSUMAZIONI ALTRI DRINK MARTINI - Negroni',
		'cons_6' => 'N° CONSUMAZIONI ALTRI DRINK MARTINI - Sbagliato',
		'cons_7' => 'N° CONSUMAZIONI ALTRI DRINK MARTINI - Orange',
		'cons_8' => 'N° CONSUMAZIONI ALTRI DRINK MARTINI - Americano',
		'cons_9' => 'N° CONSUMAZIONI APEROL SPRITZ',
		'cons_10' => 'N° ALTRI DRINK APERITIVO',
		'cons_11' => 'NUMERO DI GADGET DISTRIBUITI',
		'cons_12' => 'QUANTI MARTINI ROYALE A SETTIMANA?',
		'cons_13' => 'QUANTI NEGRONI A SETTIMANA?',
		'cons_14' => 'QUANTI SBAGLIATO A SETTIMANA?',
		'cons_15' => 'QUANTI AMERICANO A SETTIMANA?',
		'cons_16' => 'QUANTI SPRITZ APEROL SETTIMANA?',
		'cons_17' => 'QUANTI ALTRI COCKTAIL A SETTIMANA?',
		'cons_18' => 'QUANTE CONSUMAZIONI VINO O PROSECCO A SETTIMANA?',
		'cons_19' => 'QUANTE CONSUMAZIONI BIRRA A SETTIMANA?',
		'cons_20' => 'TOTALE CONSUMAZIONI ALCOLICHE A SETTIMANA?',

	    'h_stop' => ''






		),

);
