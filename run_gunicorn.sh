#!/bin/sh
sudo service nginx stop
sudo service nginx start
sudo service myproject stop; sudo service myproject start

gunicorn -b 0.0.0.0:8000 --workers=5 --timeout=500000 wsgi:app