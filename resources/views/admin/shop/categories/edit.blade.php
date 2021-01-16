@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') {{$item->name}}@endslot
            @slot('parent') {{__('admin.home')}} @endslot
            @slot('shop') {{__('admin.product_categories._site')}} @endslot
            @slot('active') {{$item->name}}@endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content card card-body">
        <!-- Small boxes (Stat box) -->



        <div class="row">
            <div class="col-sm-10">
                <form method="POST" action="{{route('admin.product_categories.update', $item->id)}}" enctype="multipart/form-data">
                    @method('PATCH')
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
            </div>
            <div class="col-sm-2">
                @if($item->id)
                    <form method="post" onsubmit='return false' action="{{route('admin.product_categories.destroy', $item->id)}}">
                        @method('DELETE')
                        @csrf
                        <div class="row justify-content-start" style="margin-top: 34px">
                            <button type="submit" onclick=' confirm("Точно удалить?") ? this.form.submit() : ""' class="btn btn-outline-danger">{{__('Удалить запись')}}</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>






    </section>
@endsection
