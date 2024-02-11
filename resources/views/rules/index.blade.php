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
    <title>List Rules</title>
</head>

<body>
    <div class="container mt-2">
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif

        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
        @endif

        <div class="row">
            <a href="{{ route('products.index') }}" class="btn btn-primary mr-2">Show Product</a>
            <a href="{{ route('rules.create') }}" class="btn btn-primary">Add Rule</a>
        </div>
        <h2>Rules Manager</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Rule Name</th>
                    <th>Apply Tag</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ruledata as $rule_data)
                <tr>
                    <td>{{$rule_data->rule_name}}</td>
                    <td>{{$rule_data->rule_tag}}</td>
                    <td>
                        <form action="{{ route('rules.update', $rule_data->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" value="Apply Rule" class="btn btn-primary">Apply Rule</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>