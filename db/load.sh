#!/bin/sh

BASE_DIR=$(dirname "$(readlink -f "$0")")
if [ "$1" != "test" ]; then
    psql -h localhost -U miproyecto -d miproyecto < $BASE_DIR/miproyecto.sql
fi
psql -h localhost -U miproyecto -d miproyecto_test < $BASE_DIR/miproyecto.sql
