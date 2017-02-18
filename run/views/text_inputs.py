# app/views/text-inputs.py

from flask import Flask
from flask import render_template, render_template_string, make_response, escape
from jinja2 import Environment, Undefined
from helpers import *
from run import app

@app.route('/text-inputs')
def text_inputs():
    template_file = "text-inputs.html"
    return render_template(template_file)

def ui_element(component, parameters = {}):
    ui_template = str(component) + ".html"

    if type(parameters) is dict:
        # Creat a tooltip if necessary
        try:
            parameters["tooltip"] = render_template("dynamic/tooltip.html", parameters = parameters["tooltip"])
        except:
            parameters["tooltip"] = ''
    else:
        return False

    return render_template(ui_template, parameters = parameters)

app.jinja_env.globals.update(ui_element = ui_element)

# Functions
# def build_text_input(properties):
#     # Button text
#     # attr_type = "text|password|search|hidden|tel|url|number"
#     # attr_autocomplete = "on|off"
#     template_file = "components/text-inputs.html"

#     # Attribute: Type
#     try:
#         attr_type = properties['type']
#     except:
#         attr_type = 'text'
#     # Attribute: Id
#     try:
#         attr_id = properties['id']
#     except:
#         attr_id = ''
#     try:
#         attr_name = properties['name']
#     except:
#         attr_name = ''
#     try:
#         attr_value = properties['value']
#     except:
#         attr_value = ''
#     try:
#         attr_placeholder = properties['placeholder']
#     except:
#         attr_placeholder = ''
#     try:
#         attr_required = bool(properties['required'])
#     except:
#         attr_required = False
#     try:
#         attr_disabled = bool(properties['disabled'])
#     except:
#         attr_disabled = False
#     try:
#         attr_autocomplete = bool(properties['autocomplete'])
#     except:
#         attr_autocomplete = False
#     except:
#         wrapper = True
#     # Attribute: Class
#     try:
#         attr_class = properties['class'] + ' '
#     except:
#         attr_class = ''

#     # Attribute: Css
#     if properties.get('css') and type(properties.get('css')) == dict:  
#         try:
#             css = ""
#             for property, value in properties['css'].items():
#                 css += property + ": " + value + "; "
#             attr_style = ' style="' + css.strip() + '"'
#         except:
#             attr_style = ''
#     else:
#         try:
#             attr_style = ' style="' + properties['css'] + '"'
#         except:
#             attr_style = ''

#     html = render_template(template_file,
#         wrapper = wrapper,
#         label = label,
#         attr_type = attr_type,
#         attr_id = attr_id,
#         attr_name = attr_name,
#         attr_value = attr_value,
#         attr_placeholder = attr_placeholder,
#         attr_required = attr_required,
#         attr_disabled = attr_disabled,
#         attr_autocomplete = attr_autocomplete,
#         attr_class = attr_class,
#         attr_style = attr_style,
#     )

#     response = html
#     return response
# app.jinja_env.globals.update(build_text_input = build_text_input)

def render_text_input(properties = []):
    if not properties:
        return False
        properties = {
            'type': "text",
            'id': "first_name",
            'name': "first_name",
            'value': "",
            'placeholder': "James",
            'required': False,
            'disabled': False,
            'autocomplete': False,
            'class': "",
            'css': [{
                'color': "#F00",
                'left': "0%",
            }],
        }
    response = build_text_input(properties)
    return response
app.jinja_env.globals.update(render_text_input = render_text_input)