# app/helpers.py

from flask import Flask
from flask import render_template, render_template_string, make_response, escape, request
from styleguide import app
import random, string

# Global variables
site_name = "website"

list_swatch_defaults = ["black", "white"]
list_swatch_colors = ["cyan", "blue", "green", "aquamarine", "mint", "yellow", "orange", "red", "magenta", "pink"]
list_swatch_shades = ["gray-darker", "gray-dark", "gray", "gray-light", "gray-lighter"]
list_swatch_keywords = ["default", "primary", "secondary", "success", "info", "warning", "danger", "disabled"]

list_styles = ["block", "link", "inline"]
list_sizes = ["default", "normal", "large", "medium", "small"]

# Functions
def build_title(page_title):
    page_title = page_title.replace(" ", "")
    capitalize_title = page_title.capitalize()
    return capitalize_title + " | " + site_name
app.jinja_env.globals.update(build_title = build_title)

def validate_colors(color):
    if color in list_swatch_defaults:
        return color
    elif color in list_swatch_colors:
        return color
    elif color in list_swatch_shades:
        return color
    elif color in list_swatch_keywords:
        return color
    else:
        return False
app.jinja_env.globals.update(validate_colors = validate_colors)

def validate_styles(style):
    if style in list_styles:
        return style
    else:
        return False
app.jinja_env.globals.update(validate_styles = validate_styles)

def validate_sizes(size):
    if size in list_sizes:
        return size
    else:
        return False
app.jinja_env.globals.update(validate_sizes = validate_sizes)

def ui_element(component, parameters = {}):
    ui_template = str(component) + ".html"

    if type(parameters) == dict:
        # Create a tooltip if requested
        try:
            parameters['tooltip'] = render_template("dynamic/tooltip.html", parameters = parameters['tooltip'])
        except:
            parameters['tooltip'] = ''

    if str(component) == 'form/label':
        try:
            parameters['id'] = str(parameters['for'])
        except:
            parameters['id'] = ''

    if str(component) in ['form/checkbox', 'form/field_checkbox']:
        if 'id' not in parameters:
            # An id attribute is required for a checkbox. If none is provided, generate a random one
            parameters['id'] = ''.join([random.choice(string.lowercase) for i in xrange(10)])

    if str(component) in ['buttons/button', 'buttons/links']:
        try:
            color = validate_colors(parameters['color'])
            parameters['color'] = " button--" + str(color)
        except:
            parameters['color'] = ''
        try:
            style = validate_styles(parameters['style'])
            parameters['style'] = " button--" + str(style)
        except:
            parameters['style'] = ''
        try:
            size = validate_sizes(parameters['size'])
            parameters['size'] = " button--" + str(size)
        except:
            parameters['size'] = ''

    return render_template(ui_template, parameters = parameters)
app.jinja_env.globals.update(ui_element = ui_element)

# ReCharge Functions
def is_recharge_admin():
    is_recharge_admin = True # is_recharge_admin = 'true' if request.cookies.get('admin') == "bootstrap" else None
    return is_recharge_admin

app.jinja_env.globals.update(is_recharge_admin = is_recharge_admin)

# Custom Filters
@app.template_filter('site_title')
def site_title(page_title):
    if page_title != "":
        try:
            trimmed_title = page_title.replace(" ", "")
            capitalize_title = page_title.capitalize()
            return capitalize_title + " | " + site_name
        except:
            return site_name
    else:
        return site_name