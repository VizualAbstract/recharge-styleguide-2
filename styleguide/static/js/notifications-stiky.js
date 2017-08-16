(function($) {
	/* Constructor */
	this.rcNotificationV2 = function() {
		rcNotification.call(this, arguments[0]);

		//check/create container
		this.container = document.querySelector('.rc_notification__container');

		//custom classes to always be added
		this.customClasses = 'rc_flash';

		if (!this.container) {
			//create container
			this.container = document.createElement('div');
			this.container.className = 'rc_notification__container';

			/* check order for container placement
				1. After Breadcrumbs
				2. After Navbar
				3. Prepend to body
			*/
			if (document.querySelector('ol.breadcrumbs')) {
				//place after breadcrumb
				insertAfter(this.container, document.querySelector('ol.breadcrumbs'));
			} else if (document.querySelector('#rc_navbar')) {
				//place after navbar
				insertAfter(this.container, document.querySelector('#rc_navbar'));
			} else {
				//preprend to body
				insertAfter(this.container, document.body.firstChild);
			}

			//attach listener only if creating container
			var jContainer = $(this.container),
				jSibling = $(this.container.nextSibling),
				y_pos = jContainer.offset().top;

			$(document).scroll(function() {
				var scrollTop = $(this).scrollTop(),
					height = jContainer.height();

				if (scrollTop > y_pos + height) {
					//ensure smooth roll of content when notification swiches position
					jSibling.css('margin-top', height);

					jContainer.addClass("rc_notification__container--fixed")
						.animate({ top: 0 });
				} else if (scrollTop <= y_pos) {
					jSibling.css('margin-top', 0);

					jContainer.removeClass("rc_notification__container--fixed")
						.clearQueue()
						.animate({ top: "-48px" }, 0);
				}
			});
		}

		this._appendNotification = function() {
			this.container.appendChild(this.notification);
		}

	}

	function insertAfter(newNode, refNode) {
		refNode.parentNode.insertBefore(newNode, refNode.nextSibling);
	}

	rcNotificationV2.prototype = Object.create(rcNotification.prototype);
	rcNotificationV2.prototype.constructor = rcNotification;

}(window.jQuery));