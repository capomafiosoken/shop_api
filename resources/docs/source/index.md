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

<!-- END_INFO -->

#Access management


APIs for managing access
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Log In User

> Example request:

```bash
curl -X POST \
    "http://localhost/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"dolores","email":"commodi"}'

```

```javascript
const url = new URL(
    "http://localhost/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "dolores",
    "email": "commodi"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "token": "Bearer token",
    "role": "user"
}
```
> Example response (401):

```json
{
    "error": "Unauthorized"
}
```

### HTTP Request
`POST api/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | User Name
        `email` | string |  required  | User Email
    
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_61739f3220a224b34228600649230ad1 -->
## Log out Authenticated User

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Logged Out"
}
```

### HTTP Request
`POST api/logout`


<!-- END_61739f3220a224b34228600649230ad1 -->

<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Registration User

> Example request:

```bash
curl -X POST \
    "http://localhost/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"distinctio","email":"assumenda","password":"animi"}'

```

```javascript
const url = new URL(
    "http://localhost/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "distinctio",
    "email": "assumenda",
    "password": "animi"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Registered"
}
```

### HTTP Request
`POST api/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | User Name
        `email` | string |  required  | User Email
        `password` | string |  required  | User Password
    
<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

#Address management

APIs for managing addresses
<!-- START_f62d434079dff3acd53aa774d160d2ad -->
## Display a listing of the address.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/addresses?page=6&per_page=4" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/addresses"
);

let params = {
    "page": "6",
    "per_page": "4",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "zip_code": "6666",
            "address": "Дом Ерсына",
            "full_name": "Зачем нам это поле?",
            "telephone_number": "87021234567",
            "note": "ывфывфывфывфыввфыв ыфввфывф фывфы",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "city": {
                "id": 1,
                "region_id": 1,
                "zip_code": "8359",
                "name": "Нур-Султан",
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        },
        {
            "id": 1,
            "zip_code": "6666",
            "address": "Дом Ерсына",
            "full_name": "Зачем нам это поле?",
            "telephone_number": "87021234567",
            "note": "ывфывфывфывфыввфыв ыфввфывф фывфы",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "city": {
                "id": 1,
                "region_id": 1,
                "zip_code": "8359",
                "name": "Нур-Султан",
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        }
    ]
}
```

### HTTP Request
`GET api/addresses`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `page` |  required  | The page number. default = 1
    `per_page` |  required  | The number of items per list. default = 15

<!-- END_f62d434079dff3acd53aa774d160d2ad -->

<!-- START_c8fad65a796e6206c26cb584c46221b7 -->
## Store a newly created address in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/addresses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"city_id":"enim","zip_code":"fugit","address":"minus","full_name":"explicabo","telephone_number":"dolorem","note":"commodi"}'

```

```javascript
const url = new URL(
    "http://localhost/api/addresses"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "city_id": "enim",
    "zip_code": "fugit",
    "address": "minus",
    "full_name": "explicabo",
    "telephone_number": "dolorem",
    "note": "commodi"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "zip_code": "6666",
        "address": "Дом Ерсына",
        "full_name": "Зачем нам это поле?",
        "telephone_number": "87021234567",
        "note": "ывфывфывфывфыввфыв ыфввфывф фывфы",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "city": {
            "id": 1,
            "region_id": 1,
            "zip_code": "8359",
            "name": "Нур-Султан",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        }
    }
}
```

### HTTP Request
`POST api/addresses`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `city_id` | numeric |  required  | City Id
        `zip_code` | string |  required  | Zip Code
        `address` | string |  required  | Address
        `full_name` | string |  required  | Full Name of Customer
        `telephone_number` | string |  required  | Number of Customer
        `note` | string |  optional  | Notes
    
<!-- END_c8fad65a796e6206c26cb584c46221b7 -->

<!-- START_25f4303d28e06d127578df97937cdb67 -->
## Display the specified address.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/addresses/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/addresses/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "zip_code": "6666",
        "address": "Дом Ерсына",
        "full_name": "Зачем нам это поле?",
        "telephone_number": "87021234567",
        "note": "ывфывфывфывфыввфыв ыфввфывф фывфы",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "city": {
            "id": 1,
            "region_id": 1,
            "zip_code": "8359",
            "name": "Нур-Султан",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        }
    }
}
```

### HTTP Request
`GET api/addresses/{address}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Address Id

<!-- END_25f4303d28e06d127578df97937cdb67 -->

<!-- START_8f97ba08be391bb75680a4b5a24c9f6d -->
## Update the specified address in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/addresses/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"city_id":"dicta","zip_code":"sit","address":"et","full_name":"laborum","telephone_number":"impedit","note":"cupiditate"}'

```

```javascript
const url = new URL(
    "http://localhost/api/addresses/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "city_id": "dicta",
    "zip_code": "sit",
    "address": "et",
    "full_name": "laborum",
    "telephone_number": "impedit",
    "note": "cupiditate"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "zip_code": "6666",
        "address": "Дом Ерсына",
        "full_name": "Зачем нам это поле?",
        "telephone_number": "87021234567",
        "note": "ывфывфывфывфыввфыв ыфввфывф фывфы",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "city": {
            "id": 1,
            "region_id": 1,
            "zip_code": "8359",
            "name": "Нур-Султан",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        }
    }
}
```

### HTTP Request
`PUT api/addresses/{address}`

