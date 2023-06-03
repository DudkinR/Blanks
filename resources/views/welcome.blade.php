@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-2 bg-warning mx-auto">
                    kat1
                </div>
            </div>
        </div>
        

        <?php $categories = \App\Models\Category::where(
            "author_id",
            "=",
            Auth::id()
        )
            ->where("parent_id", "=", 0)
            ->get();
//$bgc=16777215;
?>
        <x-catalog.cat :categories="$categories" />

    </div>
    <script>
        @isset($message)
            alert('{{$message}}');
        @endisset
            </script>
@endsection
