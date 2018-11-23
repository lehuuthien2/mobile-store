@extends('manages.index')

@section('content')
    <!--main content start-->
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                            Bảng nhà sản xuất
                        <a href="{{route('factories.create')}}" class="btn btn-success" style="float:right">Thêm nhà sản xuất mới</a>
                    </header>
                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                        <tr>
                            <th>Stt</th>
                            <th><i class="icon_profile"></i> Nhà sản xuất</th>
                            <th>slug</th>
                            <th><i class="icon_cogs"></i> Action</th>
                        </tr>
                        @php $i = 1 @endphp
                        @foreach($factories as $factory)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$factory->name}}</td>
                                <td> {{$factory->slug}}</td>
                                <td>
                                        <a href="{{route('factories.edit', $factory->factory_id)}}" class="btn btn-success">edit</a>
                                    <div class="btn-group">
                                        <form action="{{route('factories.destroy', $factory->factory_id)}}"
                                              method="POST" onsubmit="return confirm('Are you sure?');"
                                              style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a class="btn btn-danger" href="javascript:void(0);"
                                               onclick="$(this).parent().submit();">
                                                <i class="icon_close_alt"></i>
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
        <div id="pagination" class="text-center">
        </div>
        <!-- page end-->
    </section>
    <!--main content end-->
@endsection