`PATCH api/addresses/{address}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Address's Id to be Updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `city_id` | numeric |  optional  | City Id
        `zip_code` | string |  optional  | Zip Code
        `address` | string |  optional  | Address
        `full_name` | string |  optional  | Full Name of Customer
        `telephone_number` | string |  optional  | Number of Customer
        `note` | string |  optional  | Notes
    
<!-- END_8f97ba08be391bb75680a4b5a24c9f6d -->

<!-- START_e5d3d7a19170fe1ef6901a6ddf8eaeae -->
## Remove the specified address from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/addresses/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/addresses/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Address Deleted"
}
```

### HTTP Request
`DELETE api/addresses/{address}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | Address's Id to be Deleted

<!-- END_e5d3d7a19170fe1ef6901a6ddf8eaeae -->

#Brand management

APIs for managing brands
<!-- START_49314ee162f7e839596684af0fed40e9 -->
## Display a listing of the brand.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/brands?page=8&per_page=16" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/brands"
);

let params = {
    "page": "8",
    "per_page": "16",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "louis vuitton",
            "alias": "LV",
            "description": "ОписаниеLouis Vuitton — французский дом моды,\r\n                специализирующийся на производстве чемоданов и сумок, модной одежды,\r\n                парфюмерии и аксессуаров класса «люкс» под одноимённой торговой маркой.",
            "image": "no_image.jpg",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 1,
            "name": "louis vuitton",
            "alias": "LV",
            "description": "ОписаниеLouis Vuitton — французский дом моды,\r\n                специализирующийся на производстве чемоданов и сумок, модной одежды,\r\n                парфюмерии и аксессуаров класса «люкс» под одноимённой торговой маркой.",
            "image": "no_image.jpg",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        }
    ]
}
```

### HTTP Request
`GET api/brands`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `page` |  required  | The page number. default = 1
    `per_page` |  required  | The number of items per list. default = 15

<!-- END_49314ee162f7e839596684af0fed40e9 -->

<!-- START_745f1520c22769b1767899facf665d2b -->
## Store a newly created brand in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/brands" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"id","alias":"odit","description":"aut","image":"dicta"}'

```

```javascript
const url = new URL(
    "http://localhost/api/brands"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "id",
    "alias": "odit",
    "description": "aut",
    "image": "dicta"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "louis vuitton",
        "alias": "LV",
        "description": "ОписаниеLouis Vuitton — французский дом моды,\r\n                специализирующийся на производстве чемоданов и сумок, модной одежды,\r\n                парфюмерии и аксессуаров класса «люкс» под одноимённой торговой маркой.",
        "image": "no_image.jpg",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    }
}
```

### HTTP Request
`POST api/brands`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Brand Name
        `alias` | string |  required  | Unique Alias
        `description` | string |  required  | Description
        `image` | image |  optional  | Image
    
<!-- END_745f1520c22769b1767899facf665d2b -->

<!-- START_d6817829cfe616a73d4ac4da93453508 -->
## Display the specified brand.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/brands/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/brands/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "louis vuitton",
        "alias": "LV",
        "description": "ОписаниеLouis Vuitton — французский дом моды,\r\n                специализирующийся на производстве чемоданов и сумок, модной одежды,\r\n                парфюмерии и аксессуаров класса «люкс» под одноимённой торговой маркой.",
        "image": "no_image.jpg",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/brands/{brand}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Brand Id

<!-- END_d6817829cfe616a73d4ac4da93453508 -->

<!-- START_042c9bfce86a99d5c778f8e02c29a5d7 -->
## Update the specified brand in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/brands/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"dolores","alias":"placeat","description":"suscipit","image":"est"}'

```

```javascript
const url = new URL(
    "http://localhost/api/brands/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "dolores",
    "alias": "placeat",
    "description": "suscipit",
    "image": "est"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "louis vuitton",
        "alias": "LV",
        "description": "ОписаниеLouis Vuitton — французский дом моды,\r\n                специализирующийся на производстве чемоданов и сумок, модной одежды,\r\n                парфюмерии и аксессуаров класса «люкс» под одноимённой торговой маркой.",
        "image": "no_image.jpg",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    }
}
```

### HTTP Request
`PUT api/brands/{brand}`

`PATCH api/brands/{brand}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Brand Id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | Brand Name
        `alias` | string |  optional  | Unique Alias
        `description` | string |  optional  | Description
        `image` | image |  optional  | Image
    
<!-- END_042c9bfce86a99d5c778f8e02c29a5d7 -->

<!-- START_6bc624c1de327f8a14d11df082f18630 -->
## Remove the specified brand from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/brands/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/brands/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Brand Deleted"
}
```

### HTTP Request
`DELETE api/brands/{brand}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Brand Id

<!-- END_6bc624c1de327f8a14d11df082f18630 -->

#Category management

APIs for managing categories
<!-- START_109013899e0bc43247b0f00b67f889cf -->
## Display a listing of the category.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Техника и электроника",
            "alias": "электротехника",
            "parent_id": null,
            "keyword": "электротехника",
            "description": null,
            "image": "no_image.jpg",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "categories": [
                {
                    "id": 2,
                    "name": "Ноутбуки и нетбуки",
                    "alias": "ноуты",
                    "parent_id": 1,
                    "keyword": "ноуты",
                    "description": null,
                    "image": "no_image.jpg",
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "categories": []
                }
            ]
        },
        {
            "id": 1,
            "name": "Техника и электроника",
            "alias": "электротехника",
            "parent_id": null,
            "keyword": "электротехника",
            "description": null,
            "image": "no_image.jpg",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "categories": [
                {
                    "id": 2,
                    "name": "Ноутбуки и нетбуки",
                    "alias": "ноуты",
                    "parent_id": 1,
                    "keyword": "ноуты",
                    "description": null,
                    "image": "no_image.jpg",
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "categories": []
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET api/categories`


