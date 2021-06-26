@extends('layouts.app')

@section('content')
    <form action="{{ route('blog.admin.categories.update',$item->id) }}" method="post">
        @method('PATCH')
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
                    @include('blog.admin.categories.includes.item_edit_main_col')
                </div>
            </div>
        </div>
    </form>
@endsection
