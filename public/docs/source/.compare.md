---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Area

Represents the concept of an area, such as a river or city which has devices. Areas can contain other areas to potentially even represent a country and its various divisions
<!-- START_b055bf1d2fa3a87cf38479c31e5fbe19 -->
## Displays a listing of all areas paginated

Displays a listing of transformed area objects utilising fractal to provide include and pagination capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/area" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "bednarmouth",
        "name": "Bednarmouth",
        "parent_id": "markschester",
        "created_at": {
            "date": "2018-02-04 23:25:51.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at": {
            "date": "2018-02-04 23:25:51.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/area`

`HEAD api/area`


<!-- END_b055bf1d2fa3a87cf38479c31e5fbe19 -->

<!-- START_b1ba7f8b848b40d2f377596e202c98e1 -->
## Displays a single area&#039;s data request via its id

Returns a transformed item of the area model utilising fractal to provide include capatabilities

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "bednarmouth",
        "name": "Bednarmouth",
        "parent_id": "markschester",
        "created_at": {
            "date": "2018-02-04 23:25:51.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at": {
            "date": "2018-02-04 23:25:51.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/area/{area}`

`HEAD api/area/{area}`


<!-- END_b1ba7f8b848b40d2f377596e202c98e1 -->

#Area/Device

This is the subresource of all devices belonging to a supplied area.
<!-- START_00c47093f48f1b1265bf9e45b2270b66 -->
## Displays a listing of all devices belonging to the supplied area paginated

Displays a listing of transformed device objects belonging to the supplied area utilising fractal to provide include and pagination capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/device" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/device",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "abc0",
        "name": "Depth Sensor abc0",
        "latitude": "65.473911",
        "longitude": "-123.080888",
        "area_id": "raoulburgh",
        "created_at": {
            "date": "2018-02-04 23:25:51.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at": {
            "date": "2018-02-04 23:25:51.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/area/{area}/device`

`HEAD api/area/{area}/device`


<!-- END_00c47093f48f1b1265bf9e45b2270b66 -->

#Area/Error

This is the subresource of all errors belonging to a supplied area. An error belongs to an area if it belongs to a device in the area.
<!-- START_a5b37d4a0426f157af2027d9aa9820fb -->
## Displays a listing of all an areas errors paginated in divisons of 500

Displays a listing of transformed error points, belonging to the requested areas devices, utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/error" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/error",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/area/{area}/error`

`HEAD api/area/{area}/error`


<!-- END_a5b37d4a0426f157af2027d9aa9820fb -->

<!-- START_10c3a28983797c16bb5e28e20f887c36 -->
## Displays a listing of all an areas errors grouped into hourly points paginated in divisons of 500

Displays a listing of transformed error points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/error/hourly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/error/hourly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/area/{area}/error/hourly`

`HEAD api/area/{area}/error/hourly`


<!-- END_10c3a28983797c16bb5e28e20f887c36 -->

<!-- START_f98bf805422b967f8d61dc887a74a52c -->
## Displays a listing of all an areas errors grouped into daily points paginated in divisons of 500

Displays a listing of transformed error points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/error/daily" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/error/daily",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/area/{area}/error/daily`

`HEAD api/area/{area}/error/daily`


<!-- END_f98bf805422b967f8d61dc887a74a52c -->

<!-- START_27950e0ef64706cda34bbeadbafd421b -->
## Displays a listing of all an areas errors grouped into weekly points paginated in divisons of 500

Displays a listing of transformed error points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/error/weekly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/error/weekly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/area/{area}/error/weekly`

`HEAD api/area/{area}/error/weekly`


<!-- END_27950e0ef64706cda34bbeadbafd421b -->

<!-- START_42f09a686c97a376073a3592d80e37d0 -->
## Displays a listing of all an areas errors grouped into monthly points paginated in divisons of 500

Displays a listing of transformed error points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/error/monthly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/error/monthly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/area/{area}/error/monthly`

`HEAD api/area/{area}/error/monthly`


<!-- END_42f09a686c97a376073a3592d80e37d0 -->

<!-- START_ed5c5df56e9a98d0b6b9f251e8ad1849 -->
## Displays a listing of all an areas errors grouped into yearly points paginated in divisons of 500

Displays a listing of transformed error points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/error/yearly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/error/yearly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/area/{area}/error/yearly`

`HEAD api/area/{area}/error/yearly`


<!-- END_ed5c5df56e9a98d0b6b9f251e8ad1849 -->

#Area/Reading

This is the subresource of all readings belonging to a supplied area. A reading belongs to an area if it belongs to a device in the area.
<!-- START_eb9b28b38af7d79f15052d7cc10f05b8 -->
## Displays a listing of all an areas readings paginated in divisons of 500

Displays a listing of transformed reading points, belonging to the requested area's devices, utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/reading" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/reading",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/area/{area}/reading`

`HEAD api/area/{area}/reading`


<!-- END_eb9b28b38af7d79f15052d7cc10f05b8 -->

<!-- START_f1fc4fb4e3affa9fe9ecb6d2c781f44e -->
## Displays a listing of all an areas readings grouped into hourly points paginated in divisons of 500

Displays a listing of transformed reading points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/reading/hourly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/reading/hourly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/area/{area}/reading/hourly`

`HEAD api/area/{area}/reading/hourly`


<!-- END_f1fc4fb4e3affa9fe9ecb6d2c781f44e -->

<!-- START_2b509b1fe8c6d0cb7792ba203391a755 -->
## Displays a listing of all an areas readings grouped into daily points paginated in divisons of 500

Displays a listing of transformed reading points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/reading/daily" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/reading/daily",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/area/{area}/reading/daily`

`HEAD api/area/{area}/reading/daily`


<!-- END_2b509b1fe8c6d0cb7792ba203391a755 -->

<!-- START_087dbe6fb74bf7e680b324412e6bf254 -->
## Displays a listing of all an areas readings grouped into weekly points paginated in divisons of 500

Displays a listing of transformed reading points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/reading/weekly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/reading/weekly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/area/{area}/reading/weekly`

`HEAD api/area/{area}/reading/weekly`


<!-- END_087dbe6fb74bf7e680b324412e6bf254 -->

<!-- START_ccd89c1bb50bb2113ae27ee28657dc11 -->
## Displays a listing of all an areas readings grouped into monthly points paginated in divisons of 500

Displays a listing of transformed reading points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/reading/monthly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/reading/monthly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/area/{area}/reading/monthly`

`HEAD api/area/{area}/reading/monthly`


<!-- END_ccd89c1bb50bb2113ae27ee28657dc11 -->

<!-- START_84fc6420cc5c86e85f83c87361e4dd70 -->
## Displays a listing of all an areas readings grouped into yearly points paginated in divisons of 500

Displays a listing of transformed reading points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/area/{area}/reading/yearly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/area/{area}/reading/yearly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/area/{area}/reading/yearly`

`HEAD api/area/{area}/reading/yearly`


<!-- END_84fc6420cc5c86e85f83c87361e4dd70 -->

#Device

Each Device represents a different flood sensor in the network
<!-- START_4e779c96c0f768a6b9f37b353cfa1596 -->
## Displays a listing of all devices paginated

Displays a listing of transformed device objects utilising fractal to provide include and pagination capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/device" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "abc0",
        "name": "Depth Sensor abc0",
        "latitude": "65.473911",
        "longitude": "-123.080888",
        "area_id": "raoulburgh",
        "created_at": {
            "date": "2018-02-04 23:25:51.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at": {
            "date": "2018-02-04 23:25:51.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/device`

`HEAD api/device`


<!-- END_4e779c96c0f768a6b9f37b353cfa1596 -->

<!-- START_859169653752246ad09cf1c934510139 -->
## Displays a single device&#039;s data request via its id

Returns a transformed item of the device model utilising fractal to provide include capatabilities

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "abc0",
        "name": "Depth Sensor abc0",
        "latitude": "65.473911",
        "longitude": "-123.080888",
        "area_id": "raoulburgh",
        "created_at": {
            "date": "2018-02-04 23:25:51.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at": {
            "date": "2018-02-04 23:25:51.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/device/{device}`

`HEAD api/device/{device}`


<!-- END_859169653752246ad09cf1c934510139 -->

#Device/Error

This is the subresource of all errors belonging to a supplied device
<!-- START_cfb730f157efe5f97ec63c9cbf98fcd3 -->
## Displays a listing of all device errors paginated in divisons of 500

Displays a listing of transformed error points, belonging to the requested device, utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}/error" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}/error",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/device/{device}/error`

`HEAD api/device/{device}/error`


<!-- END_cfb730f157efe5f97ec63c9cbf98fcd3 -->

<!-- START_df64010a408de7ff41dae6f6f8d53a2c -->
## Displays a listing of all device errors grouped into hourly points paginated in divisons of 500

Displays a listing of transformed error points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}/error/hourly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}/error/hourly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/device/{device}/error/hourly`

`HEAD api/device/{device}/error/hourly`


<!-- END_df64010a408de7ff41dae6f6f8d53a2c -->

<!-- START_7d659122f07a404dbb12feedf8d3fff9 -->
## Displays a listing of all device errors grouped into daily points paginated in divisons of 500

Displays a listing of transformed error points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}/error/daily" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}/error/daily",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/device/{device}/error/daily`

`HEAD api/device/{device}/error/daily`


<!-- END_7d659122f07a404dbb12feedf8d3fff9 -->

<!-- START_01db4549c956007738937b172ae9b768 -->
## Displays a listing of all device errors grouped into weekly points paginated in divisons of 500

Displays a listing of transformed error points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}/error/weekly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}/error/weekly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/device/{device}/error/weekly`

`HEAD api/device/{device}/error/weekly`


<!-- END_01db4549c956007738937b172ae9b768 -->

<!-- START_4dec4f1e4a21d8a31e39e1dd9b93b0b3 -->
## Displays a listing of all device errors grouped into monthly points paginated in divisons of 500

Displays a listing of transformed error points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}/error/monthly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}/error/monthly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/device/{device}/error/monthly`

`HEAD api/device/{device}/error/monthly`


<!-- END_4dec4f1e4a21d8a31e39e1dd9b93b0b3 -->

<!-- START_dc93945490b1d40d4541115cc687cdeb -->
## Displays a listing of all device errors grouped into yearly points paginated in divisons of 500

Displays a listing of transformed error points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}/error/yearly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}/error/yearly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/device/{device}/error/yearly`

`HEAD api/device/{device}/error/yearly`


<!-- END_dc93945490b1d40d4541115cc687cdeb -->

#Device/Reading

This is the subresource of all readings belonging to a supplied device
<!-- START_3b0e624d726573bd9291c17ef00de699 -->
## Displays a listing of all device readings paginated in divisons of 500

Displays a listing of transformed reading points, belonging to the requested device, utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}/reading" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}/reading",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/device/{device}/reading`

`HEAD api/device/{device}/reading`


<!-- END_3b0e624d726573bd9291c17ef00de699 -->

<!-- START_38df3fd9dd70d59e9233022dc7ba2b75 -->
## Displays a listing of all device readings grouped into hourly points paginated in divisons of 500

Displays a listing of transformed reading points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}/reading/hourly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}/reading/hourly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/device/{device}/reading/hourly`

`HEAD api/device/{device}/reading/hourly`


<!-- END_38df3fd9dd70d59e9233022dc7ba2b75 -->

<!-- START_441d895289e721aaedcaee6e773394ff -->
## Displays a listing of all device readings grouped into daily points paginated in divisons of 500

Displays a listing of transformed reading points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}/reading/daily" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}/reading/daily",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/device/{device}/reading/daily`

`HEAD api/device/{device}/reading/daily`


<!-- END_441d895289e721aaedcaee6e773394ff -->

<!-- START_30e1253c6a52f13b00396515740f15d5 -->
## Displays a listing of all device readings grouped into weekly points paginated in divisons of 500

Displays a listing of transformed reading points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}/reading/weekly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}/reading/weekly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/device/{device}/reading/weekly`

`HEAD api/device/{device}/reading/weekly`


<!-- END_30e1253c6a52f13b00396515740f15d5 -->

<!-- START_f507f891649464f4157a2a0807e48a53 -->
## Displays a listing of all device readings grouped into monthly points paginated in divisons of 500

Displays a listing of transformed reading points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}/reading/monthly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}/reading/monthly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/device/{device}/reading/monthly`

`HEAD api/device/{device}/reading/monthly`


<!-- END_f507f891649464f4157a2a0807e48a53 -->

<!-- START_b48abdbb2aa2060e0d9a73496c248733 -->
## Displays a listing of all device readings grouped into yearly points paginated in divisons of 500

Displays a listing of transformed reading points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.

> Example request:

```bash
curl -X GET "http://localhost/api/device/{device}/reading/yearly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/device/{device}/reading/yearly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/device/{device}/reading/yearly`

