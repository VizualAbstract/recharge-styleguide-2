#!/bin/sh

sudo service nginx restart 
sudo service myproject stop; sudo service myproject start

gunicorn -b 0.0.0.0:8000 --workers=5 --timeout=500000 wsgi:app