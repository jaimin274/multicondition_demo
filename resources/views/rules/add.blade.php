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
    <title>Add Rules</title>
</head>

<body>
    <div class="container">
        <h3>Product Manager</h3>
        <div class="col-md-12">
            <form action="{{ route('rules.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="rule_name">Rule Name</label>
                    <input type="text" name="rule_name" class="form-control" id="rule_name">

                    @error('rule_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label>Rule Condition</label>
                <div class="form-group contain_div">
                    <div class="row main_contain">
                        <div class="col-3">
                            <select class="form-control" name="rule_selector[]" required>
                                <option value="">Choose Selector</option>
                                <option value="product_type">Type</option>
                                <option value="product_sku">SKU</option>
                                <option value="product_vendor">Vendor</option>
                                <option value="product_price">Price</option>
                                <option value="product_qty">Qty</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-control" name="rule_operator[]" required>
                                <option value="">Choose Operator</option>
                                <option value="=">==</option>
                                <option value=">">></option>
                                <option value="<"><</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <input type="text" name="rule_value[]" class="form-control" placeholder="Value" required>                            
                        </div>
                        <div class="col-3">
                            <button type="button" class="remove_div btn btn-danger">Remove</button>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" id="add_condition">Add</button>
                </div>

                <div class="form-group">
                    <label for="rule_tag">Apply Tag</label>
                    <input type="text" name="rule_tag" class="form-control" id="rule_tag">

                    @error('rule_tag')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        //add new condition on button click
        $("#add_condition").click(function() {
            var copy_div = $(".contain_div .main_contain:first").clone();
            copy_div.find('input').val('');
            copy_div.find('select').val('');
            $('.contain_div').append(copy_div);
        });

        //remove a condition on button click
        $('body').on('click','.remove_div', function() {
            $(this).closest('.main_contain').remove();
        });

    });
</script>