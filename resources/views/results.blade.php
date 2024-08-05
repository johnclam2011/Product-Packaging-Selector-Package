<!DOCTYPE html>
<html>
<head>
    <title>Packaging Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Packaging Results</h2>
    @foreach ($boxes as $box)
        <div class="card mb-3">
            <div class="card-header">
                {{ $box['box'] }}
            </div>
            <div class="card-body">
                <ul>
                    @foreach ($box['products'] as $product)
                        <li>
                            Length: {{ $product['length'] }} cm, Width: {{ $product['width'] }} cm,
                            Height: {{ $product['height'] }} cm, Weight: {{ $product['weight'] }} kg,
                            Quantity: {{ $product['quantity'] }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>