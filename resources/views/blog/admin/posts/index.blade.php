@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <a type="button" class="btn btn-primary" href="{{ route('blog.admin.posts.create') }}">Написать</a>
            </div>
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Дата публикации</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paginator as $item)
                        <tr @if(!$item->is_published) style="background-color: #eee;" @endif>
                            <th scope="row"># {{ $item->id }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->category->title }}</td>
                            <td><a href="{{ route('blog.admin.posts.edit',$item->id) }}">{{ $item->title }}</a></td>
                            <td>{{ $item->published_at ? \Illuminate\Support\Carbon::parse($item->published_at)->format('d.M H:i') : '' }}</td>
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
