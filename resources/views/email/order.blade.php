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
		<h4 style="color:red">Congratulations!</h4>
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

	</body>
</html>