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
    -d '{"name":"ipsam","email":"dolorum"}'

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
    "name": "ipsam",
    "email": "dolorum"
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
    -d '{"name":"est","email":"perferendis","password":"saepe"}'

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
    "name": "est",
    "email": "perferendis",
    "password": "saepe"
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

#Product management

APis for managing products
<!-- START_86e0ac5d4f8ce9853bc22fd08f2a0109 -->
## Display a listing of the product.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/products?page=9&per_page=17" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/products"
);

let params = {
    "page": "9",
    "per_page": "17",
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
    -d '{"name":"consectetur","alias":"praesentium","description":"id","content":"consectetur","brand_id":"saepe","price":"quos","keywords":"sunt","image":"quisquam","pieces_left":"fugit"}'

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
    "name": "consectetur",
    "alias": "praesentium",
    "description": "id",
    "content": "consectetur",
    "brand_id": "saepe",
    "price": "quos",
    "keywords": "sunt",
    "image": "quisquam",
    "pieces_left": "fugit"
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
    -d '{"name":"voluptates","alias":"nihil","description":"sint","content":"rem","brand_id":"est","price":"consequatur","keywords":"veritatis","image":"quae","pieces_left":"iure"}'

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
    "name": "voluptates",
    "alias": "nihil",
    "description": "sint",
    "content": "rem",
    "brand_id": "est",
    "price": "consequatur",
    "keywords": "veritatis",
    "image": "quae",
    "pieces_left": "iure"
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

#Role management

APIs for managing roles
<!-- START_6470e6b987921f5c45bf7a2d8e674f57 -->
## Display a listing of the role.

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
            "name": "moderator"
        },
        {
            "name": "user"
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
    -d '{"name":"itaque"}'

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
    "name": "itaque"
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
    "name": "admin"
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
    -d '{"name":"dicta"}'

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
    "name": "dicta"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
## Display a listing of the Users.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users?page=2&per_page=2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let params = {
    "page": "2",
    "per_page": "2",
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
            "name": "Maymie Simonis",
            "email": "gorczany.gay@example.org",
            "email_verified_at": "2020-04-12T18:31:05.000000Z"
        },
        {
            "name": "Coby Monahan",
            "email": "efren.wehner@example.net",
            "email_verified_at": "2020-04-12T18:31:05.000000Z"
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
## Store a newly created User in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"consequatur","email":"eos","password":"est"}'

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
    "name": "consequatur",
    "email": "eos",
    "password": "est"
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
        "name": "Prof. Eulalia Zemlak I",
        "email": "zschamberger@example.org",
        "email_verified_at": "2020-04-12T18:31:05.000000Z"
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
## Display the specified User

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
        "name": "Randi Rath",
        "email": "bria80@example.com",
        "email_verified_at": "2020-04-12T18:31:05.000000Z"
    }
}
```

### HTTP Request
`GET api/users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | User ID

<!-- END_8653614346cb0e3d444d164579a0a0a2 -->

<!-- START_48a3115be98493a3c866eb0e23347262 -->
## Update the specified User

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"ut","password":"ipsam"}'

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
    "name": "ut",
    "password": "ipsam"
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
        "name": "Kaitlyn Mueller",
        "email": "mia28@example.org",
        "email_verified_at": "2020-04-12T18:31:05.000000Z"
    }
}
```

### HTTP Request
`PUT api/users/{user}`

`PATCH api/users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | User's Id to be Updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | User Name
        `password` | string |  optional  | User Password
    
<!-- END_48a3115be98493a3c866eb0e23347262 -->

<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## Remove the specified User from storage.

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

#general


<!-- START_f62d434079dff3acd53aa774d160d2ad -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/addresses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/addresses"
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
    "current_page": 1,
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
            "id": 2,
            "zip_code": "6666",
            "address": "Дом Азамата",
            "full_name": "Зачем нам это поле?",
            "telephone_number": "87021234567",
            "note": "ывфывфывфывфыввфыв ыфввфывф фывфы",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "city": {
                "id": 2,
                "region_id": 1,
                "zip_code": "8360",
                "name": "Атбасар",
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        },
        {
            "id": 3,
            "zip_code": "6666",
            "address": "Дом Галымжана",
            "full_name": "Зачем нам это поле?",
            "telephone_number": "87021234567",
            "note": "ывфывфывфывфыввфыв ыфввфывф фывфы",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "city": {
                "id": 3,
                "region_id": 2,
                "zip_code": "8364",
                "name": "Акшимрау",
                "created_at": null,
                "updated_at": null,
                "deleted_at": null
            }
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/addresses?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/addresses?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/addresses",
    "per_page": 10,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}
