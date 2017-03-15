#!/bin/bash
pwd=$(dirname $(realpath $0))
$pwd/bin/console server:run 0.0.0.0:9999

