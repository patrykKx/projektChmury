Zadanie 3 - polecenia
a. zbudowania opracowanego obrazu kontenera
  DOCKER_BUILDKIT=1 docker build -t projectphp .
b. uruchomienia kontenera na podstawie zbudowanego obrazu
  docker run -d -p 80:80 --name phprunning projectphp
c. sposobu uzyskania informacji, które wygenerował serwer w trakcie uruchamiana kontenera
Wchodzimy do kontenera
  docker exec -it phprunning bash
Wchodzimy na przeglądarkę i wywołujemy skrypt w celu utworzenia logów
W kontenerze poleceniem ls -l listujemy zawartość katalogu /var/www/html
Odnajdujemy plik z logami i wchodzimy w niego
  cat log_20.11.2021.log
d. sprawdzenia, ile warstw posiada zbudowany obraz
  docker image inspect projectphp | jq ".[] .RootFS"
  
W pliku pdf są dołączone zrzuty ekranów potwierdzające wykonane działania.
