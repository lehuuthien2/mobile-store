@extends('manages.index')

@section('content')
    <section class="wrapper">
        <!-- Form validations -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Chỉnh sửa thông tin sản phẩm
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            {!! Form::model($product, ['url' => 'manages/products/' . $product->product_id , 'method' => 'PUT',
                            'class' => 'form-validate form-horizontal', 'id' => 'selectform', 'files' => 'true']) !!}
                            @include('manages.products.form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
