@extends('manages.index')

@section('content')
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-files-o"></i> Form Validation</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.blade.php">Home</a></li>
                    <li><i class="icon_document_alt"></i>Forms</li>
                    <li><i class="fa fa-files-o"></i>Form Validation</li>
                </ol>
            </div>
        </div>
        <!-- Form validations -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm nhân viên mới
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            {!! Form::open(['url' => 'manages/users', 'class' => 'form-validate form-horizontal', 'files' => 'true']) !!}
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
