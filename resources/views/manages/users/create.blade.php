@extends('manages.index')

@section('content')
    <section class="wrapper">
        <!-- Form validations -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm nhân viên mới
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            {!! Form::open(['url' => 'manages/users', 'class' => 'form-validate form-horizontal', 'id' => 'selectform', 'files' => 'true']) !!}
                            @include('manages.users.form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
