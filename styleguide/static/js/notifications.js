(function() {
	/* Constructor */
	this.rcNotification = function() {
		// Global elements
		this.notification = null;

		// Determine transitionEnd prefix
		this.transitionEnd = transitionSelect();

		// Default options
		var defaults = {
			message: "",
			type: "default",
			timeout: 3500,
			static: false
		}

		// Create options by extending defaults with passed-in-arguments
		if (arguments[0] && typeof(arguments[0]) == "object") {
			this.options = extendDefaults(defaults, arguments[0]);
		}

		this._appendNotification = function() {
			document.body.appendChild(this.notification);
		}

	}

	/* Public methods */
	// Show the notification
	rcNotification.prototype.show = function() {
		// Build notification
		buildNotification.call(this);

		// Initialize event listener
		initializeEvents.call(this);

		// Ensures a smooth transition on reveal
		window.getComputedStyle(this.notification).height;

		// Add class that initiates the transition
		this.notification.className = this.notification.className + " rc_show";
		
		// Close notification automatically after a timeout if static isn't set to true
		if (!this.options.static === true || this.options.static === 'false') {
			var _this = this;
			setTimeout(function() {
				_this.close();
			}, this.options.timeout);
		}
	}

	rcNotification.prototype.flash = function(element) {
		// Ensures a smooth transition on reveal
		window.getComputedStyle(element).height;

		this.notification = element;

		// Add class that initiates the transition
		//this.notification.className = this.notification.className + " rc_flash rc_show";
		addClasses.call(this, this.notification.className + " rc_flash rc_show");

		this._appendNotification();

		// Trigger timeout listener listener
		var type = this.notification.className.replace("rc_notification rc_notification--", "").replace(" rc_flash rc_show", "");
		if (type == 'error' || type == 'warning' || type == 'review') {
			// Add a close button
			buildCloseButton.call(this, this.notification);

			// Add a listener to the close button
			initializeEvents.call(this, this.notification);
		} else {
			// Close notification automatically after a timeout if static isn't set to true
			var _this = this;
			setTimeout(function() {
				_this.close();
			}, 3500); // this.options.timeout
		}
	}

	// Close and remove the notification
	rcNotification.prototype.close = function() {
		// Force-close the notification script
		var _this = this;

		// Remove the class that initiated the transition
		this.notification.className = this.notification.className.replace(" rc_show", "");

		// Remove notification when transition ends
		this.notification.addEventListener(this.transitionEnd, function() {
			_this.notification.parentNode.removeChild(_this.notification);
		});
	}

	// Store notification data as a cookie
	rcNotification.prototype.reload = function() {
		var _this = this;

		// Store options in cookies for use on reload
		createCookie.call(this, "rcNoticeMessage", _this.options.message);
		createCookie.call(this, "rcNoticeType", _this.options.type);
		createCookie.call(this, "rcNoticeTimeout", _this.options.timeout);
		createCookie.call(this, "rcNoticeStatic", _this.options.static);
	}

	// Read cookies to show any pending notification data
	rcNotification.prototype.pending = function() {
		var pending_message = readCookie.call(this, 'rcNoticeMessage');

		// Only run if rcNoticeMessage cookie is set
		if (pending_message) {
			this.options = {};

			// Build default options
			this.options.message = pending_message;
			this.options.type = readCookie.call(this, 'rcNoticeType');
			this.options.timeout = readCookie.call(this, 'rcNoticeTimeout');
			this.options.static = readCookie.call(this, 'rcNoticeStatic');
			
			// Trigger the notification
			this.show();

			// Remove cookies
			eraseCookie.call(this, 'rcNoticeMessage');
			eraseCookie.call(this, 'rcNoticeType');
			eraseCookie.call(this, 'rcNoticeTimeout');
			eraseCookie.call(this, 'rcNoticeStatic');
		}
	}
	/*rcNotification.prototype.pending = function() {
		var pending_message = readCookie.call(this, 'rcNoticeMessage');

		// Only run if rcNoticeMessage cookie is set
		if (pending_message) {
			this.options = {};

			// Build default options
			this.options.message = pending_message;
			try {
				this.options.type = readCookie.call(this, 'rcNoticeType');
			}
			catch(error) {}
			try {
				this.options.timeout = readCookie.call(this, 'rcNoticeTimeout');
			}
			catch(error) {}
			try {
				this.options.static = readCookie.call(this, 'rcNoticeStatic');
			}
			catch(error) {}

			// Trigger the notification
			this.show();

			// Remove cookies
			eraseCookie.call(this, 'rcNoticeMessage');
			eraseCookie.call(this, 'rcNoticeType');
			eraseCookie.call(this, 'rcNoticeTimeout');
			eraseCookie.call(this, 'rcNoticeStatic');
		}
	}*/

	/* Private methods */
	// Generic create cookie function
	function createCookie(name, value, days) {
		var expires;
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toGMTString();
		} else {
			expires = "";
		}
		document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
	}

	// Generic read cookie function V2
	// This one avoids the double quotes from appearing from cookie fetched messages e.g. ""message""
	function readCookie(key) {
		if (!key) { return null; }
		
		var cookie = decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(key).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;

		if (cookie){
			if (!isNaN(+cookie)) {
				return +cookie;
			} else if (cookie === "true" || cookie === 'false') {
				return cookie === "true";
			}

			return cookie.replace(/"/g,"");
		}

		return cookie;
	}

	// Generic read cookie function
	/*function readCookie(name) {
		var nameEQ = encodeURIComponent(name) + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) === ' ') {
				c = c.substring(1, c.length);
			}
			if (c.indexOf(nameEQ) === 0) {
				return decodeURIComponent(c.substring(nameEQ.length, c.length));
			}
		}
		return null;
	}*/

	// Generic erase cookie function
	function eraseCookie(name) {
		createCookie(name, "", -1);
	}

	// Build the notification element and append to document
	function buildNotification() {
		// Build the notification container
		this.notification = document.createElement("div");
		//this.notification.className = "rc_notification rc_notification--" + this.options.type;
		addClasses.call(this, "rc_notification rc_notification--" + this.options.type);

		// If notification requires a close button
		if (this.options.static === true || this.options.static === 'true') {
			this.closeButton = document.createElement('span');
			this.closeButton.className = 'rc_notification__close';

			// Append close button to notification
			this.notification.appendChild(this.closeButton);
		}

		// Place message within a <p></p> tag
		notificationContent = document.createElement("p");
		notificationContent.innerHTML = this.options.message;
		this.notification.appendChild(notificationContent)

		// Append document fragment to the body
		//document.body.appendChild(docFragment);
		this._appendNotification();
	}

	function addClasses(classNames) {
		var elem = this.notification;

		function checkAndAdd(clazz) {
			if (!elem.classList.contains(clazz)) {
				elem.classList.add(clazz);
			}
		}
		
		classNames
			.split(' ')
			.forEach(checkAndAdd)

		if (this.customClasses) {
			this.customClasses
				.split(' ')
				.forEach(checkAndAdd)
		}
	}

	// Build the notification element and append to document
	function buildCloseButton(element) {
		// Build a button with the class .rc_notification__close
		this.closeButton = document.createElement('span');
		this.closeButton.className = 'rc_notification__close';
		// // Append document fragment to the notification
		this.notification.appendChild(this.closeButton);
	}

	// Initialize any click events
	function initializeEvents() {
		// Bind the close button to the close method
		if (this.closeButton) {
			this.closeButton.addEventListener('click', this.close.bind(this));
		}
	}

	/* Utility methods */
	// Extend defaults with provided options
	function extendDefaults(source, properties) {
		var property;
		for (property in properties) {
			if (properties.hasOwnProperty(property)) {
				source[property] = properties[property];
			}
		}
		return source;
	}

	// Determine which transitionEnd event is supported
	function transitionSelect() {
		var element = document.createElement("div");
		if (element.style.WebkitTransition) {
			return "webkitTransitionEnd";
		}
		if (element.style.OTransition) {
			return "oTransitionEnd";
		}
		return "transitionend";
	}
}());