`HEAD api/device/{device}/reading/yearly`


<!-- END_b48abdbb2aa2060e0d9a73496c248733 -->

#Error

Error represents error points in the influx database
<!-- START_27b25fc230ce0f35a2dbb95d9903fc07 -->
## Displays a listing of all errors paginated in divisons of 500

Displays a listing of transformed error points utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/error" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/error",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/error`

`HEAD api/error`


<!-- END_27b25fc230ce0f35a2dbb95d9903fc07 -->

<!-- START_26c3272b77657faa1734d116cdb2e49a -->
## Displays a listing of all errors grouped into hourly points paginated in divisons of 500

Displays a listing of transformed error points utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/error/hourly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/error/hourly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/error/hourly`

`HEAD api/error/hourly`


<!-- END_26c3272b77657faa1734d116cdb2e49a -->

<!-- START_8dee2bdae5dd47c2d2845928cd33d662 -->
## Displays a listing of all errors grouped into daily points paginated in divisons of 500

Displays a listing of transformed error points utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/error/daily" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/error/daily",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/error/daily`

`HEAD api/error/daily`


<!-- END_8dee2bdae5dd47c2d2845928cd33d662 -->

<!-- START_d090cc62f1e652d4179b7a754c558c1d -->
## Displays a listing of all errors grouped into weekly points paginated in divisons of 500

Displays a listing of transformed error points utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/error/weekly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/error/weekly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/error/weekly`

