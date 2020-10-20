# Sectii de votare in diaspora

Secții De Votare Străinătate pentru alegerile prezidentiale din Moldova din Noiembrie 2020.

## 0

Open Google Chrome browser and navigate to https://www.google.com/maps/d/u/0/embed?mid=1PWxm9B-JtKBZ-Qx_sCP2Q9oxV89HA3if&ll=47.420074485524275%2C20.917269552123884&z=5

In _More tools > Developer tools > Console_, write: ``_pageData`` and press enter.

Copy about ~2MB of json data into ``var/json/_pageData.json`` file.

## 1

In order to parse and export the geo data, run the docker container via docker-compose: 

```
docker-compose up -d --build
``` 

The data related to "Sectii de votare in diaspora" will be available in ``var/json/markers.json`` file.