<!-- END_109013899e0bc43247b0f00b67f889cf -->

<!-- START_2335abbed7f782ea7d7dd6df9c738d74 -->
## Store a newly created resource in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"minus","alias":"pariatur","parent_id":"esse","keyword":"suscipit","description":"quia","image":"minus"}'

```

```javascript
const url = new URL(
    "http://localhost/api/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "minus",
    "alias": "pariatur",
    "parent_id": "esse",
    "keyword": "suscipit",
    "description": "quia",
    "image": "minus"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/categories`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Category name
        `alias` | string |  required  | Category alias for future use as routes
        `parent_id` | string |  required  | Category parent Id if it's child category
        `keyword` | string |  optional  | Keyword
        `description` | string |  optional  | Description
        `image` | image |  optional  | Image
    
<!-- END_2335abbed7f782ea7d7dd6df9c738d74 -->

<!-- START_34925c1e31e7ecc53f8f52c8b1e91d44 -->
## Display the specified category.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "Техника и электроника",
        "alias": "электротехника",
        "parent_id": null,
        "keyword": "электротехника",
        "description": null,
        "image": "no_image.jpg",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "categories": [
            {
                "id": 2,
                "name": "Ноутбуки и нетбуки",
                "alias": "ноуты",
                "parent_id": 1,
                "keyword": "ноуты",
                "description": null,
                "image": "no_image.jpg",
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "categories": []
            }
        ]
    }
}
```

### HTTP Request
`GET api/categories/{category}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Category Id

<!-- END_34925c1e31e7ecc53f8f52c8b1e91d44 -->

<!-- START_549109b98c9f25ebff47fb4dc23423b6 -->
## Update the specified category in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"laudantium","alias":"nisi","parent_id":"recusandae","keyword":"doloribus","image":"omnis"}'

```

```javascript
const url = new URL(
    "http://localhost/api/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "laudantium",
    "alias": "nisi",
    "parent_id": "recusandae",
    "keyword": "doloribus",
    "image": "omnis"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "Техника и электроника",
        "alias": "электротехника",
        "parent_id": null,
        "keyword": "электротехника",
        "description": null,
        "image": "no_image.jpg",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "categories": [
            {
                "id": 2,
                "name": "Ноутбуки и нетбуки",
                "alias": "ноуты",
                "parent_id": 1,
                "keyword": "ноуты",
                "description": null,
                "image": "no_image.jpg",
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "categories": []
            }
        ]
    }
}
```

### HTTP Request
`PUT api/categories/{category}`

`PATCH api/categories/{category}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | Category's Id to be Updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Category name
        `alias` | string |  required  | Category alias for future use as routes
        `parent_id` | string |  required  | Category parent Id if it's child category
        `keyword` | string |  optional  | Keyword
        `image` | image |  optional  | Image
    
<!-- END_549109b98c9f25ebff47fb4dc23423b6 -->

<!-- START_7513823f87b59040507bd5ab26f9ceb5 -->
## Remove the specified category from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Category Deleted"
}
```

### HTTP Request
`DELETE api/categories/{category}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | Category's Id to be Deleted

<!-- END_7513823f87b59040507bd5ab26f9ceb5 -->

#City management

APIs for managing cities
<!-- START_56d7be9447e2ce39ac69b09141bf5902 -->
## Display a listing of the city.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/cities?page=13&per_page=3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/cities"
);

let params = {
    "page": "13",
    "per_page": "3",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "region_id": 1,
            "zip_code": "8359",
            "name": "Нур-Султан",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 1,
            "region_id": 1,
            "zip_code": "8359",
            "name": "Нур-Султан",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        }
    ]
}
```

### HTTP Request
`GET api/cities`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `page` |  required  | The page number. default = 1
    `per_page` |  required  | The number of items per list. default = 15

<!-- END_56d7be9447e2ce39ac69b09141bf5902 -->

<!-- START_4d36a2828ff43205fcdf97b0cf6fdcfe -->
## Store a newly created city in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/cities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"alias","region_id":"quia","zip_code":"quo"}'

```

```javascript
const url = new URL(
    "http://localhost/api/cities"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "alias",
    "region_id": "quia",
    "zip_code": "quo"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "region_id": 1,
        "zip_code": "8359",
        "name": "Нур-Султан",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    }
}
```

### HTTP Request
`POST api/cities`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | City Name
        `region_id` | numeric |  required  | Region Id
        `zip_code` | string |  optional  | default zip code for addresses in city
    
<!-- END_4d36a2828ff43205fcdf97b0cf6fdcfe -->

<!-- START_0651fff87b81a4d1e8d166065f7676f0 -->
## Display the specified city.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/cities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/cities/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "region_id": 1,
        "zip_code": "8359",
        "name": "Нур-Султан",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/cities/{city}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | City Id

<!-- END_0651fff87b81a4d1e8d166065f7676f0 -->

<!-- START_876156d0dfb9d96d9a806f37cfa97680 -->
## api/cities/{city}
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/cities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"et","region_id":"maxime","zip_code":"officia"}'

```

