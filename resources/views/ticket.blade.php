@if(array_key_exists("link1", $ticket_link) && array_key_exists("link2", $ticket_link) && array_key_exists("link3", $ticket_link) &&  array_key_exists("link4", $ticket_link))

       
     
       <h2 >Ticket for first trip:</h2>
            <br/>
      <img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
       <br/>
       Hello {{ $user_details['name'] }} thank you for choosing achantaxi, please click the buttons below to view your tickets
      
        <br/><br/>
       <button  style="outline:none;width:100px;height:50px;border-radius:5px"> <a href="{{ $ticket_link['link1'] }}" style="color:white"> View ticket</a></button>
       <br/>
       <h2 style="margin-top:4px">Ticket for second trip:</h2>
            <br/>
            <img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
       <br/>
       Hello {{ $user_details['name'] }}  thank you for choosing achantaxi, please click the buttons below to view your tickets
        <br/><br/>
       <button  style="outline: none;width:100px;height:50px;border-radius:5px"> <a href="{{ $ticket_link['link2'] }}" style="color:white">View ticket</a> </button>

       <br/>
       <h2 style="margin-top:4px">Ticket for third trip:</h2>
            <br/>
            <img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
       <br/>
       Hello {{ $user_details['name'] }}  thank you for choosing achantaxi, please click the buttons below to view your tickets
        <br/><br/>
       <button  style="outline:none;width:100px;height:50px;border-radius:5px"> <a href="{{ $ticket_link['link3'] }}" style="color:white"> View ticket</a></button>
       <br/>
       <h2 style="margin-top:4px">Ticket for forth trip:</h2>
            <br/>
            <img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
       <br/>
       Hello {{ $user_details['name'] }} , thank you for choosing achantaxi, please click the buttons below to view your tickets
        <br/><br/>
       <button  style="outline: none;width:100px;height:50px;border-radius:5px"> <a href="{{ $ticket_link['link4'] }}" style="color:white">View ticket</a> </button>
       


@elseif(array_key_exists("link1", $ticket_link) && array_key_exists("link2", $ticket_link))

       

