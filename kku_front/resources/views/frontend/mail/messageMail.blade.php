<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <title>Email title</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace !important;
            color: black !important;
            font-size: 18px;
        }
        .btn {
            background-color: black;
            height: 3rem;
            cursor: pointer;
            text-align: center;
            padding-inline: 4rem;
        }
        a {
            color: white !important;
            text-decoration: none;
        }
    </style>
</head>
<body class="body" style="margin: 0;">
  <div role="article" aria-roledescription="email" aria-label="email name" lang="en" style="font-size:1rem; background-color: #E4E4E4; height: 100%">
    <table role="presentation" align="center" bgcolor="#E4E4E4" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td valign="top" style="text-align: center;">
			<div class="over-mob" style="max-height:0; margin: 0 auto; text-align: center;">
				<img class="reset" height="300" border="0" alt="" style="width: 100%;vertical-align: middle;background-color:#B17036;"/>
			</div>
            <img src="<?php echo(\Request::root());?>/{{ $web_info->detail->image_1->link }}" style="margin-top: 1rem; margin-bottom: 0.5rem; max-width:97%" alt="">
			<table role="presentation" class="faux-absolute reset" align="center" border="0" cellpadding="0" cellspacing="0" width="650" style="position:relative; opacity:0.999;padding: 2rem;">
                <tr>
                    <td valign="top">
                        <table role="presentation" style="text-align: left;" class="hero-textbox" border="0" cellpadding="0" cellspacing="0" width="80%" bgcolor="#FFFFFE" align="center">
                            <tr>
                                <td valign="top" style="padding: 5px 40px;">
                                    <h1 style="margin: 0; font-size:2em; color:#222222; mso-line-height-rule: exactly; line-height: 1.5; text-align:center;">
                                        Confirm Send Message
                                    </h1>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" style="padding: 5px 40px;">
                                    <div class="">
                                        <span style="margin: 0; font-size:1em; color:#222222; mso-line-height-rule: exactly; line-height: 1.5;">
                                        <h3>Hi {{$nameCustomer}}, </h3>
                                        <p>We have received your message and will get back to you promptly</p>
                                        <p>This is an automated message. Please do not reply</p>
                                        <h4>Thanks, the Thaiwellhealth support team</h4>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
			</table>
			</td>
		</tr>
    </table>
  </div>
</body>
</html>
