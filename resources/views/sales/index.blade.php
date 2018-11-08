@extends('layouts.master')
@section('header')
    <a href="{{ route('enrollments.create') }}">
        <button type="button" class="btn btn-success">Add new enrollment</button>
    </a>
@endsection
@section('content')
    <div class="container">
        <h2>List enrollment:</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>enrollmentID</th>
                <th>studentID</th>
                <th>coursesID</th>
                <th>enrolledFrom</th>
                <th>enrolledTo</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($enrollments as $enrollment) :?>
            <tr>
                <td><a href="{{route('enrollments.show',$enrollment->id)}}">{{ $enrollment->id }}</a></td>
                <td>{{ $enrollment->studentID }}</td>
                <td><a href="{{route('enrollments.course', $enrollment->coursesID)}}">{{ $enrollment->coursesID }}</a></td>
                <td>{{ $enrollment->enrolledFrom }}</td>
                <td>{{ $enrollment->enrolledTo }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('enrollments.edit', $enrollment->id) }}">Edit</a>
                    <form action="{{route('enrollments.destroy', $enrollment->id)}}"
                          method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a class="btn btn-danger" href="javascript:void(0);" onclick="$(this).parent().submit();">
                            <span class="glyphicon glyphicon-trash"></span>
                            Delete
                        </a>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
@endsection