`HEAD api/error/weekly`


<!-- END_d090cc62f1e652d4179b7a754c558c1d -->

<!-- START_4f3ee28387bb58bcf31d0b67a1357609 -->
## Displays a listing of all errors grouped into monthly points paginated in divisons of 500

Displays a listing of transformed error points utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/error/monthly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/error/monthly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/error/monthly`

`HEAD api/error/monthly`


<!-- END_4f3ee28387bb58bcf31d0b67a1357609 -->

<!-- START_dbbf43b8bf14083428faf85d3a8dbd33 -->
## Displays a listing of all errors grouped into yearly points paginated in divisons of 500

Displays a listing of transformed error points utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/error/yearly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/error/yearly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/error/yearly`

`HEAD api/error/yearly`


<!-- END_dbbf43b8bf14083428faf85d3a8dbd33 -->

#Reading

Reading represents readings points in the influx database
<!-- START_02d64af00a84d1c15b6f04ac08b45124 -->
## Displays a listing of all readings paginated in divisons of 500

Displays a listing of transformed reading points utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/reading" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/reading",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/reading`

`HEAD api/reading`


<!-- END_02d64af00a84d1c15b6f04ac08b45124 -->

<!-- START_118f0ba6380497f047a9d157a4b194fe -->
## Displays a listing of all readings grouped into hourly points paginated in divisons of 500

Displays a listing of transformed reading points utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/reading/hourly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/reading/hourly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/reading/hourly`

