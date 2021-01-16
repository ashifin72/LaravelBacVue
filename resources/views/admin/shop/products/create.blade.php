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
        <div class="card-header">
            <h3 class="card-title">{{__('admin.add_article')}}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <form method="POST" action="{{route('admin.products.store', $item->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        @include('admin.shop.products.includes.item_edit_main_col')
                    </div>
                    <div class="col-md-3">
                        @include('admin.shop.products.includes.item_edit_add_col')
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