```

### HTTP Request
`GET api/addresses`


<!-- END_f62d434079dff3acd53aa774d160d2ad -->

<!-- START_c8fad65a796e6206c26cb584c46221b7 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/addresses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/addresses"
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



### HTTP Request
`POST api/addresses`


<!-- END_c8fad65a796e6206c26cb584c46221b7 -->

<!-- START_25f4303d28e06d127578df97937cdb67 -->
## Display the specified resource.

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
```

### HTTP Request
`GET api/addresses/{address}`


<!-- END_25f4303d28e06d127578df97937cdb67 -->

<!-- START_8f97ba08be391bb75680a4b5a24c9f6d -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
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
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/addresses/{address}`

`PATCH api/addresses/{address}`


<!-- END_8f97ba08be391bb75680a4b5a24c9f6d -->

<!-- START_e5d3d7a19170fe1ef6901a6ddf8eaeae -->
## Remove the specified resource from storage.

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



### HTTP Request
`DELETE api/addresses/{address}`


<!-- END_e5d3d7a19170fe1ef6901a6ddf8eaeae -->

<!-- START_49314ee162f7e839596684af0fed40e9 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/brands" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/brands"
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
    "current_page": 1,
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
            "id": 2,
            "name": "Supreme",
            "alias": "Supreme",
            "description": "Supreme — американский стритвер-бренд одежды, основанный в Нью-Йорке в апреле 1994 года",
            "image": "no_image.jpg",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 3,
            "name": "hewlett packard",
            "alias": "HP",
            "description": "Hewlett-Packard — одна из крупнейших американских компаний в сфере информационных\r\n                технологий, существовавшая в период 1939—2015 годов",
            "image": "no_image.jpg",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/brands?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/brands?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/brands",
    "per_page": 10,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}
```

### HTTP Request
`GET api/brands`


<!-- END_49314ee162f7e839596684af0fed40e9 -->

<!-- START_745f1520c22769b1767899facf665d2b -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/brands" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/brands"
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



### HTTP Request
`POST api/brands`


<!-- END_745f1520c22769b1767899facf665d2b -->

<!-- START_d6817829cfe616a73d4ac4da93453508 -->
## Display the specified resource.

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
    "id": 1,
    "name": "louis vuitton",
    "alias": "LV",
    "description": "ОписаниеLouis Vuitton — французский дом моды,\r\n                специализирующийся на производстве чемоданов и сумок, модной одежды,\r\n                парфюмерии и аксессуаров класса «люкс» под одноимённой торговой маркой.",
    "image": "no_image.jpg",
    "created_at": null,
    "updated_at": null,
    "deleted_at": null
}
```

### HTTP Request
`GET api/brands/{brand}`


<!-- END_d6817829cfe616a73d4ac4da93453508 -->

<!-- START_042c9bfce86a99d5c778f8e02c29a5d7 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
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
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/brands/{brand}`

`PATCH api/brands/{brand}`


<!-- END_042c9bfce86a99d5c778f8e02c29a5d7 -->

<!-- START_6bc624c1de327f8a14d11df082f18630 -->
## Remove the specified resource from storage.

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



### HTTP Request
`DELETE api/brands/{brand}`


<!-- END_6bc624c1de327f8a14d11df082f18630 -->

<!-- START_109013899e0bc43247b0f00b67f889cf -->
## Display a listing of the resource.

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
            "id": 3,
            "name": "Одежда и обувь",
            "alias": "одежда",
            "parent_id": null,
            "keyword": "шмот",
            "description": null,
            "image": "no_image.jpg",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "categories": []
        }
    ]
}
```

### HTTP Request
`GET api/categories`


<!-- END_109013899e0bc43247b0f00b67f889cf -->

<!-- START_2335abbed7f782ea7d7dd6df9c738d74 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/categories" \
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
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/categories`


<!-- END_2335abbed7f782ea7d7dd6df9c738d74 -->

