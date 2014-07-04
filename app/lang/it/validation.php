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
	    'h_stop' => ''






		),

);
