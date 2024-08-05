<!DOCTYPE html>
<html>
<head>
    <title>Product Packaging Selector</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Product Packaging Selector</h2>
    <form action="{{ route('select-box') }}" method="POST">
        @csrf
        <div id="products-container">
            <div class="product-item mb-3">
                <h5>Product 1</h5>
                <div class="form-group">
                    <label for="length">Length (cm):</label>
                    <input type="number" class="form-control" name="products[0][length]" required>
                </div>
                <div class="form-group">
                    <label for="width">Width (cm):</label>
                    <input type="number" class="form-control" name="products[0][width]" required>
                </div>
                <div class="form-group">
                    <label for="height">Height (cm):</label>
                    <input type="number" class="form-control" name="products[0][height]" required>
                </div>
                <div class="form-group">
                    <label for="weight">Weight (kg):</label>
                    <input type="number" class="form-control" name="products[0][weight]" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" name="products[0][quantity]" required>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" onclick="addProduct()">Add Another Product</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    let productCount = 1;

    function addProduct() {
        if (productCount >= 10) return;
        const container = document.getElementById('products-container');
        const newProduct = document.createElement('div');
        newProduct.classList.add('product-item', 'mb-3');
        newProduct.innerHTML = `
            <h5>Product ${productCount + 1}</h5>
            <div class="form-group">
                <label for="length">Length (cm):</label>
                <input type="number" class="form-control" name="products[${productCount}][length]" required>
            </div>
            <div class="form-group">
                <label for="width">Width (cm):</label>
                <input type="number" class="form-control" name="products[${productCount}][width]" required>
            </div>
            <div class="form-group">
                <label for="height">Height (cm):</label>
                <input type="number" class="form-control" name="products[${productCount}][height]" required>
            </div>
            <div class="form-group">
                <label for="weight">Weight (kg):</label>
                <input type="number" class="form-control" name="products[${productCount}][weight]" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" name="products[${productCount}][quantity]" required>
            </div>
        `;
        container.appendChild(newProduct);
        productCount++;
    }
</script>
</body>
</html>