```javascript
const url = new URL(
    "http://localhost/api/cities/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "et",
    "region_id": "maxime",
    "zip_code": "officia"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "region_id": 1,
        "zip_code": "8359",
        "name": "Нур-Султан",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    }
}
```

### HTTP Request
`PUT api/cities/{city}`

`PATCH api/cities/{city}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | City Id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | City Name
        `region_id` | numeric |  optional  | Region Id
        `zip_code` | string |  optional  | default zip code for addresses in city
    
<!-- END_876156d0dfb9d96d9a806f37cfa97680 -->

<!-- START_ca7712807e8d39d79e5efc44555cb8b5 -->
## Remove the specified city from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/cities/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/cities/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "City Deleted"
}
```

### HTTP Request
`DELETE api/cities/{city}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | City Id

<!-- END_ca7712807e8d39d79e5efc44555cb8b5 -->

#Currency management

APIs for managing currency
<!-- START_aa2087c88a0544b7da514dfdd673acc0 -->
## Display a listing of the currency.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/currencies?page=4&per_page=6" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/currencies"
);

let params = {
    "page": "4",
    "per_page": "6",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "created_at": null,
            "updated_at": null,
            "name": "Тенге",
            "code": "KZT",
            "symbol_left": null,
            "symbol_right": null,
            "value": 1,
            "base": "0",
            "deleted_at": null
        },
        {
            "id": 1,
            "created_at": null,
            "updated_at": null,
            "name": "Тенге",
            "code": "KZT",
            "symbol_left": null,
            "symbol_right": null,
            "value": 1,
            "base": "0",
            "deleted_at": null
        }
    ]
}
```

### HTTP Request
`GET api/currencies`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `page` |  required  | The page number. default = 1
    `per_page` |  required  | The number of items per list. default = 15

<!-- END_aa2087c88a0544b7da514dfdd673acc0 -->

<!-- START_3a3de8519134b961245b00843c83314c -->
## Store a newly created currency in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/currencies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"et","code":"ea","symbol_left":"accusantium","symbol_right":"voluptas","value":"corporis","base":"doloremque"}'

```

```javascript
const url = new URL(
    "http://localhost/api/currencies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "et",
    "code": "ea",
    "symbol_left": "accusantium",
    "symbol_right": "voluptas",
    "value": "corporis",
    "base": "doloremque"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "created_at": null,
        "updated_at": null,
        "name": "Тенге",
        "code": "KZT",
        "symbol_left": null,
        "symbol_right": null,
        "value": 1,
        "base": "0",
        "deleted_at": null
    }
}
```

### HTTP Request
`POST api/currencies`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Currency Name
        `code` | string |  required  | Currency Name
        `symbol_left` | string |  optional  | Currency Name
        `symbol_right` | string |  optional  | Currency Name
        `value` | numeric |  required  | Currency Name
        `base` | enum[0:1] |  required  | Currency Name
    
<!-- END_3a3de8519134b961245b00843c83314c -->

<!-- START_dbc92b87f08648e5fc649f6677876ac0 -->
## Display the specified currency.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/currencies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/currencies/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "created_at": null,
        "updated_at": null,
        "name": "Тенге",
        "code": "KZT",
        "symbol_left": null,
        "symbol_right": null,
        "value": 1,
        "base": "0",
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/currencies/{currency}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Currency Id

<!-- END_dbc92b87f08648e5fc649f6677876ac0 -->

<!-- START_c6971b0296ea1ec27eff9ccf57dd7cac -->
## api/currencies/{currency}
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/currencies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"veritatis","code":"voluptatem","symbol_left":"eum","symbol_right":"velit","value":"ipsum","base":"voluptates"}'

```

```javascript
const url = new URL(
    "http://localhost/api/currencies/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "veritatis",
    "code": "voluptatem",
    "symbol_left": "eum",
    "symbol_right": "velit",
    "value": "ipsum",
    "base": "voluptates"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "created_at": null,
        "updated_at": null,
        "name": "Тенге",
        "code": "KZT",
        "symbol_left": null,
        "symbol_right": null,
        "value": 1,
        "base": "0",
        "deleted_at": null
    }
}
```

### HTTP Request
`PUT api/currencies/{currency}`

`PATCH api/currencies/{currency}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Currency Id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | Currency Name
        `code` | string |  optional  | Currency Name
        `symbol_left` | string |  optional  | Currency Name
        `symbol_right` | string |  optional  | Currency Name
        `value` | numeric |  optional  | Currency Name
        `base` | enum[0:1] |  optional  | Currency Name
    
<!-- END_c6971b0296ea1ec27eff9ccf57dd7cac -->

<!-- START_c2a506528fd96c1a820f64892ce7068f -->
## Remove the specified currency from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/currencies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/currencies/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Currency Deleted"
}
```

### HTTP Request
`DELETE api/currencies/{currency}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Currency Id

<!-- END_c2a506528fd96c1a820f64892ce7068f -->

#FilterGroup management

APIs for managing filter groups
<!-- START_ea79b130426ba62aa89eb615fe141273 -->
## Display a listing of the FilterGroup.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/filterGroups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/filterGroups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 3,
            "name": "Скидки"
        },
        {
            "id": 3,
            "name": "Скидки"
        }
    ]
}
```

