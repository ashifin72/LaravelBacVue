@extends('admin.index')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    @component('admin.components.breadcrumb')
      @slot('title') Категории @endslot
      @slot('parent') {{__('admin.home')}} @endslot
      @slot('active') {{__('admin.categories')}} @endslot
    @endcomponent


  </div>
  <!-- /.content-header -->

  <section class="content">
    <!-- Small boxes (Stat box) -->

    <div class="card card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
        <tr>
          <th>ID</th>
          <th>{{__('admin.name')}}</th>
          <th>url</th>
          <th>Img</th>
        </tr>
        </thead>
        <tbody>

        </tr>
        @forelse($items as $item)

          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
            <td>
              {{$item->slug}}
            </td>
            <td>
              @if($item->img)
                <img src="/uploads/{{$item->img}}" alt="{{$item->title}}" style="width:50px">
              @else
                <img src="/assets/admin/img/logo-mini.png" style="width: 50px" alt="{{$item->title}}">
              @endif
            </td>

            <td>
              <a class="btn btn-primary btn-sm" href="#">
                <i class="fas fa-folder">
                </i>
                View
              </a>
              <a class="btn btn-info btn-sm" href="{{route('admin.product_categories.edit', $item->id)}}">
                <i class="fas fa-pencil-alt">
                </i>
                Edit
              </a>
              <form
                action="{{ route('admin.product_categories.destroy', $item->id) }}"
                method="post" class="float-right ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Подтвердите удаление')">
                  <i class="fas fa-trash">
                  </i>
                </button>
              </form>
            </td>
          </tr>

        @empty
          <tr>
            <th colspan="6">{{__('admin.article_none')}}</th>
          </tr>
        @endforelse

        </tbody>
      </table>
    </div>

    <a class="btn btn-outline-success btn-add"
       href="{{route('admin.product_categories.create')}}">{{__('admin.add')}}</a>
  </section>
@endsection
