<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>List Product</title>
</head>

<body>
    <div class="container mt-2">
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        <div class="row">
            <a href="{{ route('products.create') }}" class="btn btn-primary mr-2">Add Product</a>
            <a href="{{ route('rules.index') }}" class="btn btn-primary">Show Rule</a>
        </div>
        <h2>Product Manger</h2>
        <table class="table mt-2">
            <thead class="thead-dark">
                <tr>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                    <th>Product SKU</th>
                    <th>Product Qty</th>
                    <th>Product Vendor</th>
                    <th>Product Type</th>
                    <th>Product Image</th>
                    <th>Product Tag</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $product_data)
                <tr>
                    <td>{{$product_data->product_name}}</td>
                    <td>{{$product_data->product_description}}</td>
                    <td>{{$product_data->product_price}}</td>
                    <td>{{$product_data->product_sku}}</td>
                    <td>{{$product_data->product_qty}}</td>
                    <td>{{$product_data->product_vendor}}</td>
                    <td>{{$product_data->product_type}}</td>
                    <td>
                        <img src="{{asset('product/'.$product_data->product_image)}}" width="50" height="50" alt="" srcset="">
                    </td>
                    <td>{{$product_data->product_tag}}</td>
                    <td>
                        <a href="{{ route('products.edit', $product_data->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('products.destroy', $product_data->id) }}" method="post">
                            @csrf
                            @method('Delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>