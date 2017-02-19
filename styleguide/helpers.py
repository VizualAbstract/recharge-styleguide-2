# app/helpers.py

from flask import Flask
from flask import render_template, render_template_string, make_response, escape

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

def validate_color(color):
    if color in list_swatch_defaults:
        return True
    elif color in list_swatch_colors:
        return True
    elif color in list_swatch_shades:
        return True
    elif color in list_swatch_keywords:
        return True
    else:
        return False

def validate_styles(style):
    if style in list_styles:
        return True
    else:
        return False

def validate_sizes(size):
    if size in list_sizes:
        return True
    else:
        return False

def ui_element(component, parameters = {}):
    ui_template = str(component) + ".html"

    if type(parameters) == dict:
        # Create a tooltip if requested
        try:
            parameter['tooltip'] = render_template("dynamic/tooltip.html", parameters = parameters['tooltip'])
        except:
            parameter['tooltip'] = ''
    if str(component)  == 'buttons/button':
        try:
            color = validate_colors(parameters['color'])
            parameter['color'] = " button--" + str(color)
    except:
        return False
app.jinja_env.globals.update(ui_element = ui_element)

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