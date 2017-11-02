(function() {

	function wrapElement(elem, wrapper) {
		var parent = elem.parentNode;
		parent.insertBefore(wrapper, elem);
		wrapper.appendChild(elem);

		//will have to add caret element instead of using pseudo-elements
		//if input has predefined width, using :after blocks us from manipulating position later
		var caret = document.createElement('span');
		caret.setAttribute('aria-hidden', 'true');
		caret.className = 'fa fa-caret-down';
		wrapper.appendChild(caret);

		//have to update caret position depending on elem width
		var rect = elem.getBoundingClientRect();
		var inputWidth = Math.round(rect.right - rect.left);
		if (inputWidth) {
			caret.style.setProperty('left', 'calc(' + inputWidth + 'px - 40px)');
		} else {
			caret.style.setProperty('left', 'calc(100% - 40px)');
		}
	}

	function toggleCaret(wrapper, open) {
		wrapper.className = 'rc_selectfilter__wrapper';
		wrapper.classList.add(open ? 'rc_selectfilter__wrapper--opened' : 'rc_selectfilter__wrapper--closed');

		var caret = wrapper.querySelector('span.fa');
		caret.className = 'fa';
		caret.classList.add(open ? 'fa-caret-up' : 'fa-caret-down');
	}

	// default class selector will be .rc_selectfilter
	function rcSelectFilter(config) {
		var options = {
			url: '',
			selector: null,
			delay: 366, // according to Mike this should be the delay time
			keybindEvent: "keyup",
			data: [],
			fieldLabel: 'label',
			fieldId: 'label',
			templateFn: function(opt) {
				return opt[options.fieldLabel];
			},
			onSelect: null,//function(obj) {},
		};

		for (var k in config) {
			if (options.hasOwnProperty(k)) {
				options[k] = config[k];
			}
		}

		if (config.fieldLabel && !config.fieldId) {
			options.fieldId = options.fieldLabel;
		}


		//check if selector is cssSelector/jQueryElem/nodeElem and get the nodeElement ref
		var elem = typeof options.selector === 'object' ? options.selector.jquery ? options.selector[0] : options.selector : document.querySelector(options.selector);
		var self = this;
		var currentValue = '';
		var selectedId = null;


		self.optionsContainer = document.createElement('ul');
		self.optionsContainer.className = 'rc_selectfilter__options';

		var wrapper = document.createElement('div');
		wrapper.className = 'rc_selectfilter__wrapper rc_selectfilter__wrapper--closed';

		//perform magic of wrapping elem
		wrapElement(elem, wrapper);

		//<i class="fa fa-caret-down" aria-hidden="true"></i>
		//<i class="fa fa-caret-up" aria-hidden="true"></i>

		//avoid browser autocomplete on autocomplete, HA!
		elem.setAttribute('autocomplete', 'off');

		var innerTemplateFn = function(opt) {
			return '<li data-value="' + opt[options.fieldId] + '" class="rc_selectfilter__option">' + options.templateFn(opt) + '</li>';
		}

		//build query function specific for this element
		self.queryFn = function(q) {
			var keyProp = options.fieldLabel;

			if (q !== '') {
				var regX = new RegExp(q, 'i');
				return options.data
					.filter(function(opt) {
						return regX.test(opt[keyProp]);
					})
					.map(innerTemplateFn);
			} else {
				return options.data.map(innerTemplateFn);
			}
		}

		var updateSelectedModel = function(val, obj) {
			elem.value = val;

			if (val !== currentValue) {
				currentValue = val;

				if (obj) {
					selectedId = obj[options.fieldId];
				} else {
					selectedId = null;
				}

				if (options.onSelect) options.onSelect(obj);
			}
		}

		self.showAll = function() {
			var optsAsHTML = this.queryFn('');
			if (optsAsHTML.length) {
				this.optionsContainer.innerHTML = optsAsHTML.join('');

				this.updateContainerPosition(null, optsAsHTML.length);
			} else {
				this.optionsContainer.style.display = 'none';
				toggleCaret(wrapper, false);
			}
		}

		self.search = function(q) {
			var optsAsHTML = this.queryFn(q);
			if (optsAsHTML.length) {
				this.optionsContainer.innerHTML = optsAsHTML.join('');

				this.updateContainerPosition(null, optsAsHTML.length);
			} else {
				this.optionsContainer.style.display = 'none';
				toggleCaret(wrapper, false);
			}
		}

		var fireSearchHandler = function(ev) {
			var key = window.event ? ev.keyCode : ev.which;
			if (!key || (key < 35 || key > 40) && key != 13 && key != 27) {
				var val = ev.target.value;
				//if (val) {
				clearTimeout(self.timer);
				// do logic here for building suggestions
				self.timer = setTimeout(function() {
					//query should be the function that performs the search action and comes up with the results to show as options
					self.search(val);
				}, options.delay)
				//}
			}
		}

		var blurHandler = function(ev) {
			var isOverContainer = document.querySelector('.rc_selectfilter__options:hover');
			if (!isOverContainer) {
				self.optionsContainer.style.display = 'none';
				toggleCaret(wrapper, false);

				if (elem.value === '') {
					//if field is completely cleared unselect option
					updateSelectedModel('');
				} else {
					//if field is modified update only field value
					if (currentValue && currentValue !== elem.value) {
						updateSelectedModel(currentValue);
					}
				}
			} else if (document.activeElement !== elem) {
				setTimeout(function() {
					elem.focus();
				}, 100);
			}
		}

		var addHoverClass = function(ev) {
			var selectedOpt = self.optionsContainer.querySelector('.rc_selectfilter__option--highlight');

			if (selectedOpt)
				selectedOpt.classList.remove('rc_selectfilter__option--highlight');

			var target = ev.target;
			while (target && !target.classList.contains('rc_selectfilter__option')) {
				target = target.parentElement;
			}

			if (target) target.classList.add('rc_selectfilter__option--highlight');
		}

		var selectHandler = function(ev) {
			var target = ev.target;
			while (target && !target.classList.contains('rc_selectfilter__option')) {
				target = target.parentElement;
			}

			var val = target.getAttribute('data-value');

			var obj = options.data.filter(function (el) {
				return el[options.fieldId] == val;
			})[0];

			updateSelectedModel(obj[options.fieldLabel], obj);

			self.optionsContainer.style.display = 'none';
			toggleCaret(wrapper, false);
		}

		var focusHandler = function(ev) {
			var isOverContainer = document.querySelector('.rc_selectfilter__options:hover');
			if (!isOverContainer) {
				self.search(elem.value);
			} else {
				self.optionsContainer.style.display = 'none';
				toggleCaret(wrapper, false);
			}
		}

		elem.addEventListener('click', focusHandler);

		elem.addEventListener('blur', blurHandler);
		elem.addEventListener(options.keybindEvent, fireSearchHandler);
		self.optionsContainer.addEventListener('mouseover', addHoverClass);
		self.optionsContainer.addEventListener('click', selectHandler);


		self.updateContainerPosition = function(ev, show){
            var rect = elem.getBoundingClientRect();
            self.optionsContainer.style.left = Math.round(rect.left + (window.pageXOffset || document.documentElement.scrollLeft) ) + 'px';
            self.optionsContainer.style.top = Math.round(rect.bottom + (window.pageYOffset || document.documentElement.scrollTop) - 1) + 'px';
            self.optionsContainer.style.width = Math.round(rect.right - rect.left) + 'px'; // outerWidth

            if (show) {
            	self.optionsContainer.style.display = 'block';
            	toggleCaret(wrapper, show);
            } else {
            	self.optionsContainer.style.display = 'none';
            	toggleCaret(wrapper, show);
            }

        }

        window.addEventListener('resize', self.updateContainerPosition);

		document.body.appendChild(self.optionsContainer);

		//PUBLIC METHODS
		self.hasValue = function() {
			return selectedId !== null;
		}

		self.getValue = function() {
			return selectedId;
		}

		self.setData = function(newData) {
			options.data = newData;
		}

		self.setValue = function(dataValue) {
			var obj = options.data.filter(function (el) {
				return el[options.fieldId] == dataValue;
			})[0];

			updateSelectedModel(obj[options.fieldLabel], obj);
		}

		self.clear = function() {
			updateSelectedModel('');
		}

		self.destroy = function() {
			elem.value = '';
			elem.removeEventListener('blur', blurHandler);
			elem.removeEventListener(options.keybindEvent, fireSearchHandler);
			elem.removeEventListener('click', focusHandler);
			self.optionsContainer.removeEventListener('mouseover', addHoverClass);
			self.optionsContainer.removeEventListener('click', selectHandler);
			window.removeEventListener('resize', self.updateContainerPosition);
			document.body.removeChild(self.optionsContainer);
			delete elem.rcSelectFilter;
		}

		//for now let's not add it to the element since there is no point
		elem.rcSelectFilter = {
			hasValue: self.hasValue,
			getValue: self.getValue,
			setValue : self.setValue,
			setData: self.setData,
			clear: self.clear,
			destroy: self.destroy,
		};
	}

	if (window.ReCharge) {
		window.ReCharge['rcSelectFilter'] = rcSelectFilter;
	} else {
		window.rcSelectFilter = rcSelectFilter;
	}

})();
