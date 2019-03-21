#!/bin/sh

if [ "$1" = "travis" ]; then
    psql -U postgres -c "CREATE DATABASE miproyecto_test;"
    psql -U postgres -c "CREATE USER miproyecto PASSWORD 'miproyecto' SUPERUSER;"
else
    sudo -u postgres dropdb --if-exists miproyecto
    sudo -u postgres dropdb --if-exists miproyecto_test
    sudo -u postgres dropuser --if-exists miproyecto
    sudo -u postgres psql -c "CREATE USER miproyecto PASSWORD 'miproyecto' SUPERUSER;"
    sudo -u postgres createdb -O miproyecto miproyecto
    sudo -u postgres psql -d miproyecto -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    sudo -u postgres createdb -O miproyecto miproyecto_test
    sudo -u postgres psql -d miproyecto_test -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    LINE="localhost:5432:*:miproyecto:miproyecto"
    FILE=~/.pgpass
    if [ ! -f $FILE ]; then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE; then
        echo "$LINE" >> $FILE
    fi
fi
