@extends('admin.index')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    @component('admin.components.breadcrumb')
      @slot('title') {{__('admin.edit') . ' ' . $item->title}} @endslot
      @slot('parent') {{__('admin.home')}} @endslot
      @slot('products') {{__('admin.blog_articles')}} @endslot
      @slot('active') {{__('admin.edit')}} @endslot
    @endcomponent


  </div>
  <section class="content card card-body">
    <div class="card-header">
      <h3 class="card-title">{{$item->title}}</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('admin.products.update', $item->id)}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row justify-content-center">
          <div class="col-md-9">
            @include('admin.shop.products.includes.item_edit_main_col')
          </div>
          <div class="col-md-3">
            @include('admin.shop.products.includes.item_edit_add_col')
          </div>

        </div>
      </form>
      <br>
      <form class="admin__btn-destroy" method="post" action="{{route('admin.products.destroy', $item->id)}}">
        @method('DELETE')
        @csrf
        <div class="row justify-content-start" style="margin-top: 25px">
          <button type="submit" onclick=' confirm("Точно видалити?") ? this.form.submit() : ""'
                  class="btn btn-outline-danger">{{__('admin.remove')}}</button>
        </div>

      </form>

    </div>


  </section>
@endsection
