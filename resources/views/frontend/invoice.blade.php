
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Favicon -->
		<link rel="icon" href="./images/favicon.png" type="image/x-icon" />

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title">
									<img src="{{asset('/front/images/logo/logo_1x.png')}}" alt="Stwoo" style="width: 100%; max-width: 300px" />
								</td>

								<td>

									Invoice #:{{$billing_info->first()->order_id}}<br />
									Created: {{$billing_info->first()->created_at->format('Y-m-d')}}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td width='150'>
									{{$billing_info->first()->address}}
								</td>

								<td>
									{{$billing_info->first()->company}}<br />
									{{$billing_info->first()->name}}<br />
									{{$billing_info->first()->email}}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>
                    <td colspan="4">
                      @php
                          if ($order_info->first()->payment_method==1) {
                              echo'Cash On Delivery';
                          }
                          else if ($order_info->first()->payment_method==2) {
                              echo'SSL';
                          }
                          else if ($order_info->first()->payment_method==3) {
                              echo'Stripe';
                            }
                            @endphp

                    </td>
				</tr>
                <tr height='20'>
                </tr>

				<tr class="heading">
					<td>Item</td>
					<td>Price</td>
					<td>Quantity</td>
					<td>Total</td>
				</tr>
                @php
                $total=0;
                @endphp
                @foreach ($product_info as $product_info )
				<tr class="item">
                    <td>{{$product_info->product_name}}</td>
					<td>{{$product_info->product_price}}</td>
					<td>{{$product_info->quantity}}</td>
					<td>{{$product_info->product_price*$product_info->quantity}}</td>
				</tr>
                @php
                    $total += $product_info->product_price*$product_info->quantity;
                @endphp
                @endforeach
                <tr>
                    <td height='30'></td>
                </tr>
				<tr class="total" >
					<td></td>
					<td colspan="4" > SubTotal :  {{$total}} </td>
				</tr>
                <tr class="total" >
					<td></td>
					<td colspan="4" >Discount : {{$order_info->first()->discount}} % </td>
				</tr>
                <tr class="total" >
					<td></td>
					<td colspan="4" > Delivery Charge : {{$order_info->first()->delivery_charge}} </td>
				</tr>
                <tr class="total" >
                    <tr class="heading">
                        <td></td>
                        <td colspan="4">
                              Total : {{$order_info->first()->total}}
                        </td>
                    </tr>
				</tr>
			</table>
		</div>
	</body>
</html>