<!-- © 2018 Shift Technologies. All rights reserved. -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-color:#00A859" id="bodyTable">
	<tbody>
		<tr>
			<td style="padding-right:10px;padding-left:10px;" align="center" valign="top" id="bodyCell">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperWebview" style="max-width:600px">
					<tbody>
						<tr>
							<td align="center" valign="top">
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperBody" style="max-width:600px">
					<tbody>
						<tr>
							<td align="center" valign="top">
								<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableCard" style="background-color:#fff;border-color:#00A859;border-style:solid;border-width:0 1px 1px 1px;">
									<tbody>
										<tr>
											<td style="background-color:#00d2f4;font-size:1px;line-height:3px" class="topBorder" height="3">&nbsp;</td>
										</tr>
										<tr>
											
										</tr>
										<tr>
											<td style="padding-bottom: 20px;" align="center" valign="top" class="imgHero">
												<a href="#" style="text-decoration:none" target="_blank">
													<img alt="" border="0" src="{{ asset('img/achanlogo.png') }}" style="width:100%;max-width:600px;height:auto;display:block;color: #f9f9f9;" width="600">
												</a>
											</td>
										</tr>
										<tr>
											<td style="padding-bottom: 5px; padding-left: 20px; padding-right: 20px;" align="center" valign="top" class="mainTitle">
												<h2 class="text" style="color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:28px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0">Hello {{ $user_details['name'] }}</h2>
											</td>
										</tr>
										<tr>
											<td style="padding-bottom: 30px; padding-left: 20px; padding-right: 20px;" align="center" valign="top" class="subTitle">
												<h4 class="text" style="color:#999;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:24px;text-transform:none;text-align:center;padding:0;margin:0">View Your tickets</h4>
											</td>
										</tr>
										<tr>
											<td style="padding-left:20px;padding-right:20px" align="center" valign="top" class="containtTable ui-sortable">
												<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableDescription" style="">
													<tbody>
														<tr>
															<td style="padding-bottom: 20px;" align="center" valign="top" class="description">
																<p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;text-align:center;padding:0;margin:0">Thank you for choosing achantaxi please click the buttons bellow to view your ticket.</p>
															</td>
														</tr>
													</tbody>
												</table>
												<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableButton" style="">
													<tbody>
														<tr>
															<td style="padding-top:20px;padding-bottom:20px" align="center" valign="top">
																<table border="0" cellpadding="0" cellspacing="0" align="center">
																	<tbody>
																		<tr>
																			<td style="background-color:#00A859; padding: 12px 35px; border-radius: 50px;" align="center" class="ctaButton"> <a href="#" style="color:#fff;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:13px;font-weight:600;font-style:normal;letter-spacing:1px;line-height:20px;text-transform:uppercase;text-decoration:none;display:block" target="_blank" class="text">View ticket</a>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr>
											<td style="font-size:1px;line-height:1px" height="20">&nbsp;</td>
										</tr>
										<tr>
											<td align="center" valign="middle" style="padding-bottom: 40px;" class="emailRegards">
												<!-- Image and Link // -->
												<a href="#" target="_blank" style="text-decoration:none;">
													<img mc:edit="signature" src="http://email.aumfusion.com/vespro/img//other/signature.png" alt="" width="150" border="0" style="width:100%;
    max-width:150px; height:auto; display:block;">
												</a>
											</td>
										</tr>
									</tbody>
								</table>
								<table border="0" cellpadding="0" cellspacing="0" width="100%" class="space">
									<tbody>
										<tr>
											<td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperFooter" style="max-width:600px">
					<tbody>
						<tr>
							<td align="center" valign="top">
								<table border="0" cellpadding="0" cellspacing="0" width="100%" class="footer">
									<tbody>
										<tr>
											<td style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px" align="center" valign="top" class="socialLinks">
												<a href="#facebook-link" style="display:inline-block" target="_blank" class="facebook">
													<img alt="" border="0" src="http://email.aumfusion.com/vespro/img/social/light/facebook.png" style="height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px" width="40">
												</a>
												<a href="#twitter-link" style="display: inline-block;" target="_blank" class="twitter">
													<img alt="" border="0" src="http://email.aumfusion.com/vespro/img/social/light/twitter.png" style="height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px" width="40">
												</a>
												<a href="#pintrest-link" style="display: inline-block;" target="_blank" class="pintrest">
													<img alt="" border="0" src="http://email.aumfusion.com/vespro/img/social/light/pintrest.png" style="height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px" width="40">
												</a>
												<a href="#instagram-link" style="display: inline-block;" target="_blank" class="instagram">
													<img alt="" border="0" src="http://email.aumfusion.com/vespro/img/social/light/instagram.png" style="height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px" width="40">
												</a>
												<a href="#linkdin-link" style="display: inline-block;" target="_blank" class="linkdin">
													<img alt="" border="0" src="http://email.aumfusion.com/vespro/img/social/light/linkdin.png" style="height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px" width="40">
												</a>
											</td>
										</tr>
										<tr>
											<td style="padding: 10px 10px 5px;" align="center" valign="top" class="brandInfo">
												<p class="text" style="color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0">©&nbsp;Vespro Inc. | 800 Broadway, Suite 1500 | New York, NY 000123, USA.</p>
											</td>
										</tr>
										<tr>
											<td style="padding: 0px 10px 20px;" align="center" valign="top" class="footerLinks">
												<p class="text" style="color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0"> <a href="#" style="color:#bbb;text-decoration:underline" target="_blank">View Web Version </a>&nbsp;|&nbsp; <a href="#" style="color:#bbb;text-decoration:underline" target="_blank">Email Preferences </a>&nbsp;|&nbsp; <a href="#" style="color:#bbb;text-decoration:underline" target="_blank">Privacy Policy</a>
												</p>
											</td>
										</tr>
										<tr>
											<td style="padding: 0px 10px 10px;" align="center" valign="top" class="footerEmailInfo">
												<p class="text" style="color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0">If you have any quetions please contact us <a href="#" style="color:#bbb;text-decoration:underline" target="_blank">support@mail.com.</a>
													<br> <a href="#" style="color:#bbb;text-decoration:underline" target="_blank">Unsubscribe</a> from our mailing lists</p>
											</td>
										</tr>
										<tr>
											<td style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px" align="center" valign="top" class="appLinks">
												<a href="#Play-Store-Link" style="display: inline-block;" target="_blank" class="play-store">
													<img alt="" border="0" src="http://email.aumfusion.com/vespro/img/app/play-store.png" style="height:auto;margin:5px;width:100%;max-width:120px" width="120">
												</a>
												<a href="#App-Store-Link" style="display: inline-block;" target="_blank" class="app-store">
													<img alt="" border="0" src="http://email.aumfusion.com/vespro/img/app/app-store.png" style="height:auto;margin:5px;width:100%;max-width:120px" width="120">
												</a>
											</td>
										</tr>
										<tr>
											<td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>

















 Ticket for first trip:
      <br/>
<img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
 <br/>
 Hello {{ $user_details['name'] }}  thank you for choosing achantaxi, please click the buttons below to view your tickets
 
  <br/><br/>
 <button  style="outline:none;width:100px;height:50px;border-radius:5px"> <a href="{{ $ticket_link['link1'] }}" style="color:white"> View ticket</a></button>
 <br/>
 Ticket for second trip:
      <br/>
<img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
 <br/>
 Hello {{ $user_details['name'] }} thank you for choosing achantaxi, please click the buttons below to view your tickets
 <br/><br/>
 <button  style="outline: none;width:100px;height:50px;border-radius:5px"> <a href="{{ $ticket_link['link2'] }}"  style="color:white">View ticket</a> </button>

@else
      <br/>
      <img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
      <br/>
       Hello {{ $user_details['name'] }} , thank you for choosing achantaxi, please click the buttons below to view your tickets 
       <br/><br/>
       Ticket for your trip:
        <br/><br/>
       <button  style="outline: none;background-color:#0646A2;color:white"> <a href="{{ $ticket_link['link1'] }}">View ticket</a> </button>
      

@endif
    