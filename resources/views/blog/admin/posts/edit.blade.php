@extends('layouts.app')

@section('content')
    @if($item->exists)
        <div class="container pl-5">
            <div class="row">
                <form action="{{ route('blog.admin.posts.destroy',$item->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Удалить" class="btn btn-danger mb-2">
                </form>
            </div>
        </div>
    @endif
    @if($item->exists)
        <form action="{{ route('blog.admin.posts.update',$item->id) }}" method="post">
            @method('PATCH')
    @else
        <form action="{{ route('blog.admin.posts.store',$item->id) }}" method="post">
    @endif
        @csrf
        <div class="container">
            <div class="row">
                @if($errors->any())
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                    </div>
                @endif
                @if(session('success'))
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-8">
                    @include('blog.admin.posts.includes.item_edit_main_col')
                </div>
            </div>
        </div>
        </form>

@endsection
