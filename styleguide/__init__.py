# app/__init__.py

from flask import Flask
from flask import render_template, render_template_string, make_response, escape
from sassutils.wsgi import SassMiddleware
import sass
import sassutils

sass.OUTPUT_STYLES = {'nested': 1} # Replace value of nested with that of expanded, 0

# Initialize the app
app = Flask(__name__, instance_relative_config = True)
# libsass-python manifest
app.wsgi_app = SassMiddleware(app.wsgi_app, {
	'styleguide': ('static/sass', 'static/css', 'static/css')
});

# Load the config file
app.config.from_object('config')

# Load the views
from styleguide import views
