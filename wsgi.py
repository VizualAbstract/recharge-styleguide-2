from styleguide import app

if (app.debug):
    from werkzeug.debug import DebuggedApplication
    app.wsgi_app = DebuggedApplication(app.wsgi_app, True)

if __name__ == "__main__":
	app.run(debug=True)

# def application(environ, start_response):
#     start_response('200 OK', [('Content-Type', 'text/html')])
#     return ["<h1 style='color:blue'>Hello There!</h1>"]