
<div class="form-group">
    @isset($lable)
        <label for="{{$redactorname}}">{!!$lable!!}</label>
    @endisset
<textarea name="{{$redactorname}}" id="{{$redactorname}}" cols="30" rows="10" class="form-control"> 
    @isset($lable)
    {!!$content!!}
    @endisset
</textarea>
</div>
<script>
        CKEDITOR.replace('{{$redactorname}}', {
            filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
</script>