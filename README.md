# ❓ Query

Query is a utility that helps you fetch data from the `GET` and `POST` super-globals or any given payload

---

## Work in Progress (WIP) — Do not use in production yet: ##

- It has not undergone extensive testing.
- Primarily intended for internal projects, subject to potential breaking changes without prior notice.
- There are likely many missing features.

---

TODO

## Example usage

```php
<?php
declare(strict_types=1);

use Kristos80\Query\Query;

require_once __DIR__ . "/../vendor/autoload.php";

# https://localhost:8080?name=chris
echo Query::get("name"); # chris

# curl -X POST -d 'name=chris' http://localhost:8080?name=chris
echo Query::post("name"); # chris

# curl -X POST -H "Content-Type: application/json" -d '{"name":"chris"}' http://localhost:8080
print_r(Query::payload()); # ["name" => "chris"]
echo Query::readFromPayload("name"); # chris
```
