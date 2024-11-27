<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container">
    <h1 class="text-center text-pink-800 text-6xl my-5">Product list</h1>
    <div x-data="data" class="col-md-8 mx-auto">
        <table class="table">
        <thead>
            <tr>
                <th>i/o</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="(product,index ) in products" :key="product.id">
               <tr>
                    <td x-text="product.id"></td>
                    <td x-text="product.name"></td>
                    <td x-text="product.description"></td>
                    <td x-text="product.price"></td>
                    <td>
                        <button class="button ">Edit</button>
                        <button class="button">Delete</button>
                    </td>
               </tr>
            </template>
        </tbody>
        </table>
    </div>

    <script>
        const data = {
            products : @json($products)
        }
       
    </script>
</body>
</html>

