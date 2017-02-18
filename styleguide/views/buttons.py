# app/views/buttons.py

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

# Functions
def build_button(properties):
    # Button text
    template_file = "components/buttons.html"

    if type(properties) != dict:
        text = properties
        html = render_template(template_file,
            text = text)
    else:
        text = properties['text']

        # Attribute: Type
        try:
            attr_type = ' type="' + properties['type'] + '"'
        except:
            attr_type = ''
        # Attribute: Id
        try:
            attr_id = ' id="' + properties['id'] + '"'
        except:
            attr_id = ''
        # Attribute: Css
        if properties.get('css') and type(properties.get('css')) == dict:  
            try:
                css = ""
                for property, value in properties['css'].items():
                    css += property + ": " + value + "; "
                attr_style = ' style="' + css.strip() + '"'
            except:
                attr_style = ''
        else:
            try:
                attr_style = ' style="' + properties['css'] + '"'
            except:
                attr_style = ''
        # Attribute: Class
        try:
            attr_class = properties['class'] + ' '
        except:
            attr_class = ''

        # Class: Style
        if properties.get('style') and validate_styles(properties['style']):
            class_style = ' button--' + properties['style']
        else:
            class_style = ''
        # Class: Size
        if properties.get('size') and validate_sizes(properties['size']):
            class_size = ' button--' + properties['size']
        else:
            class_size = ''
        # Class: Color
        if properties.get('color') and validate_color(properties['color']):
            class_color = ' button--' + properties['color']
        else:
            class_color = ''

        # Data variables
        try:
            data_target = ' data-target="' + properties['target'] + '"'
        except:
            data_target = ''

        # Font awesome icon
        try:
            text_icon = ' <span class="fa fa-' + properties['icon'] + '"></span>'
        except:
            text_icon = ''

        html = render_template(template_file,
            text = text,

            attr_type = attr_type,
            attr_id = attr_id,
            attr_style = attr_style,
            attr_class = attr_class,

            class_style = class_style,
            class_size = class_size,
            class_color = class_color,

            data_target = data_target,

            text_icon = text_icon,
        )

    response = html
    return response
app.jinja_env.globals.update(build_button = build_button)

def render_button(properties = []):
    if not properties:
        return False
        properties = {
            'text': "Visit me",

            'type': "submit",
            'id': "form__submit",
            'css': [{
                    'color': "#F00",
                    'left': "0%",
                }],
            'class': "target__test target__save save-action",

            'color': "primary",
            'style': "block",
            'size': "large",

            'target': "header",
            'icon': "external-link",
        }
    response = build_button(properties)
    return response
app.jinja_env.globals.update(render_button = render_button)