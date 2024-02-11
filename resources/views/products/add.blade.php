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
    <title>Add Product</title>
</head>

<body>
    <div class="container">
        <h3>Product Manager</h3>
        <div class="col-md-12">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="product_name">

                    @error('product_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_description">Product Description</label>
                    <textarea name="product_description" id="product_description" class="form-control" cols="5" rows="2"></textarea>

                    @error('product_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_price">Product Price</label>
                    <input type="text" name="product_price" class="form-control" id="product_price">

                    @error('product_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_sku">Product SKU</label>
                    <input type="text" name="product_sku" class="form-control" id="product_sku">

                    @error('product_sku')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_qty">Product Qty</label>
                    <input type="number" name="product_qty" class="form-control" id="product_qty">

                    @error('product_qty')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_vendor">Product Vendor</label>
                    <input type="text" name="product_vendor" class="form-control" id="product_vendor">

                    @error('product_vendor')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_type">Product Type</label>
                    <input type="text" name="product_type" class="form-control" id="product_type">

                    @error('product_type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_image">Product Image</label>
                    <input type="file" name="product_image" class="form-control" id="product_image">

                    @error('product_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_tag">Product Tag</label>
                    <input type="text" name="product_tag" class="form-control" id="product_tag">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>