### HTTP Request
`GET api/filterGroups`


<!-- END_ea79b130426ba62aa89eb615fe141273 -->

<!-- START_ea85ef12613994737199a6fbbd82268a -->
## Store a newly created FilterGroup in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/filterGroups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"perspiciatis"}'

```

```javascript
const url = new URL(
    "http://localhost/api/filterGroups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "perspiciatis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 3,
        "name": "Скидки"
    }
}
```

### HTTP Request
`POST api/filterGroups`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Name
    
<!-- END_ea85ef12613994737199a6fbbd82268a -->

<!-- START_f09c97d504496781c57acab62d1f0af9 -->
## Display the specified FilterGroup.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/filterGroups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/filterGroups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 3,
        "name": "Скидки"
    }
}
```

### HTTP Request
`GET api/filterGroups/{filterGroup}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | FilterGroup Id

<!-- END_f09c97d504496781c57acab62d1f0af9 -->

<!-- START_4a49528297ece6a55a7fa00c5abee481 -->
## Update the specified FilterGroup in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/filterGroups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filter_group_id":"harum","value":"sed"}'

```

```javascript
const url = new URL(
    "http://localhost/api/filterGroups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "filter_group_id": "harum",
    "value": "sed"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 3,
        "name": "Скидки"
    }
}
```

### HTTP Request
`PUT api/filterGroups/{filterGroup}`

`PATCH api/filterGroups/{filterGroup}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | FilterGroup's Id to be Updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `filter_group_id` | numeric |  required  | Filter Group Id
        `value` | string |  required  | Value
    
<!-- END_4a49528297ece6a55a7fa00c5abee481 -->

<!-- START_758f44cfb324ce71488caef2f0815215 -->
## Remove the specified FilterGroup from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/filterGroups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/filterGroups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "FilterGroup Deleted"
}
```

### HTTP Request
`DELETE api/filterGroups/{filterGroup}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | FilterGroup's Id to be Deleted

<!-- END_758f44cfb324ce71488caef2f0815215 -->

#FilterValue management

APIs for managing filer values
<!-- START_d96de9f30d1796b25dc18a6450be51f8 -->
## Display a listing of the FilterValue.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/filterValues" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/filterValues"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 5,
            "value": "50%",
            "filter_group_id": 3
        },
        {
            "id": 5,
            "value": "50%",
            "filter_group_id": 3
        }
    ]
}
```

### HTTP Request
`GET api/filterValues`


<!-- END_d96de9f30d1796b25dc18a6450be51f8 -->

<!-- START_245f4b7b8e223f278e601c2311c54394 -->
## Store a newly created FilterValue in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/filterValues" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filter_group_id":"commodi","value":"nesciunt"}'

```

```javascript
const url = new URL(
    "http://localhost/api/filterValues"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "filter_group_id": "commodi",
    "value": "nesciunt"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 5,
        "value": "50%",
        "filter_group_id": 3
    }
}
```

### HTTP Request
`POST api/filterValues`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `filter_group_id` | numeric |  required  | Filter Group Id
        `value` | string |  required  | Value
    
<!-- END_245f4b7b8e223f278e601c2311c54394 -->

<!-- START_8403b43525242d8f253e5a5bd48e7793 -->
## Display the specified FilterValue.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/filterValues/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/filterValues/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 5,
        "value": "50%",
        "filter_group_id": 3
    }
}
```

### HTTP Request
`GET api/filterValues/{filterValue}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | FilterValue Id

<!-- END_8403b43525242d8f253e5a5bd48e7793 -->

<!-- START_a17524eb4f8df8428c075aa81c255b28 -->
## Update the specified FilterValue in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/filterValues/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"filter_group_id":"fugit","value":"voluptatum"}'

```

```javascript
const url = new URL(
    "http://localhost/api/filterValues/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "filter_group_id": "fugit",
    "value": "voluptatum"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 5,
        "value": "50%",
        "filter_group_id": 3
    }
}
```

### HTTP Request
`PUT api/filterValues/{filterValue}`

`PATCH api/filterValues/{filterValue}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | FilterValue's Id to be Updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `filter_group_id` | numeric |  required  | Filter Group Id
        `value` | string |  required  | Value
    
<!-- END_a17524eb4f8df8428c075aa81c255b28 -->

<!-- START_a66c4637179ad74b8b75a2c78a770145 -->
## Remove the specified FilterValue from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/filterValues/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/filterValues/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "FilterValue Deleted"
}
```

### HTTP Request
`DELETE api/filterValues/{filterValue}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | FilterValue's Id to be Deleted

<!-- END_a66c4637179ad74b8b75a2c78a770145 -->

#Order management

APIs for managing addresses
<!-- START_f9301c03a9281c0847565f96e6f723de -->
## Display a listing of the order.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/orders?page=8&per_page=3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/orders"
);

let params = {
    "page": "8",
    "per_page": "3",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "status": "0",
            "currency_id": 1,
            "address_id": 1,
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 1,
            "user_id": 1,
            "status": "0",
            "currency_id": 1,
            "address_id": 1,
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        }
    ]
}
```

### HTTP Request
`GET api/orders`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `page` |  required  | The page number. default = 1
    `per_page` |  required  | The number of items per list. default = 15

<!-- END_f9301c03a9281c0847565f96e6f723de -->

