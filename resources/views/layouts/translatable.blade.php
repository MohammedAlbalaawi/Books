
@foreach(config('translatable.locals') as $key => $value)
    <div class="mb-3">
        <input type="text"
               class="form-control  @error('title') is-invalid @enderror"
               name="{{$field}}[{{$key}}]"
               id="{{$field}}-{{$key}}"
               value="{{$fieldValue[$key] ?? null}}"
               placeholder="Enter {{$field}} in {{$value}}"
        >
    </div>
@endforeach