<!-- START_34925c1e31e7ecc53f8f52c8b1e91d44 -->
## Display the specified resource.

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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/categories/{category}`


<!-- END_34925c1e31e7ecc53f8f52c8b1e91d44 -->

<!-- START_549109b98c9f25ebff47fb4dc23423b6 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
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
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/categories/{category}`

`PATCH api/categories/{category}`


<!-- END_549109b98c9f25ebff47fb4dc23423b6 -->

<!-- START_7513823f87b59040507bd5ab26f9ceb5 -->
## Remove the specified resource from storage.

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



### HTTP Request
`DELETE api/categories/{category}`


<!-- END_7513823f87b59040507bd5ab26f9ceb5 -->

<!-- START_56d7be9447e2ce39ac69b09141bf5902 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/cities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/cities"
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
    "current_page": 1,
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
            "id": 2,
            "region_id": 1,
            "zip_code": "8360",
            "name": "Атбасар",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 3,
            "region_id": 2,
            "zip_code": "8364",
            "name": "Акшимрау",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 4,
            "region_id": 3,
            "zip_code": "8408",
            "name": "Алматы",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 5,
            "region_id": 4,
            "zip_code": "8427",
            "name": "Атырау",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        },
        {
            "id": 6,
            "region_id": 1,
            "zip_code": "123213",
            "name": "ala",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/cities?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/cities?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/cities",
    "per_page": 10,
    "prev_page_url": null,
    "to": 6,
    "total": 6
}
```

### HTTP Request
`GET api/cities`


<!-- END_56d7be9447e2ce39ac69b09141bf5902 -->

<!-- START_4d36a2828ff43205fcdf97b0cf6fdcfe -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/cities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/cities"
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



### HTTP Request
`POST api/cities`


<!-- END_4d36a2828ff43205fcdf97b0cf6fdcfe -->

<!-- START_0651fff87b81a4d1e8d166065f7676f0 -->
## Display the specified resource.

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
    "id": 1,
    "region_id": 1,
    "zip_code": "8359",
    "name": "Нур-Султан",
    "created_at": null,
    "updated_at": null,
    "deleted_at": null
}
```

### HTTP Request
`GET api/cities/{city}`


<!-- END_0651fff87b81a4d1e8d166065f7676f0 -->

<!-- START_876156d0dfb9d96d9a806f37cfa97680 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
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
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/cities/{city}`

`PATCH api/cities/{city}`


<!-- END_876156d0dfb9d96d9a806f37cfa97680 -->

<!-- START_ca7712807e8d39d79e5efc44555cb8b5 -->
## Remove the specified resource from storage.

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



### HTTP Request
`DELETE api/cities/{city}`


<!-- END_ca7712807e8d39d79e5efc44555cb8b5 -->

<!-- START_aa2087c88a0544b7da514dfdd673acc0 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/currencies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/currencies"
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
    "current_page": 1,
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
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/currencies?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/currencies?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/currencies",
    "per_page": 10,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### HTTP Request
`GET api/currencies`


<!-- END_aa2087c88a0544b7da514dfdd673acc0 -->

<!-- START_3a3de8519134b961245b00843c83314c -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/currencies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/currencies"
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



### HTTP Request
`POST api/currencies`


<!-- END_3a3de8519134b961245b00843c83314c -->

<!-- START_dbc92b87f08648e5fc649f6677876ac0 -->
## Display the specified resource.

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
```

### HTTP Request
`GET api/currencies/{currency}`


<!-- END_dbc92b87f08648e5fc649f6677876ac0 -->

<!-- START_c6971b0296ea1ec27eff9ccf57dd7cac -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
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
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/currencies/{currency}`

`PATCH api/currencies/{currency}`


<!-- END_c6971b0296ea1ec27eff9ccf57dd7cac -->

<!-- START_c2a506528fd96c1a820f64892ce7068f -->
## Remove the specified resource from storage.

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



### HTTP Request
`DELETE api/currencies/{currency}`


<!-- END_c2a506528fd96c1a820f64892ce7068f -->

<!-- START_ea79b130426ba62aa89eb615fe141273 -->
## Display a listing of the resource.

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
    "current_page": 1,
    "data": [
        {
            "id": 4,
            "name": "Доставка"
        },
        {
            "id": 3,
            "name": "Скидки"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/filterGroups?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/filterGroups?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/filterGroups",
    "per_page": 10,
    "prev_page_url": null,
    "to": 2,
    "total": 2
}
```

