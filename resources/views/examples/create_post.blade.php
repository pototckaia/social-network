@extends('admin.main')

@section('content')

    <form method="POST" action="{{action('ArticlesController@store')}}" enctype="multipart/form-data">

        Превью:<br>

        <input type="file" name="preview"><br>

        Название статьи:<br>

        <input type="text" name="title"><br>

        Текст статьи:<br>

        <textarea name="content"></textarea><br>

        Категория:<br>

        <select name="category_id">

            @foreach($categories as $category)

                <option value="{{$category->id}}">{{$category->title}}</option>

            @endforeach

        </select><br>

        Разрешить комментарии?<br>

        <select name="comments_enable">

            <option value="1">Да</option>

            <option value="0">Нет</option>

        </select><br>

        Опубликовать?<br>

        <select name="public">

            <option value="1">Да</option>

            <option value="0">Нет</option>

        </select><br>

        <h2>Мета</h2>

        description:<br>

        <input type="text" name="meta_description"><br>

        keywords:<br>

        <input type="text" name="meta_keywords"><br>

        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <input type="submit" value="Сохранить">

    </form>

@endsection

