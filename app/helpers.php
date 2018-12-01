<?php
function getField($var, $mandatory = true) {
    if ($var) {
        if (validateDate($var) && !starts_with($var, '0000-00-00'))
            return getReadableDate($var);
        return $var;
    } else {
        if ($mandatory)
            return "NON COMPILATO";
        else {
            if (starts_with($var, '0000-00-00'))
                return '';
            return $var;
        }
    }
}

//function getMoney($var) {
//    $symbol = "&euro;";
//
//
//    if($_SERVER['HTTP_HOST']=='avviso12015.test')
//        return $symbol . " " . $var;
//    else
//        return $symbol . " " . $var;// $symbol . " " . money_format('%.2n', $var);
//}

function getReadableDate($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d->format('d/m/Y');
}

function validateDate($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') == $date;
}

function getRounded($var, $precision = 2) {
    return round($var, $precision);
}

function getIncludedImage($url) {
    $imgData = base64_encode(file_get_contents($url));
    //return 'data: '.mime_content_type($url).';base64,'.$imgData;
    return 'data: image/png;base64,'.$imgData;
}

/**
 * Encoding querystring
 * @param $params , array di parametri per il querystring URL, i parametri per il corretto funzionamento delle breadcrumb devono essere id[nomeentità al singolare]
 * @return string, encoding del querystring
 */
function encodingQuerystring($params)
{
    if (!is_array($params))
        $params = [$params];
    if (Config::get('app.encrypt'))
        return base64_encode(http_build_query($params));
    else
        return http_build_query($params);
}

/**
 * Questa funzione restituisce il valore passato formattato secondo le opzioni indicate.
 * @param $var , parametro da visualizzare
 * @param array $opz , contiene le varie opzioni disponibili, nel caso non venga specificato verranno usai i seguenti valori:
 *  symbol => &euro;
 *  precision => 2
 * @return string
 */
function getMoney($var, $opz = [])
{
    $defaultOpz = [
        'symbol' => '&euro;',
        'precision' => 2,
    ];

    $opz = array_merge($defaultOpz, $opz);

    if (_isWindows())
        return $opz['symbol'] . " " . number_format($var, $opz['precision']);
    return $opz['symbol'] . " " . money_format("%." . $opz['precision'] . "n", $var);
}


function _isWindows()
{
    if (substr(strtoupper(PHP_OS), 0, 3) == "WIN")
        return true;
    return false;
}