### HTTP Request
`GET api/filterGroups`


<!-- END_ea79b130426ba62aa89eb615fe141273 -->

<!-- START_ea85ef12613994737199a6fbbd82268a -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/filterGroups" \
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
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/filterGroups`


<!-- END_ea85ef12613994737199a6fbbd82268a -->

<!-- START_f09c97d504496781c57acab62d1f0af9 -->
## Display the specified resource.

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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\FilterGroup] 1"
}
```

### HTTP Request
`GET api/filterGroups/{filterGroup}`


<!-- END_f09c97d504496781c57acab62d1f0af9 -->

<!-- START_4a49528297ece6a55a7fa00c5abee481 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
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
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/filterGroups/{filterGroup}`

`PATCH api/filterGroups/{filterGroup}`


<!-- END_4a49528297ece6a55a7fa00c5abee481 -->

<!-- START_758f44cfb324ce71488caef2f0815215 -->
## Remove the specified resource from storage.

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



### HTTP Request
`DELETE api/filterGroups/{filterGroup}`


<!-- END_758f44cfb324ce71488caef2f0815215 -->

<!-- START_d96de9f30d1796b25dc18a6450be51f8 -->
## Display a listing of the resource.

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
    "current_page": 1,
    "data": [
        {
            "id": 5,
            "value": "50%",
            "filter_group_id": 3
        },
        {
            "id": 6,
            "value": "10%",
            "filter_group_id": 3
        },
        {
            "id": 7,
            "value": "Нет",
            "filter_group_id": 4
        },
        {
            "id": 8,
            "value": "Есть",
            "filter_group_id": 4
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/filterValues?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/filterValues?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/filterValues",
    "per_page": 10,
    "prev_page_url": null,
    "to": 4,
    "total": 4
}
```

### HTTP Request
`GET api/filterValues`


<!-- END_d96de9f30d1796b25dc18a6450be51f8 -->

<!-- START_245f4b7b8e223f278e601c2311c54394 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/filterValues" \
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
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/filterValues`


<!-- END_245f4b7b8e223f278e601c2311c54394 -->

<!-- START_8403b43525242d8f253e5a5bd48e7793 -->
## Display the specified resource.

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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\FilterValue] 1"
}
```

### HTTP Request
`GET api/filterValues/{filterValue}`


<!-- END_8403b43525242d8f253e5a5bd48e7793 -->

<!-- START_a17524eb4f8df8428c075aa81c255b28 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
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
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/filterValues/{filterValue}`

`PATCH api/filterValues/{filterValue}`


<!-- END_a17524eb4f8df8428c075aa81c255b28 -->

<!-- START_a66c4637179ad74b8b75a2c78a770145 -->
## Remove the specified resource from storage.

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



### HTTP Request
`DELETE api/filterValues/{filterValue}`


<!-- END_a66c4637179ad74b8b75a2c78a770145 -->

<!-- START_f9301c03a9281c0847565f96e6f723de -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/orders"
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
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "status": "0",
            "currency_id": 1,
            "address_id": 1,
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "user": {
                "id": 1,
                "name": "admin",
                "email": "admin@admin.com",
                "email_verified_at": "2020-04-12T11:55:50.000000Z",
                "created_at": null,
                "updated_at": null,
                "role": {
                    "name": "admin"
                }
            }
        },
        {
            "id": 2,
            "user_id": 1,
            "status": "0",
            "currency_id": 1,
            "address_id": 2,
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "user": {
                "id": 1,
                "name": "admin",
                "email": "admin@admin.com",
                "email_verified_at": "2020-04-12T11:55:50.000000Z",
                "created_at": null,
                "updated_at": null,
                "role": {
                    "name": "admin"
                }
            }
        },
        {
            "id": 3,
            "user_id": 1,
            "status": "0",
            "currency_id": 1,
            "address_id": 3,
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "user": {
                "id": 1,
                "name": "admin",
                "email": "admin@admin.com",
                "email_verified_at": "2020-04-12T11:55:50.000000Z",
                "created_at": null,
                "updated_at": null,
                "role": {
                    "name": "admin"
                }
            }
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/orders?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/orders?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/orders",
    "per_page": 10,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}
```

### HTTP Request
`GET api/orders`


