@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') {{__('admin.add')}} @endslot
            @slot('parent') {{__('admin.home')}} @endslot
            @slot('shop') {{__('admin.shop')}} @endslot
            @slot('active') {{__('admin.add')}}@endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content card-body card">
        <!-- Small boxes (Stat box) -->


        <form method="POST" action="{{route('admin.product_categories.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title">{{__('admin.name')}}</label>
                    <input type="text" name="title" value="{{$item->title}}"
                           id="title" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="title">{URL</label>
                    <input type="text" name="slug" value="{{$item->slug}}"
                           id="slug" class="form-control" >
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title">{{__('admin.name')}}</label>
                    <input type="file" name="img" value="{{$item->img}}"
                           id="img" class="form-control-file border" >
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="description">description:</label>
                    <textarea class="form-control" name="description" rows="5" id="description">

                    </textarea>
                </div>
            </div>


            <button type="submit" class="btn btn-outline-success">{{__('admin.save')}}</button>
        </form>


    </section>
@endsection
