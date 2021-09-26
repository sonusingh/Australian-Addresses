# Australian-Addresses
API to validate Australian Addresses

Free and easy to use API to validate all Australian Addresses.

Australian data provided by G-NAF (https://data.gov.au/dataset/ds-dga-19432f89-dc3a-4ef3-b943-5326ef1dbecc/details)

# Create Custom Turf.js with area and polygon modules
Instructions:

Create file called main.js with following content:

```
module.exports = {
	polygon: require('turf-polygon'),
    area: require('@turf/area').default
};
```
Install required packages using npm:

```
$ npm install @turf/area
$ nmp install turf-polygon
```

Install Browserify

```
$ npm install -g browserify
```

Create the .js file for use in browser

```
$ browserify main.js -s turf > turf.js
```

Now you can use the .js file as follows for calculating area in sq kilometers:

```
<script src='turf.js'></script>
<script>
  var polygon = turf.polygon([[[129.37262972086899,-28.994096696431477],[129.42640506826433,-29.03150505570263],[129.4028613800062,-28.99804173111184], [129.37262972086899,-28.994096696431477]]] );

  var area = turf.area(polygon) / 1000000;

  document.write(area);
</script>
```

# Calculating area using PHP

ringArea() function returns the area for a given polygon (with lat long coordinates)

See ringArea.php for details.
