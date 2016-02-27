<?php
use yii\helpers\Html;
 
/* @var $this yii\web\View */
/* @var $user app\modules\user\models\User */
 

?>
 

<body style="margin: 0; padding: 0;">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td style="padding-top:25px;">

					<!-- Header Start -->
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
						<tr>
							<td>
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<tr>
										<td>
											<table align="left" border="0" cellpadding="0" cellspacing="0" width="200" style="border-collapse: collapse;">
												<!-- logo -->
												<tr>
													<td align="left">
														<a href="http://admin.devsym.ru/web/index.php">
															<img src="http://admin.devsym.ru/web/images/logo.png" alt="RoJJoR" style="display: block;"/>
														</a>
													</td>
												</tr>
												<!-- company slogan -->
												<tr>
													<td width="100%" align="left" style="font-size: 12px; line-height: 18px; font-family:helvetica, Arial, sans-serif; color:#999999;">	
														Smart idea for success all over the world
													</td>
												</tr>									
												<!-- Space -->
												<tr><td style="font-size: 0; line-height: 0;" height="15">&nbsp;</td></tr>
											</table>
											<table align="right" border="0" cellpadding="0" cellspacing="0" width="350" style="border-collapse: collapse;">
												<tr>
													<td  height="75" style="text-align: right; vertical-align: middle;">
														<a href="#" style="font-family:helvetica, Arial, sans-serif; color: #666666; font-size: 12px; font-weight: bold; text-decoration: none;">SERVICES</a> &nbsp;&nbsp;
														<a href="#" style="font-family:helvetica, Arial, sans-serif; color: #666666; font-size: 12px; font-weight: bold; text-decoration: none;">FAQ</a> &nbsp;&nbsp;
														<a href="#" style="font-family:helvetica, Arial, sans-serif; color: #666666; font-size: 12px; font-weight: bold; text-decoration: none;">NEWS</a> &nbsp;&nbsp;
														<a href="#" style="font-family:helvetica, Arial, sans-serif; color: #666666; font-size: 12px; font-weight: bold; text-decoration: none;">CONTACT</a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- Header End -->

					<!-- Banner Start -->
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
						<tr>
							<td>
								<table bgcolor="#fafafa" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<tr>
										<td>
											
											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<tr>
													<td>
														<!-- Space -->
														<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
															<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
														</table>
														<table align="center" border="0" cellpadding="0" cellspacing="0" width="540" style="border-collapse: collapse;">
															<tr>
																<td>
																	<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
																		<tr>
																			<td width="100%" align="left" style="font-size: 28px; line-height: 34px; font-family:helvetica, Arial, sans-serif; font-weight: bold; color:#343434;">
																				Hello, <?= Html::encode($user->username) ?>!
																			</td>
																		</tr>
																	</table>
																	<table align="left" border="0" cellpadding="0" cellspacing="0" width="75%" style="border-collapse: collapse;">
																		<!-- Space -->
																		<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
																		<tr>
																			<td width="100%" align="left" style="font-size: 15px; line-height: 22px; font-family:helvetica, Arial, sans-serif; color:#666666;">
