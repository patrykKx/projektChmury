Zadanie 3 - polecenia <br />
a. zbudowania opracowanego obrazu kontenera <br />
  DOCKER_BUILDKIT=1 docker build -t projectphp . <br /><br />
b. uruchomienia kontenera na podstawie zbudowanego obrazu <br />
  docker run -d -p 80:80 --name phprunning projectphp <br /><br />
c. sposobu uzyskania informacji, które wygenerował serwer w trakcie uruchamiana kontenera <br />
Wchodzimy do kontenera <br />
  docker exec -it phprunning bash <br />
Wchodzimy na przeglądarkę i wywołujemy skrypt w celu utworzenia logów <br />
W kontenerze poleceniem ls -l listujemy zawartość katalogu /var/www/html <br />
Odnajdujemy plik z logami i wchodzimy w niego <br />
  cat log_20.11.2021.log <br /><br />
d. sprawdzenia, ile warstw posiada zbudowany obraz <br />
  docker image inspect projectphp | jq ".[] .RootFS" <br /><br />
Zadanie 4 <br />
Jak przenieść stworzony obraz na swoje konto na DockerHub? <br />
Aby przenieść obraz na swoje konto na DockerHub należy: <br />
 - Utworzyć repozytorium na DockerHub <br />
 - Nazwać obraz tak jak repozytorium <br />
 - Dokonać commita istniejącego kontenera do repozytorium <br />
 - Wykonać push (przesłanie obrazu do repozytorium) <br /><br />
W pliku pdf są dołączone zrzuty ekranów potwierdzające wykonane działania.