`HEAD api/reading/hourly`


<!-- END_118f0ba6380497f047a9d157a4b194fe -->

<!-- START_d7c0ed6e9ba46eab6b4b3a498af28c47 -->
## Displays a listing of all readings grouped into daily points paginated in divisons of 500

Displays a listing of transformed reading points utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/reading/daily" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/reading/daily",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/reading/daily`

`HEAD api/reading/daily`


<!-- END_d7c0ed6e9ba46eab6b4b3a498af28c47 -->

<!-- START_a7a316cfe72f1a6b0f21827f6ad081e2 -->
## Displays a listing of all readings grouped into weekly points paginated in divisons of 500

Displays a listing of transformed reading points utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/reading/weekly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/reading/weekly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/reading/weekly`

`HEAD api/reading/weekly`


<!-- END_a7a316cfe72f1a6b0f21827f6ad081e2 -->

<!-- START_d5b381beaf3d93f9f3ce6ed239252be7 -->
## Displays a listing of all readings grouped into monthly points paginated in divisons of 500

Displays a listing of transformed reading points utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/reading/monthly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/reading/monthly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/reading/monthly`

`HEAD api/reading/monthly`


<!-- END_d5b381beaf3d93f9f3ce6ed239252be7 -->

<!-- START_44af4ea5032232a868c4b6f191b8897c -->
## Displays a listing of all readings grouped into yearly points paginated in divisons of 500

Displays a listing of transformed reading points utilising fractal to provide include capabilities

> Example request:

```bash
curl -X GET "http://localhost/api/reading/yearly" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/reading/yearly",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "-",
        "device_id": null,
        "type": 0,
        "display_type": null,
        "reading": null,
        "power": null,
        "time": null
    }
}
```

### HTTP Request
`GET api/reading/yearly`

`HEAD api/reading/yearly`


<!-- END_44af4ea5032232a868c4b6f191b8897c -->

