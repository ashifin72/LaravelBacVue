<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#description">{{__('admin.master_data')}}</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#multimedia">{{__('admin.additional_data')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#seo_sahre">SEO</a>
  </li>
  <li class="nav-item">
    @if($item->status == 1)
      <div class="alert alert-default-success" role="alert">
        {{__('admin.is_published')}}
      </div>
    @else
      <div class="alert alert-default-danger" role="alert">
        {{__('admin.disabled')}}
      </div>

    @endif
  </li>

</ul>
<div class="tab-content">
  <div class="tab-pane fade show active" id="description">
    <div class="tab-content">
      <div class="tab-pane active">


        <div class="form-group">

          <label for="title">{{__('admin.name')}} </label>

          <input type="text" name="title" value="{{$item->title}}"
                 id="title" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="description">{{__('admin.description')}} </label>
          <textarea class="form-control description-editor" id="editor" rows="5"
              name="description">
                    {{ $item->description}}
          </textarea>
        </div>
      </div>
    </div>
  </div>

  <div class="tab-pane fade" id="multimedia">
    <div class="row">
      <div class="form-group col-sm-6">

        <label for="title">{{__('shop.price')}} </label>

        <input type="number" name="price" value="{{$item->price}}"
               id="price" class="form-control" required>
      </div>
      <div class="form-group col-sm-6">

        <label for="title">{{__('shop.article')}} </label>

        <input type="text" name="article" value="{{$item->article}}"
               id="article" class="form-control" required>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="seo_sahre">
    <div class="form-group">
      <label for="slug">{{__('admin.url_data')}}</label>
      <input type="text" name="slug" value="{{$item->slug}}"
             id="slug" class="form-control">
    </div>
  </div>
</div>

<div class="form_check" style="margin-left: 25px">
  <input type="hidden" name="status" value="0">

  <input type="checkbox"
         name="status"
         class="form-check-input"
         value="1"
         @if ($item->status == 1)
         checked="checked"
    @endif
  >
  <label for="is_published" class="form-check-label">{{__('admin.is_published')}}</label>

</div>

<div class="cardrd">
  <div class="card-body">
    <button type="submit" class="btn btn-outline-success">{{__('admin.save')}}</button>
  </div>
</div>









