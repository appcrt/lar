@extends('layouts.app')

@section('content')
    <form action="{{ route('blog.admin.categories.update',$item->id) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('blog.admin.category.includes.item_edit_main_col')
                </div>
            </div>
        </div>
    </form>
@endsection
