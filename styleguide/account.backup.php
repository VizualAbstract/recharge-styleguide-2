<?php include('head.php'); ?>

<?php include('header.php'); ?>
					<!-- <link rel="stylesheet" type="text/css" media="all" charset="utf-8" href="https://rechargeassets-bootstrapheroes-rechargeapps.netdna-ssl.com/static/css/fontawesome.css?t=1501083655">
					<link rel="stylesheet" type="text/css" media="all" charset="utf-8" href="https://rechargeassets-bootstrapheroes-rechargeapps.netdna-ssl.com/static/css/main_proxy.css?t=1501083655"> 
					<link rel="stylesheet" href="https://rechargeassets-bootstrapheroes-rechargeapps.netdna-ssl.com/static/css/proxy.css?t=1501083655" type="text/css" media="all">
					<style>
						table.rc_table.rc_table--toggle td:first-child {
							vertical-align: top;
						}
					</style>
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
					-->
					<div id="rc_wrapper">
						<div class="flex__container" flex-max="lg">
							<div class="flex__layout">
								<div class="flex__sidebar" id="rc_sidenav">
									<?php include('_sidebar.php'); ?>
								</div>
								<div class="flex__content ">
									<div class="header-settings ">
										<div class="header-settings__title ">
											<h3>Billing Information</h3>
										</div>
									</div>
									<table class="rc_table " table-responsive="true ">
										<tbody>
											<tr>
												<td>
													<h5>Card on file</h5>
												</td>
												<td class="rc_text--base">
													visa ending in 0773<br>
													<br>
													<a href="/tools/recurring/customer/2502403f40aa4df316fb1e5/card/" class="button">Edit</a>
												</td>
											</tr>
											<tr>
												<td>
													<h5>Billing info</h5>
												</td>
												<td class="rc_text--base ">
													Matt McClard<br>
													2007 Farrington Street <br>
													Dallas, Texas 75207<br>
													United States<br>
													<br>
													yankeyhotel@gmail.com<br>
													<br>
													<a class="button" href="/tools/recurring/customer/2502403f40aa4df316fb1e5/edit">Edit</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<script>
						if (typeof jQuery == 'undefined') {
							document.write('<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></' + 'script>');
						}
					</script>
					<script src="https://rechargeassets-bootstrapheroes-rechargeapps.netdna-ssl.com/static/js/main.js?t=1501083655" charset="utf-8"></script>
					<script>
						/* Mobile navigation */
						document.getElementById('rc_mobile_navigation').addEventListener('change', function() {
							var element = (typeof(this.selectedIndex) === "undefined " ? window.event.srcElement : this);
							var location = element.value || element.options[this.selectedIndex].value;
							window.location.href = location;
						});
					</script>
					<script>
						// Customer Portal link
						$(document).on('click', '#get_customer_portal_link', function(e) {
							e.preventDefault();
							$(this).hide();
							$('#customer_portal_link').show();
						});
					</script>
					<script>
						(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
							(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
							m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
						})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
						ga('create', 'UA-96176346-3', 'auto');
						ga('require', 'displayfeatures');
						ga('send', 'pageview');
					</script>
<?php include('footer.php'); ?>