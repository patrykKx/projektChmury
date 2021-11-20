<?php

$date = date("Y-m-d H:i:s");
$name = "Patryk Kaźmierak";
$serverPort = $_SERVER["SERVER_PORT"];
$logs = "Data uruchomienia: $date, Imię: $name, Port: $serverPort\n";
//Zapisujemy logi do pliku
file_put_contents('./log_'.date("j.n.Y").'.log', $logs, FILE_APPEND);
$clientAddress = "";
if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $clientAddress = $_SERVER['HTTP_CLIENT_IP'];
}
//Jeśli adres IP jest z PROXY
else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $clientAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
//Jeśli adres IP jest remote
else {
    $clientAddress = $_SERVER['REMOTE_ADDR'];
}

//Token do pozyskania danych
$token = "awDEvbNqIzQyAvSljmyY";

//Pozyskujemy obiekt JSON z danymi 
$ipJsonData = file_get_contents("http://timezoneapi.io/api/ip/?$clientAddress&token=$token&output=json");

// Dekodujemy obiekt JSON
$ipData = json_decode($ipJsonData, true);

$clientTime = "";
// Jeśli zapytanie powiodło się
if($ipData['meta']['code'] == '200'){
    // Wyodrębniamy interesujące nas dane
    $time = $ipData['data']['datetime']['date_time'];
    //Konwertujemy date z formatu miesiąc/dzień/rok do dzień-miesiąc-rok 
    $clientTime = date("Y-m-d H:i:s", strtotime($time));
}
else {
    $clientTime = "Brak danych!";
}

//Wyświetlenie na stronie
echo "Data: $date<br/>";
echo "Imię i nazwisko studenta: $name<br/>";
echo "Port: $serverPort<br/>";
echo "Adres klienta: $clientAddress<br/>";
echo "Czas u klienta: $clientTime<br/>";
