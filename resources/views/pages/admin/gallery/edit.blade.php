<input type="hidden" name="id" value="{{ $edit->id }}">
@php
$hasil = trim($edit->image_gallery, url('/'));

$print = substr($hasil, 8);
@endphp
<input type="hidden" name="oldImage" value="{{ $print }}">
{{ Form::label("title", "Title Image") }}
{{ Form::text("title_gallery", empty($edit->title_gallery) ? null : $edit->title_gallery, ['class' => 'form-control', 'placeholder' => 'Please, insert title gallery' ]) }}
{{ Form::label('image_gallery', 'Image') }}
{{ Form::file('image_gallery', ['class' => 'form-control', 'onchange' => 'previewImage()']) }}
