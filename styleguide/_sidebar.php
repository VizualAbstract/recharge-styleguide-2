<div id="recharge_sidebar" class="rc_layout__sidebar">
	<div class="sidebar">
		<div class="sidebar__header">
			<h3 class="customer__name">Matt McClard</h3>
		</div>
		<ul id="rc_navigation" class="sidebar__menu">
			<li class="menu__item">
				<a href="http://www.footcardigan.com/tools/recurring/customers/2502403f40aa4df316fb1e5/orders/schedule/">Delivery Schedule</a>
			</li>
			<li class="menu__item">
				<a href="http://www.footcardigan.com/tools/recurring/customers/2502403f40aa4df316fb1e5/subscriptions/">Subscriptions</a>
			</li>
			<li class="menu__item">
				<a href="http://www.footcardigan.com/tools/recurring/customers/2502403f40aa4df316fb1e5/account/" class="active">Billing Information</a>
			</li>
			<li class="menu__item">
				<a href="http://www.footcardigan.com/tools/recurring/customers/2502403f40aa4df316fb1e5/orders/history/">Purchase History</a>
			</li>
		</ul>
		<select id="rc_mobile_navigation" class="">
			<option value="http://www.footcardigan.com/tools/recurring/customers/2502403f40aa4df316fb1e5/orders/schedule/">
				Delivery Schedule
			</option>
			<option value="http://www.footcardigan.com/tools/recurring/customers/2502403f40aa4df316fb1e5/subscriptions/">
				Subscriptions
			</option>
			<option value="http://www.footcardigan.com/tools/recurring/customers/2502403f40aa4df316fb1e5/account/" selected>
				Billing Information
			</option>
			<option value="http://www.footcardigan.com/tools/recurring/customers/2502403f40aa4df316fb1e5/orders/history/">
				Purchase History
			</option>
		</select>
	</div>
</div>
<style>
	#rc_mobile_navigation {
		display: none;
		height: 30px;
		width: 85%;
		margin: 15px auto 0;
	}
	@media only screen and (max-width: 767px) {
		#rc_navigation {
			display: none;
		}
		#rc_mobile_navigation {
			display: block;
		}
	}
</style>
<script>
	/* Mobile navigation */
	document.getElementById('rc_mobile_navigation').addEventListener('change', function() {
		var element = (typeof(this.selectedIndex) === "undefined " ? window.event.srcElement : this);
		var location = element.value || element.options[this.selectedIndex].value;
		window.location.href = location;
	});
</script>