<?php

//namespace App;
use Illuminate\Http\UploadedFile as File;

class Image
{
    private $default_image = database_path('image/default/user_avatar');
    private $path = database_path('image/user_avatar/');

    public function getNameImage(File $file) {
        return date('d.m.Y').$file->getClientOriginalName().;
    }

    public function store(Request $request)
    {
        if($request->hasFile('preview')) //Проверяем была ли передана картинка, ведь статья может быть и без картинки.
        {
            $date=date('d.m.Y'); //опеределяем текущую дату, она же будет именем каталога для картинок
            $root=$_SERVER['DOCUMENT_ROOT']."/images/"; // это корневая папка для загрузки картинок
            if(!file_exists($root.$date))    {mkdir($root.$date);} // если папка с датой не существует, то создаем ее
            $f_name=$request->file('preview')->getClientOriginalName();//определяем имя файла
            $request->file('preview')->move($root.$date,$f_name); //перемещаем файл в папку с оригинальным именем
            $all=$request->all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['preview']="/images/".$date."/".$f_name;// меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp
            Article::create($all); //сохраняем массив в базу
        }
        else
        {
            Article::create($request->all()); // если картинка не передана, то сохраняем запрос, как есть.
        }
        return back()->with('message','Статья добавлена');

        $file = $request->file('photo');
        $request->hasFile('photo');
        $request->file('photo')->isValid();

        $request->file('photo')->move($destinationPath);
        $request->file('photo')->move($destinationPath, $fileName);

        Storage::disk('uploads')->put('filename', $file_content);

        $model->image = $request->file('image')->store('uploads');

        $path = $request->file('avatar')->store('avatars');

        //        UploadedFile

    }

}