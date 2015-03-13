{{ $order->id }} <br />
{{ $order->customer }} <br />
{{ $order->status }} <br />

<hr />
<table>
    <tr>
        <th>Category</th>
        <th>Brand</th>
        <th>Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Subtotal</th>
        <th>Product Desc.</th>
        <th>Customer Specs</th>
    </tr>
@foreach( $orderitems as $item )
<?php
    $product = Product::find( $item->product );
    $brand = Brand::find( $product->brand );
    $cat = Category::find( $product->category );
    $subtotal = $item->quantity * $product->price;
?>
    <tr>
        <td>{{ $cat->category_name }}</td>
        <td>{{ $brand->brand }}</td>
        <td>{{ $product->name }}</td>
        <td>${{ $product->price }}</td>
        <td>{{ $item->quantity }}</td>
        <td>${{ $subtotal }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $item->description }}</td>

    </tr>
@endforeach
</table>
