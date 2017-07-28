<?php include('head.php'); ?>

<?php include('header.php'); ?>

                <link rel="stylesheet" href="https://rechargeassets-bootstrapheroes-rechargeapps.netdna-ssl.com/static/css/proxy.css?t=1501083655" type="text/css" media="all">
                <style>
			        #ReCharge.clearfix:before,
			        #ReCharge.clearfix:after {
			            display: table;
			            content: "";
			            clear: both;
			        }
			        .item-child {
			            display: none;
			        }
			        .item-parent:hover .item-child {
			            display: inline;
			        }
			        /* Customer Tab Section */
			        #customer_tab_nav {
			            float: left;
			            width: 20%;
			        }
			        #ReCharge {
			            min-height: 200px;
			            /*display:inline-block */
			        }
			        .ReCharge-table th,
			        .ReCharge-table td {
			            padding: 3px !important;
			            text-align: left;
			        }
			        #ReCharge-Mobile-Nav {
			            display: none;
			        }
			        @media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px) {
			            #ReCharge-Nav {
			                display: none;
			            }
			            #ReCharge {
			                height: auto;
			            }
			            #ReCharge-Mobile-Nav {
			                display: block;
			                height: 30px;
			                width: 100% !important;
			            }
			            #customer_tab_nav {
			                float: none !important;
			                width: 100% !important;
			            }
			            /* Force table to not be like tables anymore */
			            #ReCharge table,
			            #ReCharge thead,
			            #ReCharge tbody,
			            #ReCharge th,
			            #ReCharge td,
			            #ReCharge tr {
			                display: block !important;
			            }
			            /* Hide table headers (but not display: none;, for accessibility) */
			            #ReCharge thead tr {
			                position: absolute !important;
			                top: -9999px !important;
			                left: -9999px !important;
			            }
			            #ReCharge tr {
			                border: 1px solid #ccc !important;
			            }
			            #ReCharge td {
			                /* Behave  like a "row" */
			                border: none !important;
			                border-bottom: 1px solid #eee !important;
			                position: relative !important;
			                padding-left: 50% !important;
			            }
			            #ReCharge td:before {
			                /* Now like a table header */
			                position: absolute !important;
			                /* Top/left values mimic padding */
			                /* top: 6px !important; */
			                left: 6px !important;
			                width: 45% !important;
			                padding-right: 10px !important;
			                white-space: nowrap !important;
			            }
			            #ReCharge #hidden-header-ReCharge {}
			            /*
						Label the data
						*/
			            #ReCharge td:nth-of-type(1):before {
			                content: "Product" !important;
			            }
			            #ReCharge td:nth-of-type(2):before {
			                content: "Amount" !important;
			            }
			            #ReCharge td:nth-of-type(3):before {
			                content: "Unit Price" !important;
			            }
			            #ReCharge td:nth-of-type(4):before {
			                content: "Frequency" !important;
			            }
			            .modal-header .close {
			                display: none;
			            }
			        }
		        </style>
                <style>
	                .admin-recharge,
	                .recharge-admin-only,
	                .admin-tools {
	                    display: none !important;
	                }
                </style>
                <style>
	                #rc_notification {
	                    position: fixed;
	                    top: auto !important;
	                    left: 0;
	                    right: 0;
	                    bottom: 0;
	                    padding: 0 10px;
	                    height: 0;
	                    background: #EEE;
	                    z-index: 9999999;
	                    width: 100%;
	                }
	                #rc_notification .message-notification {
	                    color: #FFF;
	                    text-align: center;
	                    display: block;
	                    width: 100%;
	                    font-size: 24px;
	                    font-weight: normal;
	                    line-height: 86px;
	                }
                </style>
                <style>
                    #ReCharge-Mobile-Nav {
                        display: none;
                    }
                    @media only screen and (max-width: 760px) {
                        #ReCharge-Nav {
                            display: none;
                        }
                        #ReCharge-Mobile-Nav {
                            display: block;
                            height: 30px;
                            width: 100% !important;
                        }
                    }
                </style>
                <div id="ReCharge">
                    <div id="content__subscriptions">
                        <div class="rc_layout__container">
                            <div class="rc_layout">
                                <div class="rc_layout__sidebar">
                                    <?php include('_sidebar.php'); ?>
                                </div>
                                <div id="customer_tab_content" class="rc_layout__content">
                                    <div class="rc_title-bar">
                                        <div class="rc_title-bar__title">
                                            <h2>Subscription Orders</h2>
                                        </div>
                                        <div class="rc_title-bar__content">
                                        </div>
                                    </div>
                                    <div class="re__subscriptions__subscriptions">
                                        <div class="re__subscriptions__subscription__1 re__subscriptions__subscription purchase-item">
                                            <p class="purchase-address">
                                                <strong>Ships To:</strong>
                                                <span class="re__subscriptions__subscription__address">
													<span class="re__subscriptions__subscription__address__address_1">
														2007 Farrington Street
													</span>
	                                                <span class="re__subscriptions__subscription__address__address_2">
														,
													</span>
	                                                <span class="re__subscriptions__subscription__address__city">
														Dallas
													</span>
                                                	<span class="re__subscriptions__subscription__address__zipcode">
														75207
													</span>
													<span class="re__subscriptions__subscription__address__edit">
														<a class="edit_address_link" href="/tools/recurring/purchase/2429905/2502403f40aa4df316fb1e5/address/edit/">Edit</a>
													</span>
                                                </span>
                                            </p>
                                            <div class="table-responsive">
                                                <table class="re__subscriptions__subscription__items table">
                                                    <thead>
                                                        <tr id="hidden-header-ReCharge">
                                                            <th class="th-product">
                                                                Product
                                                            </th>
                                                            <th class="th-amount">
                                                                Amount
                                                            </th>
                                                            <th class="th-price">
                                                                USD
                                                            </th>
                                                            <th class="th-frequency">
                                                                Frequency
                                                            </th>
                                                            <th class="table-frequency center">
                                                                Next Charge Date
                                                            </th>
                                                            <th class="th-actions"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="re__subscriptions__subscription__item__1 re__subscriptions__subscription__itemcancelled-item" data-purchaseid="2429905">
                                                            <td class="re__subscriptions__subscription__item__product td-product">
                                                                <span style="text-decoration: line-through;">
																		Number Ones (R) - Monthly Subscription  Auto renew - Men
																	</span>
                                                                <span style="color: red;">Cancelled</span>
                                                                <div style="color:#2b93ac;font-weight:bold" class="processing_message_3694054"></div>
                                                            </td>
                                                            <!-- .re__subscriptions__subscription__item__product -->
                                                            <td class="re__subscriptions__subscription__item__qty td-amount">
                                                                1
                                                            </td>
                                                            <!-- .re__subscriptions__subscription__item__qty -->
                                                            <td class="re__subscriptions__subscription__item__price td-price">
                                                                9.00
                                                            </td>
                                                            <!-- .re__subscriptions__subscription__item__price -->
                                                            <td class="re__subscriptions__subscription__item__schedule td-frequency">
                                                                1 Months
                                                            </td>
                                                            <!-- .re__subscriptions__subscription__item__schedule -->
                                                            <td class="re__subscriptions__subscription__item__date td-next-charge-date">
                                                                -
                                                            </td>
                                                            <!-- .re__subscriptions__subscription__item__date -->
                                                            <td class="re__subscriptions__subscription__item__actions td-actions">
                                                                <span class="re__subscriptions__subscription__item__activate">
																	<a href="#" data-item-id="3694054" class="action__reactivatePurchaseItem">Re-activate</a>
																</span>
                                                                <br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="re__subscriptions__subscription__2 re__subscriptions__subscription purchase-item">
                                            <p class="purchase-address">
                                                <strong>Ships To:</strong>
                                                <span class="re__subscriptions__subscription__address">
													<span class="re__subscriptions__subscription__address__address_1">
														2007 Farrington Street
													</span>
	                                                <span class="re__subscriptions__subscription__address__address_2">
														,
													</span>
	                                                <span class="re__subscriptions__subscription__address__city">
														Dallas
													</span>
	                                                <span class="re__subscriptions__subscription__address__zipcode">
														75207
													</span>
	                                                <span class="re__subscriptions__subscription__address__edit">
														<a class="edit_address_link" href="/tools/recurring/purchase/2459698/2502403f40aa4df316fb1e5/address/edit/">Edit</a>
													</span>
                                                </span>
                                            </p>
                                            <!-- .purchase-address -->
                                            <div class="table-responsive">
                                                <table class="re__subscriptions__subscription__items table">
                                                    <thead>
                                                        <tr id="hidden-header-ReCharge">
                                                            <th class="th-product">
                                                                Product
                                                            </th>
                                                            <th class="th-amount">
                                                                Amount
                                                            </th>
                                                            <th class="th-price">
                                                                USD
                                                            </th>
                                                            <th class="th-frequency">
                                                                Frequency
                                                            </th>
                                                            <th class="table-frequency center">
                                                                Next Charge Date
                                                            </th>
                                                            <th class="th-actions"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="re__subscriptions__subscription__item__1 re__subscriptions__subscription__itemcancelled-item" data-purchaseid="2459698">
                                                            <td class="re__subscriptions__subscription__item__product td-product">
                                                                <span style="text-decoration: line-through;">
																		Number Ones - Monthly Subscription - Women (Sizes 5-10)
																	</span>
                                                                <span style="color: red;">Cancelled</span>
                                                                <div style="color:#2b93ac;font-weight:bold" class="processing_message_3735532"></div>
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__qty td-amount">
                                                                1
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__price td-price">
                                                                12.00
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__schedule td-frequency">
                                                                1 Months
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__date td-next-charge-date">
                                                                -
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__actions td-actions">
                                                            	<span class="re__subscriptions__subscription__item__activate">
																	<a href="#" data-item-id="3735532" class="action__reactivatePurchaseItem">Re-activate</a>
																</span>
                                                                <br>
                                                            </td>
                                                        </tr>
                                                        <tr class="re__subscriptions__subscription__item__2 re__subscriptions__subscription__itemcancelled-item" data-purchaseid="2459698">
                                                            <td class="re__subscriptions__subscription__item__product td-product">
                                                                <span style="text-decoration: line-through;">
																	Horrible Gift Wrap Monthly
																</span>
                                                                <span style="color: red;">Cancelled</span>
                                                                <div style="color:#2b93ac;font-weight:bold" class="processing_message_3735535"></div>
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__qty td-amount">
                                                                1
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__price td-price">
                                                                2.00
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__schedule td-frequency">
                                                                1 Months
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__date td-next-charge-date">
                                                                -
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__actions td-actions">
                                                                <span class="re__subscriptions__subscription__item__activate">
																	<a href="#" data-item-id="3735535" class="action__reactivatePurchaseItem">Re-activate</a>
																</span>
                                                                <br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="re__subscriptions__subscription__3 re__subscriptions__subscription purchase-item">
                                            <p class="purchase-address">
                                                <strong>Ships To:</strong>
                                                <span class="re__subscriptions__subscription__address">
													<span class="re__subscriptions__subscription__address__address_1">
														7331 Paldao Dr
													</span>
                                                	<span class="re__subscriptions__subscription__address__address_2">
														,
													</span>
													<span class="re__subscriptions__subscription__address__city">
														Dallas
													</span>
	                                                <span class="re__subscriptions__subscription__address__zipcode">
														75240
													</span>
	                                                <span class="re__subscriptions__subscription__address__edit">
														<a class="edit_address_link" href="/tools/recurring/purchase/2982759/2502403f40aa4df316fb1e5/address/edit/">Edit</a>
													</span>
                                                </span>
                                            </p>
                                            <div class="table-responsive">
                                                <table class="re__subscriptions__subscription__items table">
                                                    <thead>
                                                        <tr id="hidden-header-ReCharge">
                                                            <th class="th-product">
                                                                Product
                                                            </th>
                                                            <th class="th-amount">
                                                                Amount
                                                            </th>
                                                            <th class="th-price">
                                                                USD
                                                            </th>
                                                            <th class="th-frequency">
                                                                Frequency
                                                            </th>
                                                            <th class="table-frequency center">
                                                                Next Charge Date
                                                            </th>
                                                            <th class="th-actions"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="re__subscriptions__subscription__item__1 re__subscriptions__subscription__itemcancelled-item" data-purchaseid="2982759">
                                                            <td class="re__subscriptions__subscription__item__product td-product">
                                                                <span style="text-decoration: line-through;">
																		Original Crew - Monthly Subscription - Men (Sizes 8-13)
																	</span>
                                                                <span style="color: red;">Cancelled</span>
                                                                <div style="color:#2b93ac;font-weight:bold" class="processing_message_4442274"></div>
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__qty td-amount">
                                                                1
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__price td-price">
                                                                12.00
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__schedule td-frequency">
                                                                1 Months
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__date td-next-charge-date">
                                                                -
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__actions td-actions">
                                                                <span class="re__subscriptions__subscription__item__activate">
																	<a href="#" data-item-id="4442274" class="action__reactivatePurchaseItem">Re-activate</a>
																</span>
                                                                <br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="re__subscriptions__subscription__4 re__subscriptions__subscription purchase-item">
                                            <p class="purchase-address">
                                                <strong>Ships To:</strong>
                                                <span class="re__subscriptions__subscription__address">
													<span class="re__subscriptions__subscription__address__address_1">
														7331 Paldao Dr
													</span>
	                                                <span class="re__subscriptions__subscription__address__address_2">
														,
													</span>
	                                                <span class="re__subscriptions__subscription__address__city">
														Dallas
													</span>
	                                                <span class="re__subscriptions__subscription__address__zipcode">
														75240
													</span>
	                                                <span class="re__subscriptions__subscription__address__edit">
														<a class="edit_address_link" href="/tools/recurring/purchase/2983134/2502403f40aa4df316fb1e5/address/edit/">Edit</a>
													</span>
	                                            </span>
                                            </p>
                                            <div class="table-responsive">
                                                <table class="re__subscriptions__subscription__items table">
                                                    <thead>
                                                        <tr id="hidden-header-ReCharge">
                                                            <th class="th-product">
                                                                Product
                                                            </th>
                                                            <th class="th-amount">
                                                                Amount
                                                            </th>
                                                            <th class="th-price">
                                                                USD
                                                            </th>
                                                            <th class="th-frequency">
                                                                Frequency
                                                            </th>
                                                            <th class="table-frequency center">
                                                                Next Charge Date
                                                            </th>
                                                            <th class="th-actions"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="re__subscriptions__subscription__item__1 re__subscriptions__subscription__itemcancelled-item" data-purchaseid="2983134">
                                                            <td class="re__subscriptions__subscription__item__product td-product">
                                                                <span style="text-decoration: line-through;">
																	Original Crew - Monthly Subscription - Men (Sizes 8-13)
																</span>
                                                                <span style="color: red;">Cancelled</span>
                                                                <div style="color:#2b93ac;font-weight:bold" class="processing_message_4442739"></div>
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__qty td-amount">
                                                                1
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__price td-price">
                                                                12.00
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__schedule td-frequency">
                                                                1 Months
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__date td-next-charge-date">
                                                                -
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__actions td-actions">
                                                                <span class="re__subscriptions__subscription__item__activate">
																	<a href="#" data-item-id="4442739" class="action__reactivatePurchaseItem">Re-activate</a>
																</span>
                                                                <br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="re__subscriptions__subscription__5 re__subscriptions__subscription purchase-item">
                                            <p class="purchase-address">
                                                <strong>Ships To:</strong>
                                                <span class="re__subscriptions__subscription__address">
													<span class="re__subscriptions__subscription__address__address_1">
														7331 Paldao Dr
													</span>
	                                                <span class="re__subscriptions__subscription__address__address_2">
														,
													</span>
	                                                <span class="re__subscriptions__subscription__address__city">
														Dallas
													</span>
	                                                <span class="re__subscriptions__subscription__address__zipcode">
														75240
													</span>
	                                                <span class="re__subscriptions__subscription__address__edit">
														<a class="edit_address_link" href="/tools/recurring/purchase/2987709/2502403f40aa4df316fb1e5/address/edit/">Edit</a>
													</span>
                                                </span>
                                            </p>
                                            <div class="table-responsive">
                                                <table class="re__subscriptions__subscription__items table">
                                                    <thead>
                                                        <tr id="hidden-header-ReCharge">
                                                            <th class="th-product">
                                                                Product
                                                            </th>
                                                            <th class="th-amount">
                                                                Amount
                                                            </th>
                                                            <th class="th-price">
                                                                USD
                                                            </th>
                                                            <th class="th-frequency">
                                                                Frequency
                                                            </th>
                                                            <th class="table-frequency center">
                                                                Next Charge Date
                                                            </th>
                                                            <th class="th-actions"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="re__subscriptions__subscription__item__1 re__subscriptions__subscription__itemcancelled-item" data-purchaseid="2987709">
                                                            <td class="re__subscriptions__subscription__item__product td-product">
                                                                <span style="text-decoration: line-through;">
																	Original Crew - Monthly Subscription - Men (Sizes 8-13)
																</span>
                                                                <span style="color: red;">Cancelled</span>
                                                                <div style="color:#2b93ac;font-weight:bold" class="processing_message_4448697"></div>
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__qty td-amount">
                                                                1
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__price td-price">
                                                                12.00
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__schedule td-frequency">
                                                                1 Months
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__date td-next-charge-date">
                                                                -
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__actions td-actions">
                                                                <span class="re__subscriptions__subscription__item__activate">
																	<a href="#" data-item-id="4448697" class="action__reactivatePurchaseItem">Re-activate</a>
																</span>
                                                                <br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="re__subscriptions__subscription__6 re__subscriptions__subscription purchase-item">
                                            <p class="purchase-address">
                                                <strong>Ships To:</strong>
                                                <span class="re__subscriptions__subscription__address">
													<span class="re__subscriptions__subscription__address__address_1">
														7331 Paldao Dr
													</span>
	                                                <span class="re__subscriptions__subscription__address__address_2">
														,
													</span>
	                                                <span class="re__subscriptions__subscription__address__city">
														Dallas
													</span>
	                                                <span class="re__subscriptions__subscription__address__zipcode">
														75240
													</span>
	                                                <span class="re__subscriptions__subscription__address__edit">
														<a class="edit_address_link" href="/tools/recurring/purchase/3365408/2502403f40aa4df316fb1e5/address/edit/">Edit</a>
													</span>
                                                </span>
                                            </p>
                                            <div class="table-responsive">
                                                <table class="re__subscriptions__subscription__items table">
                                                    <thead>
                                                        <tr id="hidden-header-ReCharge">
                                                            <th class="th-product">
                                                                Product
                                                            </th>
                                                            <th class="th-amount">
                                                                Amount
                                                            </th>
                                                            <th class="th-price">
                                                                USD
                                                            </th>
                                                            <th class="th-frequency">
                                                                Frequency
                                                            </th>
                                                            <th class="table-frequency center">
                                                                Next Charge Date
                                                            </th>
                                                            <th class="th-actions"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="re__subscriptions__subscription__item__1 re__subscriptions__subscription__itemcancelled-item" data-purchaseid="3365408">
                                                            <td class="re__subscriptions__subscription__item__product td-product">
                                                                <span style="text-decoration: line-through;">
																	Original Crew - Monthly Subscription - Men (Sizes 8-13)
																</span>
                                                                <span style="color: red;">Cancelled</span>
                                                                <div style="color:#2b93ac;font-weight:bold" class="processing_message_4949093"></div>
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__qty td-amount">
                                                                1
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__price td-price">
                                                                12.00
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__schedule td-frequency">
                                                                1 Months
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__date td-next-charge-date">
                                                                -
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__actions td-actions">
                                                                <span class="re__subscriptions__subscription__item__activate">
																	<a href="#" data-item-id="4949093" class="action__reactivatePurchaseItem">Re-activate</a>
																</span>
                                                                <br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="re__subscriptions__subscription__7 re__subscriptions__subscription purchase-item">
                                            <p class="purchase-address">
                                                <strong>Ships To:</strong>
                                                <span class="re__subscriptions__subscription__address">
													<span class="re__subscriptions__subscription__address__address_1">
														7331 Paldao Dr
													</span>
	                                                <span class="re__subscriptions__subscription__address__address_2">
														,
													</span>
	                                                <span class="re__subscriptions__subscription__address__city">
														Dallas
													</span>
	                                                <span class="re__subscriptions__subscription__address__zipcode">
														75240
													</span>
                                                	<span class="re__subscriptions__subscription__address__edit">
														<a class="edit_address_link" href="/tools/recurring/purchase/3493794/2502403f40aa4df316fb1e5/address/edit/">Edit</a>
													</span>
                                                </span>
                                            </p>
                                            <div class="table-responsive">
                                                <table class="re__subscriptions__subscription__items table">
                                                    <thead>
                                                        <tr id="hidden-header-ReCharge">
                                                            <th class="th-product">
                                                                Product
                                                            </th>
                                                            <th class="th-amount">
                                                                Amount
                                                            </th>
                                                            <th class="th-price">
                                                                USD
                                                            </th>
                                                            <th class="th-frequency">
                                                                Frequency
                                                            </th>
                                                            <th class="table-frequency center">
                                                                Next Charge Date
                                                            </th>
                                                            <th class="th-actions"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="re__subscriptions__subscription__item__1 re__subscriptions__subscription__itemcancelled-item" data-purchaseid="3493794">
                                                            <td class="re__subscriptions__subscription__item__product td-product">
                                                                <span style="text-decoration: line-through;">
																	Original Crew - Monthly Subscription - Men (Sizes 8-13)
																</span>
                                                                <span style="color: red;">Cancelled</span>
                                                                <div style="color:#2b93ac;font-weight:bold" class="processing_message_5138217"></div>
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__qty td-amount">
                                                                1
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__price td-price">
                                                                12.00
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__schedule td-frequency">
                                                                1 Months
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__date td-next-charge-date">
                                                                -
                                                            </td>
                                                            <td class="re__subscriptions__subscription__item__actions td-actions">
                                                                <span class="re__subscriptions__subscription__item__activate">
																	<a href="#" data-item-id="5138217" class="action__reactivatePurchaseItem">Re-activate</a>
																</span>
                                                                <br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div id="inactive_customer_text"></div>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modal-move-purchase-item"></div>
                <div id="rc_notification"><span class="message-notification"></span></div>
                <script>
	                var loadScript = function(url, callback) {
	                    var script = document.createElement("script");
	                    script.type = "text/javascript";
	                    // If the browser is Internet Explorer.
	                    if (script.readyState) {
	                        script.onreadystatechange = function() {
	                            if (script.readyState == "loaded" || script.readyState == "complete") {
	                                script.onreadystatechange = null;
	                                callback();
	                            }
	                        };
	                        // For any other browser.
	                    } else {
	                        script.onload = function() {
	                            callback();
	                        };
	                    }
	                    script.src = url;
	                    document.getElementsByTagName("head")[0].appendChild(script);
	                };
                </script>
                <script>
	                var reChargeJS = function($) {
	                    function rc_createCookie(name, value, days) {
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

	                    function rc_readCookie(name) {
	                        var nameEQ = encodeURIComponent(name) + "=";
	                        var ca = document.cookie.split(';');
	                        for (var i = 0; i < ca.length; i++) {
	                            var c = ca[i];
	                            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
	                            if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
	                        }
	                        return null;
	                    }

	                    function rc_deleteCookie(name) {
	                        rc_createCookie(name, "", -1);
	                    }
	                    var notify_timeout = false;

	                    function rc_showErrorNotification(message, disable_timeout) {
	                        $('#rc_notification').css({ 'background': '#FE2E2E' });
	                        $('#rc_notification .message-notification').html(message);
	                        $('#rc_notification').animate({
	                            height: '86px'
	                        }, 100);
	                        if (notify_timeout) {
	                            clearTimeout(notify_timeout);
	                        }
	                        if (!disable_timeout) {
	                            notify_timeout = setTimeout(function() {
	                                $('#rc_notification').animate({
	                                    height: '0'
	                                }, 100);
	                            }, 3000);
	                        }
	                    }

	                    function rc_showNotification(message, disable_timeout) {
	                        $('#rc_notification').css({ 'background': '#43AC6A' });
	                        $('#rc_notification .message-notification').html(message);
	                        $('#rc_notification').animate({
	                            height: '86px'
	                        }, 100);
	                        if (notify_timeout) {
	                            clearTimeout(notify_timeout);
	                        }
	                        if (!disable_timeout) {
	                            notify_timeout = setTimeout(function() {
	                                $('#rc_notification').animate({
	                                    height: '0'
	                                }, 100);
	                            }, 3000);
	                        }
	                    }

	                    function rc_showNotificationAfterReload(message) {
	                        rc_createCookie("success_msg", message);
	                    }

	                    function rc_showErrorNotificationAfterReload(message) {
	                        rc_createCookie("error_msg", message);
	                    }

	                    function showErrorNotification(message, disable_timeout) {
	                        rc_showErrorNotification(message, disable_timeout);
	                    }

	                    function showNotification(message, disable_timeout) {
	                        rc_showNotification(message, disable_timeout);
	                    }

	                    function showErrorNotificationAfterReload(message) {
	                        rc_showErrorNotificationAfterReload(message);
	                    }

	                    function showNotificationAfterReload(message) {
	                        rc_showNotificationAfterReload(message);
	                    }
	                    $(function() {
	                        var success_msg = rc_readCookie("success_msg");
	                        if (success_msg) {
	                            rc_showNotification(success_msg);
	                            rc_deleteCookie("success_msg");
	                        }
	                        var error_msg = rc_readCookie("error_msg");
	                        if (error_msg) {
	                            rc_showErrorNotification(error_msg);
	                            rc_deleteCookie("error_msg");
	                        }
	                        $(document).on('change', '#ReCharge-Mobile-Nav', function(e) {
	                            var page_url = $(this).find("option:selected").val()
	                            window.location.href = page_url;
	                        });
	                    });

	                    function reactivatePurchaseItem(item_id) {
	                        if (window.lock == 'locked') {
	                            $('.processing_message_' + item_id).text('Still working... Please wait');
	                            return false;
	                        }
	                        window.lock = "locked";
	                        $('.processing_message_' + item_id).text('Reactivating Item...');
	                        $.post("/tools/recurring/purchase_item/activate/" + item_id, function(response) {
	                            alert($.parseJSON(response).message);
	                            window.location.reload();
	                        });
	                    }

	                    function cancelPurchase(purchase_id) {
	                        if (!confirm('Are you sure you want to cancel this subscription?')) {
	                            return false;
	                        } else {
	                            if (window.lock == 'locked') { showNotification('Still working'); return false; } else { window.lock = "locked"; }
	                        }
	                        $.get("/tools/recurring/purchase/" + purchase_id + "/cancel/", function(response) {
	                            window.location.reload();
	                        });
	                    }
	                    /* Cancel Subscription */
	                    function cancelPurchaseItem(item_id) {
	                        if (window.lock == 'locked') { showNotification('Still working'); return false; } else { window.lock = "locked"; }
	                        if (confirm('Are you sure you want to pause this product? Item deliveries will be stopped until reactivated.')) {
	                            data = {
	                                'purchase_item_id': item_id
	                            };
	                            url = "/tools/recurring/purchase_item/cancel/";
	                            $.ajax({
	                                type: 'POST',
	                                url: url,
	                                data: data,
	                                success: function() {
	                                    showNotification('Item has been paused');
	                                    window.setTimeout(function() {
	                                        window.location.reload();
	                                    }, 600);
	                                }
	                            })
	                        } else {
	                            window.lock = "open";
	                        }
	                    }

	                    function reactivatePurchaseItem(item_id) {
	                        if (window.lock == 'locked') { showNotification('Still working'); return false; } else { window.lock = "locked"; }
	                        showNotification('Reactivating Item');
	                        $.post("/tools/recurring/purchase_item/activate/" + item_id, function(response) {
	                            alert($.parseJSON(response).message);
	                            showNotification('Item has been activated');
	                            window.setTimeout(function() {
	                                window.location.reload();
	                            }, 600);
	                        });
	                    }

	                    function logicDelete(item_id) {
	                        if (!confirm('Are you sure you want to delete this item?')) {
	                            return false;
	                        } else {
	                            if (window.lock == 'locked') { showNotification('Still working'); return false; } else { window.lock = "locked"; }
	                        }
	                        $.post("/tools/recurring/purchase_item/" + item_id + "/logic_delete", function(response) {
	                            window.location.reload();
	                        });
	                    }

	                    function moveItem(item_id) {
	                        if (window.lock == 'locked') { showNotification('Still working'); return false; } else { window.lock = "locked"; }
	                        $.get("/subscriptions/" + item_id + "/move_to_purchase", function(response) {
	                            $("#modal-move-purchase-item").html(response.html);
	                            $("#modal-move-purchase-item").on('click', '.btn.btn-primary', function(e) {
	                                e.preventDefault();
	                                if (window.lock == 'locked') { showNotification('Still working'); return false; } else { window.lock = "locked"; }
	                                if ($(this).closest('form').valid()) {
	                                    if ($(this).closest("form").find("select option:selected").data("current") == "0") {
	                                        $.post("/subscriptions/" + item_id + "/move_to_purchase", $(this).closest('form').serialize(), function(response) {
	                                            if (response.status == "success") {
	                                                window.location.reload();
	                                            } else {
	                                                showErrorNotification(response.msg);
	                                                window.lock = "open";
	                                            }
	                                        }, 'json');
	                                    } else {
	                                        $.post("/purchase_item/" + item_id + "/change_next_queued_charge_date_of_item_within_same_purchase/" + $(this).closest("form").find("input[name='first_charge_date']").val(), function(response) {
	                                            if (response.status == "success") {
	                                                window.location.reload();
	                                            } else {
	                                                showErrorNotification(response.msg);
	                                                window.lock = "open";
	                                            }
	                                        }, 'json');
	                                    }
	                                } else {
	                                    window.lock = "open";
	                                }
	                            });
	                            $("#edit-properties-modal-" + item_id).on('shown.bs.modal', function() {
	                                window.lock = "open";
	                            });
	                            $("#edit-properties-modal-" + item_id).modal('show');
	                            $("#modal-move-purchase-item form").validate();
	                        }, 'json');
	                    }

	                    function cancelPurchase(purchase_id) {
	                        if (!confirm('Are you sure you want to cancel this subscription?')) {
	                            return false;
	                        } else {
	                            if (window.lock == 'locked') { showNotification('Still working'); return false; } else { window.lock = "locked"; }
	                        }
	                        $.get("/tools/recurring/purchase/" + purchase_id + "/cancel/", function(response) {
	                            window.location.reload();
	                        });
	                    }

	                    function removeDiscount(purchase_id) {
	                        var confirmation_message = "Are you sure you want to remove this discount? It will not be applied to future orders.";
	                        var discount_valid = false;
	                        if (discount_valid) {
	                            confirmation_message += " However, you can apply it later.";
	                        }
	                        if (!confirm(confirmation_message)) {
	                            return false;
	                        }
	                        if (window.lock == 'locked') { showNotification('Still working'); return false; } else { window.lock = "locked"; }
	                        $.post("/tools/recurring/purchase/" + purchase_id + "/remove_discount_code/", function(response) {
	                            if (response.status == "success") {
	                                showNotificationAfterReload('Discount removed successfully');
	                                window.location.reload();
	                            } else {
	                                showErrorNotification('This code did not match any active discount. Was it entered correctly?');
	                            }
	                        }, 'json');
	                        return false;
	                    }

	                    function applyDiscount(purchase_id) {
	                        if (window.lock == 'locked') { showNotification('Still working'); return false; } else { window.lock = "locked"; }
	                        var discount_code = $('.discount-form-' + purchase_id + ' #discount_code').val();
	                        var data = {
	                            "discount_code": discount_code
	                        };
	                        $.post("/tools/recurring/purchase/" + purchase_id + "/edit_discount_code/", data, function(response) {
	                            if (response.status == "success") {
	                                window.lock = 'open';
	                                showNotificationAfterReload('Discount applied successfully');
	                                window.location.reload();
	                            } else {
	                                window.lock = 'open';
	                                showErrorNotification('This code did not match any active discount. Was it entered correctly?');
	                                $(".discount-form-" + purchase_id).hide();
	                                $(".discount-button-" + purchase_id).show();
	                                $(".discount-form-" + purchase_id + " input").val("");
	                            }
	                        }, 'json');
	                        return false;
	                    }

	                    function showDiscountInput(purchase_id) {
	                        var element = $(".discount-form-" + purchase_id);
	                        element.show();
	                    }
	                    $(function() {
	                        // Prevent triggers/actions from reloading the page or submitting forms
	                        $(document).on('click', '.action__moveItem', function(e) {
	                            e.preventDefault();
	                            var item_id = $(this).data('item-id');
	                            moveItem(item_id);
	                        });
	                        $(document).on('click', '.action__logicDelete', function(e) {
	                            e.preventDefault();
	                            var item_id = $(this).data('item-id');
	                            logicDelete(item_id);
	                        });
	                        $(document).on('click', '.action__cancelPurchase', function(e) {
	                            e.preventDefault();
	                            var purchase_id = $(this).data('purchase-id');
	                            cancelPurchase(purchase_id);
	                        });
	                        $(document).on('click', '.action__reactivatePurchaseItem', function(e) {
	                            e.preventDefault();
	                            var item_id = $(this).data('item-id');
	                            reactivatePurchaseItem(item_id);
	                        });
	                        $(document).on('click', '.action__removeDiscount', function(e) {
	                            e.preventDefault();
	                            var purchase_id = $(this).data('purchase-id');
	                            removeDiscount(purchase_id);
	                        });
	                        $(document).on('click', '.action__applyDiscount', function(e) {
	                            e.preventDefault();
	                            var purchase_id = $(this).data('purchase-id');
	                            applyDiscount(purchase_id);
	                        });
	                        $(document).on('click', '.action__showDiscountInput', function(e) {
	                            e.preventDefault();
	                            var purchase_id = $(this).data('purchase-id');
	                            $(this).hide();
	                            showDiscountInput(purchase_id);
	                        });
	                        // Customer Portal link
	                        $(document).on('click', '#get_customer_portal_link', function(e) {
	                            e.preventDefault();
	                            $(this).hide();
	                            $('#customer_portal_link').show();
	                        });
	                    });
	                }
	                if ((typeof(jQuery) == "undefined") || (parseInt(jQuery.fn.jquery) === 1 && parseFloat(jQuery.fn.jquery.replace(/^1\./, '')) < 9.1)) {
	                    loadScript("//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", function() {
	                        loadScript("https://rechargeassets-bootstrapheroes-rechargeapps.netdna-ssl.com/static/js/vendors.min.js?t=1501083655", function() {
	                            loadScript("https://rechargeassets-bootstrapheroes-rechargeapps.netdna-ssl.com/static/js/proxy.min.js?t=1501083655", function() {
	                                jQuery191 = jQuery.noConflict(true);
	                                reChargeJS(jQuery191);
	                            });
	                        });
	                    });
	                } else {
	                    loadScript("https://rechargeassets-bootstrapheroes-rechargeapps.netdna-ssl.com/static/js/vendors.min.js?t=1501083655", function() {
	                        loadScript("https://rechargeassets-bootstrapheroes-rechargeapps.netdna-ssl.com/static/js/proxy.min.js?t=1501083655", function() {
	                            reChargeJS(jQuery);
	                        });
	                    });
	                }
                </script>
                <script>
	                (function(i, s, o, g, r, a, m) {
	                    i['GoogleAnalyticsObject'] = r;
	                    i[r] = i[r] || function() {
	                        (i[r].q = i[r].q || []).push(arguments)
	                    }, i[r].l = 1 * new Date();
	                    a = s.createElement(o),
	                        m = s.getElementsByTagName(o)[0];
	                    a.async = 1;
	                    a.src = g;
	                    m.parentNode.insertBefore(a, m)
	                })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
	                ga('create', 'UA-96176346-3', 'auto');
	                ga('require', 'displayfeatures');
	                ga('send', 'pageview');
                </script>
<?php include('footer.php'); ?>