<!-- START_285c87403b6cfdebe26bc357f22e870f -->
## Store a newly created order in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"id","status":"nihil","currency_id":"harum","address_id":"voluptatem","products":[]}'

```

```javascript
const url = new URL(
    "http://localhost/api/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "id",
    "status": "nihil",
    "currency_id": "harum",
    "address_id": "voluptatem",
    "products": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "user_id": 1,
        "status": "0",
        "currency_id": 1,
        "address_id": 1,
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    }
}
```

### HTTP Request
`POST api/orders`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | numeric |  required  | User Id
        `status` | string |  required  | Status ,one of the 0,1,2
        `currency_id` | numeric |  required  | Currency Id
        `address_id` | numeric |  required  | Address Id
        `products` | array |  required  | Array of Products json objects with id,prices,pieces parameters
    
<!-- END_285c87403b6cfdebe26bc357f22e870f -->

<!-- START_7e6be1b9dd04564a7b1298dd260f3183 -->
## Display the specified order.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/orders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "user_id": 1,
        "status": "0",
        "currency_id": 1,
        "address_id": 1,
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/orders/{order}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Order Id

<!-- END_7e6be1b9dd04564a7b1298dd260f3183 -->

<!-- START_37f7b8cec13991c44b134bb2186e9d1e -->
## Update the specified order in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"quo","status":"non","currency_id":"aperiam","address_id":"molestias"}'

```

```javascript
const url = new URL(
    "http://localhost/api/orders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "quo",
    "status": "non",
    "currency_id": "aperiam",
    "address_id": "molestias"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "user_id": 1,
        "status": "0",
        "currency_id": 1,
        "address_id": 1,
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    }
}
```

### HTTP Request
`PUT api/orders/{order}`

`PATCH api/orders/{order}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Address's Id to be Updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | numeric |  required  | User Id
        `status` | string |  required  | Status ,one of the 0,1,2
        `currency_id` | numeric |  required  | Currency Id
        `address_id` | numeric |  required  | Address Id
    
<!-- END_37f7b8cec13991c44b134bb2186e9d1e -->

<!-- START_c280b55cf267ef09fc12c6b09ac78ede -->
## Remove the specified Order from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/orders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/orders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Order Deleted"
}
```

### HTTP Request
`DELETE api/orders/{order}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | Order's Id to be Deleted

<!-- END_c280b55cf267ef09fc12c6b09ac78ede -->

#ProductImage management

APIs for managing product images
<!-- START_10c520f201ad78363713cc43becd6b39 -->
## Display a listing of the ProductImage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/productImages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/productImages"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        [],
        []
    ]
}
```

### HTTP Request
`GET api/productImages`


<!-- END_10c520f201ad78363713cc43becd6b39 -->

<!-- START_48a86e1b2790445a69ef2c0617b057cf -->
## Store a newly created ProductImage in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/productImages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"product_id":"qui","image":"enim"}'

```

```javascript
const url = new URL(
    "http://localhost/api/productImages"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "product_id": "qui",
    "image": "enim"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "zip_code": "6666",
        "address": "Дом Ерсына",
        "full_name": "Зачем нам это поле?",
        "telephone_number": "87021234567",
        "note": "ывфывфывфывфыввфыв ыфввфывф фывфы",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "city": {
            "id": 1,
            "region_id": 1,
            "zip_code": "8359",
            "name": "Нур-Султан",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        }
    }
}
```

### HTTP Request
`POST api/productImages`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `product_id` | numeric |  required  | Product Id That This Image Belongs To
        `image` | image |  optional  | Image
    
<!-- END_48a86e1b2790445a69ef2c0617b057cf -->

<!-- START_3f85ad68a2b4461c53e608b36921688a -->
## Display the specified ProductImage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/productImages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/productImages/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": []
}
```

### HTTP Request
`GET api/productImages/{productImage}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Product Id

<!-- END_3f85ad68a2b4461c53e608b36921688a -->

<!-- START_1f57cae4f9c9962fe17b10bc0d8dc145 -->
## Update the specified ProductImage in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/productImages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"product_id":"nihil","image":"suscipit"}'

```

```javascript
const url = new URL(
    "http://localhost/api/productImages/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "product_id": "nihil",
    "image": "suscipit"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "zip_code": "6666",
        "address": "Дом Ерсына",
        "full_name": "Зачем нам это поле?",
        "telephone_number": "87021234567",
        "note": "ывфывфывфывфыввфыв ыфввфывф фывфы",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "city": {
            "id": 1,
            "region_id": 1,
            "zip_code": "8359",
            "name": "Нур-Султан",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        }
    }
}
```

### HTTP Request
`PUT api/productImages/{productImage}`

`PATCH api/productImages/{productImage}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Address's Id to be Updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `product_id` | numeric |  required  | Product Id That This Image Belongs To
        `image` | image |  optional  | Image
    
<!-- END_1f57cae4f9c9962fe17b10bc0d8dc145 -->

<!-- START_799de28a905eb8ffa67c06951919f392 -->
## Remove the specified ProductImage from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/productImages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/productImages/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "ProductImage Deleted"
}
```