<!-- END_f9301c03a9281c0847565f96e6f723de -->

<!-- START_285c87403b6cfdebe26bc357f22e870f -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/orders"
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



### HTTP Request
`POST api/orders`


<!-- END_285c87403b6cfdebe26bc357f22e870f -->

<!-- START_7e6be1b9dd04564a7b1298dd260f3183 -->
## Display the specified resource.

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
    "id": 1,
    "user_id": 1,
    "status": "0",
    "currency_id": 1,
    "address_id": 1,
    "created_at": null,
    "updated_at": null,
    "deleted_at": null,
    "products": [
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
            "deleted_at": null,
            "pivot": {
                "order_id": 1,
                "product_id": 1,
                "id": 1,
                "pieces": 1,
                "price": 441590
            }
        }
    ],
    "currency": {
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
    "user": {
        "id": 1,
        "name": "admin",
        "email": "admin@admin.com",
        "email_verified_at": "2020-04-12T11:55:50.000000Z",
        "created_at": null,
        "updated_at": null,
        "role": {
            "name": "admin"
        }
    },
    "address": {
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
`GET api/orders/{order}`


<!-- END_7e6be1b9dd04564a7b1298dd260f3183 -->

<!-- START_37f7b8cec13991c44b134bb2186e9d1e -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
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
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/orders/{order}`

`PATCH api/orders/{order}`


<!-- END_37f7b8cec13991c44b134bb2186e9d1e -->

<!-- START_c280b55cf267ef09fc12c6b09ac78ede -->
## Remove the specified resource from storage.

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



### HTTP Request
`DELETE api/orders/{order}`


<!-- END_c280b55cf267ef09fc12c6b09ac78ede -->

<!-- START_10c520f201ad78363713cc43becd6b39 -->
## Display a listing of the resource.

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
    "current_page": 1,
    "data": [],
    "first_page_url": "http:\/\/localhost\/api\/productImages?page=1",
    "from": null,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/productImages?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/productImages",
    "per_page": 10,
    "prev_page_url": null,
    "to": null,
    "total": 0
}
```

### HTTP Request
`GET api/productImages`


<!-- END_10c520f201ad78363713cc43becd6b39 -->

<!-- START_48a86e1b2790445a69ef2c0617b057cf -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/productImages" \
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
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/productImages`


<!-- END_48a86e1b2790445a69ef2c0617b057cf -->

<!-- START_3f85ad68a2b4461c53e608b36921688a -->
## Display the specified resource.

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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\ProductImage] 1"
}
```

### HTTP Request
`GET api/productImages/{productImage}`


<!-- END_3f85ad68a2b4461c53e608b36921688a -->

<!-- START_1f57cae4f9c9962fe17b10bc0d8dc145 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
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
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/productImages/{productImage}`

`PATCH api/productImages/{productImage}`


<!-- END_1f57cae4f9c9962fe17b10bc0d8dc145 -->

<!-- START_799de28a905eb8ffa67c06951919f392 -->
## Remove the specified resource from storage.

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



### HTTP Request
`DELETE api/productImages/{productImage}`


<!-- END_799de28a905eb8ffa67c06951919f392 -->

<!-- START_d3a06985ef377a31eecb832106f4a5e6 -->
## Display a listing of the resource.

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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/regions`


<!-- END_d3a06985ef377a31eecb832106f4a5e6 -->

<!-- START_cd5946798b0d62ceae6a8f51f12d8234 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/regions" \
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
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/regions`


<!-- END_cd5946798b0d62ceae6a8f51f12d8234 -->

<!-- START_85a05f083d203a82298e77c4b7074d28 -->
## Display the specified resource.

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
    "id": 1,
    "name": "Акмолинская область",
    "deleted_at": null
}
```

### HTTP Request
`GET api/regions/{region}`


<!-- END_85a05f083d203a82298e77c4b7074d28 -->

<!-- START_9619be130c210af5a3616a112d8ca186 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
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
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/regions/{region}`

`PATCH api/regions/{region}`


<!-- END_9619be130c210af5a3616a112d8ca186 -->

<!-- START_a60a16eb441242ed47324c1a7e6cee55 -->
## Remove the specified resource from storage.

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



### HTTP Request
`DELETE api/regions/{region}`


<!-- END_a60a16eb441242ed47324c1a7e6cee55 -->


