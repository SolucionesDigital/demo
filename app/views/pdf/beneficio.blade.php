<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Imprime tu Beneficio</title>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<style type="text/css">
			body {
				width:100% !important;
				padding:0;
				margin:0;
				text-align:left !important;
				font-family: 'Open Sans', sans-serif;
			}
			h1, h2, h3, h4, h5, h6, p, a { margin:0; padding:0; }
			h1,h2,h3,h4,h5,h6 { font-weight:normal;color:#999; }
			h1  { color:#999; font-size:30px; line-height:38px; margin-bottom:8px; }
			h2  { color:#999; font-size:24px; line-height:28px; margin-bottom:5px; }
			p   { color:#666; font-size:14px; line-height:21px; font-weight:normal; }
			img { display:block; line-height:0; }
			a 	{ color:#57acd6; }
		</style>
	</head>
	<body style="margin:0; padding:0; width:100%;">

	<table cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;border-collapse:collapse; width: 100% !important; padding:0; margin:0; text-align:left;">

		<!-- Header -->
		<tr style="height:400px;">
			<td>
				<table cellpadding="0" cellspacing="0" width="600px" height="65px" align="center" style="margin-top:10px; margin-bottom:10px;">
					<tr>
						<td height="5px"></td>
					</tr>
					<tr>

						<td vertical-align="center">
							<p style="font-size: 24px; font-weight:300; text-align:left; color: #008300; display:inline;">¡Disfruta de tu Beneficio!</p>
						</td>
						<td width="110px">
							<img style="display:inline;" src="{{ asset('images/imss-logo_sm.jpg') }}" alt="Imss"/>
						</td>
					</tr>
				</table>
				<table style="width:600px;" align="center">
					<tr>
						<td style="width:600px; height:1px; border-bottom: solid 1px #ededed;"></td>
					</tr>
				</table>
			</td>
		</tr>
		<!-- fin Header -->

		<!-- contenido beneficio  -->
		<tr>
			<td>
				<table cellpadding="0" cellspacing="0" width="600px" align="center" style="table-layout:fixed;border-collapse:collapse; border-spacing:0px;">
					<tbody>
						<tr>
							<td width="300px" style="vertical-align: top; padding-top: 20px; padding-right:20px;">
							    <img style="border: solid 1px #ededed; display:block;line-height:0;" src="{{ asset($benefit->featured_image) }}" alt="{{ $benefit->title }}">
							</td>

							<td>
								<table>
									<!-- TITULO BENEFICIO -->
									<tr>
										<td style="border-bottom: solid 1px #ededed; padding-top:20px; padding-bottom:20px; font-weight:700; color:#106858; font-size:24px;">
										{{ $benefit->title }}
										</td>
									</tr>

									<!-- VALIDEZ -->
									<tr>
										<td style="padding-top:10px; padding-bottom:20px; font-weight:700; color:#75AF1D; font-size:13px;">
											Válido del: {{ $benefit->valid_from }}<br />
											Hasta: {{ $benefit->valid_to }}
										</td>
									</tr>

									<!--DESCRIPCIÓN -->
									<tr>
										<td>
											<p>
											    {{ $benefit->content }}
											</p>
										</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
							<table cellpadding="0" cellspacing="0" align="center" style="border: solid 1px #dddddd; margin-top:30px; margin-bottom:10px; background:#efefef; width:600px;">

								<tr>
									<td style="width=10px;">&nbsp;</td>
									<!--TERMINOS Y CONDICIONES-->
									<td vertical-align="top" style="width=320px;line-height:15px;">
										<table style="width:420px">
											<tr>
												<td>
													<p style="color:#808184;font-size:9px; font-weight:bold;">Token:{{ $redeem_token }}</p>
													<p style="color:#808184;font-size:9px; font-weight:bold;">Beneficio ID:{{ $benefit->id }}</p><br/>
													<p style="color:#808184;font-size:9px;">Términos y condiciones:
                                                        {{ $benefit->legal }}
													</p>
												</td>
											</tr>
										</table>
									</td>

									<!--QR CODE-->
									<td style="width=150px;">
										<!-- https://developers.google.com/chart/infographics/docs/qr_codes?csw=1 -->
										<?php $redeemUrl = route('benefits.redeem', [$benefit->id]) . "?redeem_token={$redeem_token}"; ?>
										<img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $redeemUrl; ?>&choe=UTF-8" />
									</td>
									<td style="width=10px;">&nbsp;</td>
								</tr>
							</table>
						</tr>



					</tbody>

				</table>
				<!--FOOTER-->
				<table cellpadding="0" cellspacing="0" width="600px" align="center" style="table-layout:fixed;border-collapse:collapse;">
					<tr><td height="10px"></td></tr>
					<tr>
						<td>
							<p style="color:#808184;font-size:9px;">Copyright &copy; SolucionesDigital 2014. Derechos reservados. Beneficio generado el día: <?php echo date('d-m-Y'); ?></p>
						</td>
					</tr>
					<tr><td height="20px"></td></tr>
				</table>
			</td>
		</tr>
	</table>
	</body>
</html>