### HTTP Request
`DELETE api/productImages/{productImage}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | Address's Id to be Deleted

<!-- END_799de28a905eb8ffa67c06951919f392 -->

#Product management

APis for managing products
<!-- START_86e0ac5d4f8ce9853bc22fd08f2a0109 -->
## Display a listing of the product.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/products?page=1&per_page=19" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/products"
);

let params = {
    "page": "1",
    "per_page": "19",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "status": "0",
            "name": "Ноутбук HP 2RR85EA ProBook",
            "alias": "HP-2RR85EA",
            "description": null,
            "content": null,
            "brand_id": 3,
            "price": 441590,
            "keywords": null,
            "is_hit": false,
            "image": "no_image.jpg",
            "pieces_left": 0,
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 1,
            "status": "0",
            "name": "Ноутбук HP 2RR85EA ProBook",
            "alias": "HP-2RR85EA",
            "description": null,
            "content": null,
            "brand_id": 3,
            "price": 441590,
            "keywords": null,
            "is_hit": false,
            "image": "no_image.jpg",
            "pieces_left": 0,
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        }
    ]
}
```

### HTTP Request
`GET api/products`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `page` |  required  | The page number. default = 1
    `per_page` |  required  | The number of items per list. default = 15

<!-- END_86e0ac5d4f8ce9853bc22fd08f2a0109 -->

<!-- START_05b4383f00fd57c4828a831e7057e920 -->
## Store a newly created product in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"enim","alias":"sint","description":"dolor","content":"id","brand_id":"accusantium","price":"sed","keywords":"deleniti","image":"hic","pieces_left":"nostrum"}'

```

```javascript
const url = new URL(
    "http://localhost/api/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "enim",
    "alias": "sint",
    "description": "dolor",
    "content": "id",
    "brand_id": "accusantium",
    "price": "sed",
    "keywords": "deleniti",
    "image": "hic",
    "pieces_left": "nostrum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "status": "0",
        "name": "Ноутбук HP 2RR85EA ProBook",
        "alias": "HP-2RR85EA",
        "description": null,
        "content": null,
        "brand_id": 3,
        "price": 441590,
        "keywords": null,
        "is_hit": false,
        "image": "no_image.jpg",
        "pieces_left": 0,
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    }
}
```

### HTTP Request
`POST api/products`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Product Name
        `alias` | string |  required  | Product Alias
        `description` | string |  optional  | Description
        `content` | string |  optional  | Content of Product page
        `brand_id` | numeric |  required  | Brand Id
        `price` | numeric |  required  | Product Price
        `keywords` | string |  optional  | Product keywords
        `image` | image |  required  | Product Image
        `pieces_left` | numeric |  required  | Left pieces of Product
    
<!-- END_05b4383f00fd57c4828a831e7057e920 -->

<!-- START_a285e63bc2d1a5b9428ae9aed745c779 -->
## Display the specified product.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/products/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "status": "0",
        "name": "Ноутбук HP 2RR85EA ProBook",
        "alias": "HP-2RR85EA",
        "description": null,
        "content": null,
        "brand_id": 3,
        "price": 441590,
        "keywords": null,
        "is_hit": false,
        "image": "no_image.jpg",
        "pieces_left": 0,
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/products/{product}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Product Id

<!-- END_a285e63bc2d1a5b9428ae9aed745c779 -->

<!-- START_b7842ce7893c09eb3c53713f82c2e12d -->
## Update the specified product in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"et","alias":"tenetur","description":"illum","content":"non","brand_id":"dolore","price":"animi","keywords":"voluptatem","image":"voluptas","pieces_left":"et"}'

```

```javascript
const url = new URL(
    "http://localhost/api/products/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "et",
    "alias": "tenetur",
    "description": "illum",
    "content": "non",
    "brand_id": "dolore",
    "price": "animi",
    "keywords": "voluptatem",
    "image": "voluptas",
    "pieces_left": "et"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "status": "0",
        "name": "Ноутбук HP 2RR85EA ProBook",
        "alias": "HP-2RR85EA",
        "description": null,
        "content": null,
        "brand_id": 3,
        "price": 441590,
        "keywords": null,
        "is_hit": false,
        "image": "no_image.jpg",
        "pieces_left": 0,
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    }
}
```

### HTTP Request
`PUT api/products/{product}`

`PATCH api/products/{product}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | Product Name
        `alias` | string |  optional  | Product Alias
        `description` | string |  optional  | Description
        `content` | string |  optional  | Content of Product page
        `brand_id` | numeric |  optional  | Brand Id
        `price` | numeric |  optional  | Product Price
        `keywords` | string |  optional  | Product keywords
        `image` | image |  optional  | Product Image
        `pieces_left` | numeric |  optional  | Left pieces of Product
    
<!-- END_b7842ce7893c09eb3c53713f82c2e12d -->

<!-- START_1d809ca5e8b10fa7fdc75d04506a55ea -->
## Remove the specified product from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/products/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Product Deleted"
}
```

### HTTP Request
`DELETE api/products/{product}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Product Id

<!-- END_1d809ca5e8b10fa7fdc75d04506a55ea -->

#Region management

APIs for managing regions
<!-- START_d3a06985ef377a31eecb832106f4a5e6 -->
## Display a listing of the resource.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/regions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/regions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Акмолинская область",
            "deleted_at": null
        },
        {
            "id": 1,
            "name": "Акмолинская область",
            "deleted_at": null
        }
    ]
}
```

### HTTP Request
`GET api/regions`


<!-- END_d3a06985ef377a31eecb832106f4a5e6 -->

<!-- START_cd5946798b0d62ceae6a8f51f12d8234 -->
## Store a newly created region in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/regions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"eaque"}'

