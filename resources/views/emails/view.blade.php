<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Contact Form Email Message</title>
        <style type="text/css">
        body {margin: 0; padding: 0; min-width: 100%!important;}
        .content {width: 100%; max-width: 600px;}

		table{
			color: #666;
		}

        </style>
    </head>
    <body yahoo bgcolor="#f6f8f1">
        <table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td>
					<br><br>
					<table class="content" align="center" cellpadding="5" cellspacing="0" border="0">
                        <tr>
                            <th colspan="4">
                                <h2>Contact Form Message</h2>
							</th>
                        </tr>
						<tr>
                            <td style="width:10%">Name</td><td style="width:5%">:</td><td>{{$name}}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Email</td><td style="width:5%">:</td><td>{{$email}}</td>
                        </tr>
                        <tr>
                            <td style="width:10%">Phone</td><td style="width:5%">:</td><td>{{$phone}}</td>
                        </tr>
                        <tr>
                            <td style="width:10%; vertical-align: top;">Message</td><td style="width:5%">:</td><td>{{$msg}}</td>
						</tr>
                    </table>
                    <br><br><br>
                </td>
            </tr>
        </table>
    </body>
</html>
