(function() {
	/* Constructor */
	this.rcBanner = function() {
		// Global elements
		this.banner = null;

		// Determine transitionEnd prefix
		this.transitionEnd = transitionSelect();

		// Default options
		var defaults = {
			timeout: 3500
		}

		// Create options by extending defaults with passed-in-arguments
		if (arguments[0] && typeof(arguments[0]) == "object") {
			this.options = extendDefaults(this.defaults, arguments[0]);
		} else {
			this.options = defaults;
		}
	}

	/* Public methods */
	// Show the banner
	rcBanner.prototype.show = function() {
		var banners = document.getElementsByClassName("rc_banner");
		if (banners.length) {
			var _this = this;
			Array.prototype.slice.call(banners).forEach(function(banner) {
				// Trigger timeout listener listener
				var bannerType = getBannerType.call(this, banner);

				// Ensures a smooth transition on reveal
				window.getComputedStyle(banner).height;

				if (bannerType == 'error' || bannerType == 'warning') {
					// Add a close button
					buildCloseButton.call(this, banner);
					// Add a listener to the close button
					initializeEvents.call(this, banner);
				} else {
					// Set automatic close timeout
					setBannerTimeout.call(_this, banner);
				}
				// Add class that initiates the transition
				banner.className = banner.className + " rc_show";
			});
		}
	}

	// Close and remove the banner
	rcBanner.prototype.close = function(banner) {
		// Remove the class that initiated the transition
		banner.className = banner.className.replace(" rc_show", "");

		// Remove banner when transition ends
		banner.addEventListener(banner.transitionEnd, function() {
			banner.parentNode.removeChild(banner);
		});
	}

	/* Private methods */
	function getBannerType(banner) {
		return banner.className.replace("rc_banner rc_banner--", "");
	}

	// Close banner automatically after a timeout
	function setBannerTimeout(banner) {
		setTimeout(function() {
			rcBanner.prototype.close(banner);
		}, this.options.timeout);
	}

	// Build the notification element and append to document
	function buildCloseButton(banner) {
		// Build a button with the class .rc_banner__close
		var closeButton = document.createElement('button');
		closeButton.className = 'rc_banner__close';
		// Append document fragment to the Banner
		banner.appendChild(closeButton);
	}

	// Initialize any click events
	function initializeEvents(banner) {
		// Bind the close button to the close method
		var closeButton = banner.getElementsByClassName('rc_banner__close')[0];
		closeButton.addEventListener('click', function() {
			rcBanner.prototype.close(banner);
		});
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