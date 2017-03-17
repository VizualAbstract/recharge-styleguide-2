# views.py

from flask import Flask
from flask import render_template, render_template_string, make_response, escape
from jinja2 import Environment, Undefined
from helpers import *
from styleguide import app

@app.route('/')
def index():
    template_file = "index.html"
    return render_template(template_file)

# Buttons
@app.route('/buttons')
def buttons():
    template_file = "buttons.html"
    return render_template(template_file)

# Forms
@app.route('/text-inputs')
def text_inputs():
    template_file = "text-inputs.html"
    return render_template(template_file)

@app.route('/textareas')
def textareas():
    template_file = "textareas.html"
    return render_template(template_file)

@app.route('/checkboxes')
def checkboxes():
    template_file = "checkboxes.html"
    return render_template(template_file)

@app.route('/radios')
def radios():
    template_file = "radios.html"
    return render_template(template_file)

# Headers
@app.route('/headers')
def headers():
    template_file = "headers.html"
    return render_template(template_file)

# Headers
@app.route('/breadcrumbs')
def breadcrumbs():
    template_file = "breadcrumbs.html"
    return render_template(template_file)

# Dynamics
@app.route('/dropdowns')
def dropdowns():
    template_file = "dropdowns.html"
    return render_template(template_file)

# Layouts
@app.route('/grid-system')
@app.route('/grid-layouts')
@app.route('/grids')
def grid_systems():
    template_file = "grid-systems.html"
    return render_template(template_file)

# Layouts
@app.route('/sidebars')
def sidebars():
    template_file = "sidebars.html"
    return render_template(template_file)

# Layouts
@app.route('/navbars')
def navbars():
    template_file = "navbars.html"
    return render_template(template_file)

# Layouts
@app.route('/tables')
def tables():
    template_file = "tables.html"
    return render_template(template_file)