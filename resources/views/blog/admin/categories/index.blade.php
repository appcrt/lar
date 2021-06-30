@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <a type="button" class="btn btn-primary" href="{{ route('blog.admin.categories.create') }}">Добавить</a>
            </div>
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Родитель</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($paginator as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td><a href="{{ route('blog.admin.categories.edit',$item->id) }}">{{ $item->title }}</a></td>
                            <td @if(in_array($item->parent_id,[0,1])) style="color: #ccc;" @endif >
                                {{ $item->parentTitle }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
            @if($paginator->total() > $paginator->count())
                <div class="d-flex justify-content-center">
                    {{ $paginator->links() }}
                </div>
            @endif
    </div>
@endsection
