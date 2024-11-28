<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="container"  x-data="data">

    <form class="mb-4 bg-white p-4 rounded shadow mt-12" @submit.prevent="saveProduct()">
        <h2 class="text-lg font-semibold mb-2">Add New Product</h2>
        <div class="grid grid-cols-3 gap-4">
            <input x-model="name" type="text" placeholder="Name" class="border p-1 rounded" required>
            <input x-model="description" type="text"  placeholder="Description"
                class="border p-2 rounded" required>
            <input x-model="price" type="number" placeholder="Price" class="border p-2 rounded" required>
        </div>
        <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add
            Product</button>
    </form>
    <h1 class="text-center text-pink-800 text-6xl my-5">Product list</h1>
    <div class="col-md-8 mx-auto">
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
                        <td x-text="index+1"></td>
                        <td x-text="product.name"></td>
                        <td x-text="product.description"></td>
                        <td x-text="product.price"></td>
                        <td>
                            <button class="button ">Edit</button>
                            <button @click="deleteProduct(product)" class="button">Delete</button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <script>
        const data = {
            products: @json($products),
            name:'',
            description:'',
            price:'',
            fetchProduct(){
                axios.get('/')
                .then(response=>{
                    console.log(response)
                    this.products =response.data
                })
            },
            saveProduct(){
                // console.log(this.name,this.description,this.price)
                axios.post('/products',{
                    name:this.name,
                    description:this.description,
                    price:this.price
                }).then(response=>{
                    alert(response.data.msg)
                    // this.products.push(response.data.product)
                    fetchProduct()
                })
            },
            deleteProduct(product){
                // console.log(product)
                if(confirm('Are You sure?')){
                    axios.delete(`/product/${product.id}`)
                    .then(response=>{
                        alert(response.data.msg)
                        this.fetchProduct()
                    })
                }
        }
    }

    </script>
</body>

</html>