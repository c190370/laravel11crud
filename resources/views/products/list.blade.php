<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Savantop⇧</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">
            <a href="{{ route('products.index') }}" class="text-decoration-none text-white">
                Savantop⇧
            </a>
        </h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('products.create') }}" class="btn btn-dark">登録画面へ</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
                <div class="col-md-10 mt-4">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <center>
                <form action="{{ url('search_data') }}" method="GET">
                    <input type="text" name="search">
                    <button type="submit">検索</button>
                </form>

            </center>
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">商品一覧</h3>
                    </div>

                    <div class="card-body">
                        <table class="table">

                            <tr>
                                <th>列</th>
                                <th></th>
                                <th>試品名</th>
                                <th>商品番号</th>
                                <th>値段</th>
                                <th>登録日</th>
                                <th>行動</th>
                            </tr>
                            @if ($products->isNotEmpty())
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            @if ($product->image != '')
                                                <img width="50"
                                                    src="{{ asset('uploads/products/' . $product->image) }}"
                                                    alt="">
                                            @endif
                                        </td>




                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>${{ $product->price }}</td>
                                        <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}</td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-dark">編集</a>
                                            <a href="#" onclick="deleteProduct({{ $product->id }});"
                                                class="btn btn-danger">削除</a>
                                            <form id="delete-product-from-{{ $product->id }}"
                                                action="{{ route('products.destroy', $product->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    function deleteProduct(id) {
        if (confirm("商品を削除しますか?")) {
            document.getElementById("delete-product-from-" + id).submit();
        }
    }
</script>
