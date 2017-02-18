# run.py

from flask import Flask
app = Flask(__name__)

@app.route("/")
def hello():
	return "<style>html,body {background-color: #333;color:#FFF;font-family:\"Courier New\", Courier, \"Lucida Sans Typewriter\", \"Lucida Typewriter\", monospace;}</style>SCREW THIS SHIT<br>ALso, Jason is a slutbucket.<br>Happy Valentines Day.<br><br><img src=\"https://media.giphy.com/media/gaPfF9wPI3Pa0/giphy.gif\">"

if __name__ == "__main__":
	app.run(host='0.0.0.0')
