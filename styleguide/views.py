# views.py

from flask import Flask, redirect, url_for
from flask import render_template, render_template_string, make_response, escape
from jinja2 import Environment, Undefined
from sassutils.wsgi import SassMiddleware
from sassutils.builder import *
import sassutils
from styleguide import app
from helpers import *
import shutil

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
@app.route('/inputs')
def inputs():
    template_file = "inputs.html"
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

@app.route('/selects')
def selects():
    template_file = "selects.html"
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

@app.route('/modals')
def modals():
    template_file = "modals.html"
    return render_template(template_file)

@app.route('/tooltips')
def tooltips():
    template_file = "tooltips.html"
    return render_template(template_file)

@app.route('/notifications')
def notifications():
    template_file = "notifications.html"
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

@app.route('/generate-assets')
def generate_assets():
    sassutils.builder.Manifest('static/sass').build_one('styleguide', 'main.scss')
    compile_js()
    rename_css()
    template_file = "generate-assets.html"
    return render_template(template_file)

def rename_css():
    with open("styleguide/static/sass/styleguide/static/sass/main.scss.css", "rt") as fin:
        with open("styleguide/static/export/main.css", "wt") as fout:
            for line in fin:
                fout.write(line.replace('/*# sourceMappingURL=../css/main.scss.css.map */', ''))
    shutil.rmtree("styleguide/static/sass/styleguide")
app.jinja_env.globals.update(rename_css = rename_css)

def compile_js():
    toLoad = [
        "styleguide/static/js/tether.js",
        "styleguide/static/js/util.js",
        "styleguide/static/js/button.js",
        "styleguide/static/js/collapse.js",
        "styleguide/static/js/dropdown.js",
        "styleguide/static/js/modal.js",
        "styleguide/static/js/tooltip.js",
        "styleguide/static/js/popover.js",
        "styleguide/static/js/notifications.js",
        "styleguide/static/js/selects.js",
    ]

    final_script = ''
    for script_name in toLoad:
        with open(script_name, 'r') as f:
            final_script += ('\n' + f.read())

    with open('styleguide/static/export/main.js', 'w') as f:
        f.write(final_script)
app.jinja_env.globals.update(compile_js = compile_js)