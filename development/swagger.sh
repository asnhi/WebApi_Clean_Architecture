#!/bin/bash

mkdir ../public/swagger
php ../vendor/bin/openapi --bootstrap ./swagger-constants.php --output ../public/swagger ./swagger-v1.php ../app/Application/Controllers
