#!/bin/bash
pwd=$(dirname $(realpath $0))
$pwd/bin/console doctrine:database:drop --force
$pwd/bin/console doctrine:database:create
$pwd/bin/console doctrine:schema:create
$pwd/bin/console h:d:f:l
