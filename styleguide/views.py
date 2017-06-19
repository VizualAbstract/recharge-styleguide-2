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

@app.route('/map')
def map():
    template_file = "map.html"
    return render_template(template_file)

# Buttons
@app.route('/buttons')
def buttons():
    template_file = "buttons.html"
    return render_template(template_file)

# Forms
@app.route('/form-actions')
def form_actions():
    template_file = "form-actions.html"
    return render_template(template_file)

@app.route('/form-addons')
def form_addons():
    template_file = "form-addons.html"
    return render_template(template_file)

@app.route('/form-help')
def form_help():
    template_file = "form-help.html"
    return render_template(template_file)

@app.route('/contextual-inputs')
def contextual_inputs():
    template_file = "contextual-inputs.html"
    return render_template(template_file)

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

@app.route('/numbers')
def numbers():
    template_file = "numbers.html"
    return render_template(template_file)

@app.route('/colors')
def colors():
    template_file = "colors.html"
    return render_template(template_file)

@app.route('/dates')
def dates():
    template_file = "dates.html"
    return render_template(template_file)

# Headers
@app.route('/headers')
def headers():
    template_file = "headers.html"
    return render_template(template_file)

# Dynamic
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

@app.route('/switches')
def switches():
    template_file = "switches.html"
    return render_template(template_file)

@app.route('/banners')
def banners():
    template_file = "banners.html"
    return render_template(template_file)

# Layouts
@app.route('/grid-system')
@app.route('/grid-layouts')
@app.route('/grids')
def grid_systems():
    template_file = "grid-systems.html"
    return render_template(template_file)

@app.route('/tabs')
def tabs():
    template_file = "tabs.html"
    return render_template(template_file)

# Navigation
@app.route('/breadcrumbs')
def breadcrumbs():
    template_file = "breadcrumbs.html"
    return render_template(template_file)

@app.route('/sidebars')
def sidebars():
    template_file = "sidebars.html"
    return render_template(template_file)

@app.route('/navbars')
def navbars():
    template_file = "navbars.html"
    return render_template(template_file)

@app.route('/progress')
def progress():
    template_file = "progress.html"
    return render_template(template_file)

@app.route('/continue')
def continue_():
    template_file = "continue.html"
    return render_template(template_file)

# Layouts
@app.route('/tables')
def tables():
    template_file = "tables.html"
    return render_template(template_file)

# Components
@app.route('/cards')
def cards():
    template_file = "cards.html"
    return render_template(template_file)

@app.route('/select-filter')
def selectFilter():
    template_file = "select-filter.html"
    return render_template(template_file)

@app.route('/stats')
def stats():
    template_file = "stats.html"
    return render_template(template_file)

@app.route('/flags')
def flags():
    template_file = "flags.html"
    return render_template(template_file)

# Utilities
@app.route('/admin-class')
def admin_class():
    template_file = "admin-class.html"
    return render_template(template_file)

@app.route('/generate-assets')
def generate_assets():
    sassutils.builder.Manifest('static/sass').build_one('styleguide', 'fontawesome.scss')
    sassutils.builder.Manifest('static/sass').build_one('styleguide', 'main.scss')
    sassutils.builder.Manifest('static/sass').build_one('styleguide', 'admin.scss')
    sassutils.builder.Manifest('static/sass').build_one('styleguide', 'styleguide.scss')
    compile_js()
    rename_css()
    template_file = "generate-assets.html"
    return render_template(template_file)

def rename_css():
    with open("styleguide/static/sass/styleguide/static/sass/main.scss.css", "rt") as fin:
        with open("styleguide/static/export/main.css", "wt") as fout:
            for line in fin:
                fout.write(line.replace('/*# sourceMappingURL=../css/main.scss.css.map */', ''))

    with open("styleguide/static/sass/styleguide/static/sass/admin.scss.css", "rt") as fin:
        with open("styleguide/static/export/admin.css", "wt") as fout:
            for line in fin:
                fout.write(line.replace('/*# sourceMappingURL=../css/admin.scss.css.map */', ''))

    with open("styleguide/static/sass/styleguide/static/sass/fontawesome.scss.css", "rt") as fin:
        with open("styleguide/static/export/fontawesome.css", "wt") as fout:
            for line in fin:
                fout.write(line.replace('/*# sourceMappingURL=../css/fontawesome.scss.css.map */', ''))

    with open("styleguide/static/sass/styleguide/static/sass/styleguide.scss.css", "rt") as fin:
        with open("styleguide/static/export/styleguide.css", "wt") as fout:
            for line in fin:
                fout.write(line.replace('/*# sourceMappingURL=../css/styleguide.scss.css.map */', ''))

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
        "styleguide/static/js/notifications-stiky.js",
        "styleguide/static/js/selects.js",
        "styleguide/static/js/select-filter.js",
    ]
    final_script = ''
    for script_name in toLoad:
        with open(script_name, 'r') as f:
            final_script += ('\n' + f.read())

    with open('styleguide/static/export/main.js', 'w') as f:
        f.write(final_script)


    toLoad = [
        "styleguide/static/js/colorpicker.js",
    ]
    final_script = ''
    for script_name in toLoad:
        with open(script_name, 'r') as f:
            final_script += ('\n' + f.read())

    with open('styleguide/static/export/colors.js', 'w') as f:
        f.write(final_script)


    toLoad = [
        "styleguide/static/js/moment.js",
        "styleguide/static/js/pikaday.js",
    ]
    final_script = ''
    for script_name in toLoad:
        with open(script_name, 'r') as f:
            final_script += ('\n' + f.read())

    with open('styleguide/static/export/dates.js', 'w') as f:
        f.write(final_script)

app.jinja_env.globals.update(compile_js = compile_js)