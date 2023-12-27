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