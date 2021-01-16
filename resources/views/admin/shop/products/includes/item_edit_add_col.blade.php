<div class="admin__post-colum">
  @isset($item->slug)
    <a class="btn btn-outline-primary" href=""
       role="button">{{__('admin.more')}} »</a>
  @endisset

  <div class="parent_id form-group">
    <label for="title">{{__('admin.categories_blog')}}</label>
    <select type="text" name="category_id" value="{{$item->category_id}}"

            id="category_id" class="form-control" required>

      @foreach($categoryList as $key=>$category)
        <option value="{{$key}}" @if($key == $item->category_id) selected @endif>
          {{$category}}
        </option>
      @endforeach
    </select>
  </div>
  @isset($item->img)
    <img class="responsive" style="width: 230px" src="/uploads/{{$item->img}}"
         alt="{{$item->title}}">
  @endisset

  <div class="form-group">

    <div for="slug" class="mt-2">
      @if($item->img) <img style="width: 50px" src="/uploads/{{$item->img}}"
                           alt="{{$item->title}}">
      {{__('admin.replace_img')}}
      @else <i class="fas fa-images"></i> {{__('admin.upload_img')}}
      @endif
    </div>

    <div class="input-group">
      <div class="custom-file">

        <input type="file" name="img" value="{{$item->img}}"
               id="img" class="form-control-file border" >
      </div>
    </div>
  </div>


  <div class="form-group">
    <label for="title">{{__('admin.created_at')}} {{$item->created_at}}</label>
    <input type="date" name="created_at" class="form-control mydate" value="{{$item->created_at}}">
  </div>
  <div class="form-group">
    <label for="title">{{__('admin.update_at')}} {{$item->updated_at}}</label>
    <input type="date" name="updated_at" class="form-control mydate" value="{{$item->updated_at}}">
  </div>

</div>