```

```javascript
const url = new URL(
    "http://localhost/api/regions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "eaque"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "Акмолинская область",
        "deleted_at": null
    }
}
```

### HTTP Request
`POST api/regions`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | required |  optional  | Name
    
<!-- END_cd5946798b0d62ceae6a8f51f12d8234 -->

<!-- START_85a05f083d203a82298e77c4b7074d28 -->
## Display the specified region.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/regions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/regions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "Акмолинская область",
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/regions/{region}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | region Id

<!-- END_85a05f083d203a82298e77c4b7074d28 -->

<!-- START_9619be130c210af5a3616a112d8ca186 -->
## Update the specified Region in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/regions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"laudantium"}'

```

```javascript
const url = new URL(
    "http://localhost/api/regions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "laudantium"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "Акмолинская область",
        "deleted_at": null
    }
}
```

### HTTP Request
`PUT api/regions/{region}`

`PATCH api/regions/{region}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Region's Id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | required |  optional  | Name
    
<!-- END_9619be130c210af5a3616a112d8ca186 -->

<!-- START_a60a16eb441242ed47324c1a7e6cee55 -->
## Remove the specified region from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/regions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/regions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Region Deleted"
}
```

### HTTP Request
`DELETE api/regions/{region}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Region's Id To Be Deleted

<!-- END_a60a16eb441242ed47324c1a7e6cee55 -->

#Role management

APIs for managing roles
<!-- START_6470e6b987921f5c45bf7a2d8e674f57 -->
## Display a listing of the role.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "name": "admin"
        },
        {
            "name": "admin"
        }
    ]
}
```

### HTTP Request
`GET api/roles`


<!-- END_6470e6b987921f5c45bf7a2d8e674f57 -->

<!-- START_90c780acaefab9740431579512d07101 -->
## Store a newly created role in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"at"}'

```

```javascript
const url = new URL(
    "http://localhost/api/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "at"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "name": "admin"
    }
}
```

### HTTP Request
`POST api/roles`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Name
    
<!-- END_90c780acaefab9740431579512d07101 -->

<!-- START_eb37fe1fa9305b4b78850dd87031670b -->
## Display the specified role.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "name": "admin"
    }
}
```

### HTTP Request
`GET api/roles/{role}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Role Id

<!-- END_eb37fe1fa9305b4b78850dd87031670b -->

<!-- START_cccebfff0074c9c5f499e215eee84e86 -->
## Update the specified role in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"aut"}'

```

```javascript
const url = new URL(
    "http://localhost/api/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "aut"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "name": "admin"
    }
}
```

### HTTP Request
`PUT api/roles/{role}`

`PATCH api/roles/{role}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Role Id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | Name
    
<!-- END_cccebfff0074c9c5f499e215eee84e86 -->

<!-- START_9aab750214722ffceebef64f24a2e175 -->
## Remove the specified role from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "User Deleted"
}
```

### HTTP Request
`DELETE api/roles/{role}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `integer` |  optional  | Role Id

<!-- END_9aab750214722ffceebef64f24a2e175 -->

#User management

APIs for managing users
<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## Display a listing of the users.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users?page=13&per_page=9" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let params = {
    "page": "13",
    "per_page": "9",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "name": "Donnie Gleason",
            "email": "kconroy@example.net",
            "email_verified_at": "2020-04-13T16:47:31.000000Z"
        },
        {
            "name": "Dr. Tevin McLaughlin I",
            "email": "genesis.parisian@example.org",
            "email_verified_at": "2020-04-13T16:47:31.000000Z"
        }
    ]
}
```

### HTTP Request
`GET api/users`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `page` |  required  | The page number. default = 1
    `per_page` |  required  | The number of items per list. default = 15

<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## Store a newly created user in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"ut","email":"totam","password":"vel"}'

```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ut",
    "email": "totam",
    "password": "vel"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "name": "Helmer Hirthe Sr.",
        "email": "bernier.dell@example.org",
        "email_verified_at": "2020-04-13T16:47:31.000000Z"
    }
}
```

### HTTP Request
`POST api/users`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | User Name
        `email` | string |  required  | User Email
        `password` | string |  required  | User Password
    
<!-- END_12e37982cc5398c7100e59625ebb5514 -->

<!-- START_8653614346cb0e3d444d164579a0a0a2 -->
## Display the specified user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "name": "Jay Jacobi V",
        "email": "bpaucek@example.com",
        "email_verified_at": "2020-04-13T16:47:31.000000Z"
    }
}
```

### HTTP Request
`GET api/users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | User Id

<!-- END_8653614346cb0e3d444d164579a0a0a2 -->

<!-- START_48a3115be98493a3c866eb0e23347262 -->
## Update the specified user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"iusto","password":"dignissimos"}'

```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "iusto",
    "password": "dignissimos"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "name": "Kobe Keebler",
        "email": "orohan@example.net",
        "email_verified_at": "2020-04-13T16:47:31.000000Z"
    }
}
```

### HTTP Request
`PUT api/users/{user}`

`PATCH api/users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | User's Id to be Updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | User Name
        `password` | string |  optional  | User Password
    
<!-- END_48a3115be98493a3c866eb0e23347262 -->

<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## Remove the specified user from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "User Deleted"
}
```

### HTTP Request
`DELETE api/users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | User's Id to be Deleted

<!-- END_d2db7a9fe3abd141d5adbc367a88e969 -->


