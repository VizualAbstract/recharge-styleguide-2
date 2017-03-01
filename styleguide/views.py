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

@app.route('/buttons')
def buttons():
    template_file = "buttons.html"
    return render_template(template_file)

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