<?php
if ($order->status == 2) {
	echo "Please edit your order and send to modaration";
}
if ($order->status == 3) {
	echo "Your order is active";
}
?>																			
																				
																			</td>
																		</tr>
																	</table>
																	
																</td>
															</tr>
														</table>
														<!-- Space -->
														<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
															<tr><td style="font-size: 0; line-height: 0;" height="30">&nbsp;</td></tr>				
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- Banner End -->

					

					<!-- Footer Start -->
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
						<tr>
							<td>
								<table bgcolor="#262626" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<tr>
										<td>
											<!-- Space -->
											<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
												<tr><td style="font-size: 0; line-height: 0;" bgcolor="#3a3a3a" height="1">&nbsp;</td></tr>
												<tr><td style="font-size: 0; line-height: 0;" height="30">&nbsp;</td></tr>
											</table>
											<table align="center" border="0" cellpadding="0" cellspacing="0" width="540" style="border-collapse: collapse;">
												<tr>
													<td>
														<!-- First Column -->
														<table align="left" border="0" cellpadding="0" cellspacing="0" width="250" style="border-collapse: collapse;">
															<tr>
																<td>
																	<a href="http://admin.devsym.ru/web/index.php">
																		<img src="http://admin.devsym.ru/web/images/logo_footer.png" alt="Logo" style="display: block;"/>
																	</a>
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
															<tr>
																<td style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">
																	Lorem ipsum dolor sit amet, consect tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven.
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="15">&nbsp;</td></tr>
															<tr>
																<td>
																	<table align="left" border="0" cellpadding="0" cellspacing="0" width="55" style="border-collapse: collapse;">
																		<tr>
																			<td>
																				<a href="https://www.facebook.com">
																					<img src="http://admin.devsym.ru/web/images/email/facebook-icon.png"  alt="Facebook" style="display: block;" />
																				</a>
																			</td>
																		</tr>
																	</table>
																	<table align="left" border="0" cellpadding="0" cellspacing="0" width="55" style="border-collapse: collapse;">
																		<tr>
																			<td>
																				<a href="https://www.twitter.com">
																					<img src="http://admin.devsym.ru/web/images/email/twitter-icon.png"  alt="Twitter" style="display: block;" />
																				</a>
																			</td>
																		</tr>
																	</table>
																	<table align="left" border="0" cellpadding="0" cellspacing="0" width="55" style="border-collapse: collapse;">
																		<tr>
																			<td>
																				<a href="https://plus.google.com/">
																					<img src="http://admin.devsym.ru/web/images/email/googleplus-icon.png"  alt="Google+" style="display: block;" />
																				</a>
																			</td>
																		</tr>
																	</table>
																	<table align="left" border="0" cellpadding="0" cellspacing="0" width="55" style="border-collapse: collapse;">
																		<tr>
																			<td>
																				<a href="https://www.linkedin.com/">
																					<img src="http://admin.devsym.ru/web/images/email/linkedin-icon.png"  alt="Linked In" style="display: block;" />
																				</a>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
														<!-- Gutter 20px -->
														<table align="left" border="0" cellpadding="0" cellspacing="0" width="40" style="border-collapse: collapse;">
															<tr>
																<td>
																	&nbsp;
																</td>
															</tr>
														</table>
														<!-- Second Column -->
														<table align="left" border="0" cellpadding="0" cellspacing="0" width="250" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="69">&nbsp;</td></tr>
															<tr>
																<td width="22">
																	<img src="http://admin.devsym.ru/web/images/email/images/marker-icon.png" alt="location" />
																</td>
																<td style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">One infinity loop, 54100</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td width="22">
																	<img src="http://admin.devsym.ru/web/images/email/images/phone-icon.png" alt="location" />
																</td>
																<td style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">+12&nbsp;1234&nbsp;1234&nbsp;123</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td width="22">
																	<img src="http://admin.devsym.ru/web/images/email/images/fax-icon.png" alt="location" />
																</td>
																<td style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">+12&nbsp;1234&nbsp;1234&nbsp;123</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td width="22">
																	<img src="http://admin.devsym.ru/web/images/email/images/mail-icon.png" alt="location" />
																</td>
																<td>
																	<a style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif; text-decoration:none;" href="mailto:idea@mail.com">idea@mail.com</a>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<!-- Space -->
											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<tr><td style="font-size: 0; line-height: 0;" height="30">&nbsp;</td></tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>

					</table>
					<!-- Footer End -->

					<!-- Subfooter Start -->
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
						<tr>
							<td>
								<table bgcolor="#000000" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<tr>
										<td>
											<!-- Space -->
											<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
												<tr><td style="font-size: 0; line-height: 0;" bgcolor="#333333" height="1">&nbsp;</td></tr>
												<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
											</table>
											<table align="center" border="0" cellpadding="0" cellspacing="0" width="540" style="border-collapse: collapse;">
												<tr>
													<td align="center" style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">
														Copyright © 2015 RoJJoR. All Rights Reserved.
													</td>
												</tr>
											</table>
											<!-- Space -->
											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>

					</table>
					<!-- Subfooter End -->
			

				</td>
			</tr>
		</table>
	</body>