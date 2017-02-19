# app/helpers.py

from flask import Flask
from flask import render_template, render_template_string, make_response, escape
from styleguide import app

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

def validate_styles(style):
    if style in list_styles:
        return style
    else:
        return False

def validate_sizes(size):
    if size in list_sizes:
        return size
    else:
        return False

def ui_element(component, parameters = {}):
    ui_template = str(component) + ".html"

    if type(parameters) is dict:
        # Creat a tooltip if necessary
        try:
            parameters["tooltip"] = render_template("dynamic/tooltip.html", parameters = parameters["tooltip"])
        except:
            parameters["tooltip"] = ''
    if str(component) == 'buttons/button':
        try:
            color = validate_colors(parameters["color"])
            parameters["color"] = " button--" + str(color)
        except:
            pass
        try:
            style = validate_styles(parameters["style"])
            parameters["style"] = " button--" + str(style)
        except:
            pass
        try:
            size = validate_sizes(parameters["size"])
            parameters["size"] = " button--" + str(size)
        except:
            pass
    else:
        return False

    return render_template(ui_template, parameters = parameters)

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