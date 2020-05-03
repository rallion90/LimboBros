<html>
<head>
	<style>
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
	</style>
</head>
	<body>
		<h4 style="color:red">Hello, {{ $customer_name }}</h4>
		
		<p>Your Order at Limbo Bros has been confirm. We Expect to received your item(s) within the next 2 working days.</p>
		
		<p>We will update you by your mobile number when your item arrives. You can check your order status anytime online using our Order Tracking Tool. Just click your Account Menu then click Track order and type your email and confirmation Number.</p>
		
		<p>Your Order Cofirmation number is: <strong>{{ $order_number }}</strong>. Please keep this number for tracking your orders.</p>
		<table>
		  <tr>
		    <th>Item</th>
		    <th>Price</th>
		    <th>Quantity</th>
		  </tr>
		@foreach($get_order2 as $items)  
		  <tr>
		    <td>{{ ucwords($items->product_name) }}</td>
		    <td>₱{{ number_format($items->product_price) }}.00</td>
		    <td>{{ $items->product_quantity }}</td>
		  </tr>
		@endforeach 
		  <tr>
		  	<td colspan="3">Total: ₱{{ number_format($total) }}.00</td>
		  </tr>
		</table>
		<br>
		<p>Please Click the Link below when you received your item. Thank you for your order.</p>
		<a href="http://127.0.0.1:8000/admin/order_recieved/{{ $order_number }}">Payment Delivered</a>

	</body>
</html>