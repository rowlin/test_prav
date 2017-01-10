<?php

namespace App\Helpme;

use Illuminate\Http\Request;

class ImageModule {

    public $upload_attempts;

    public function uploadImage(Request $request) {
        $result = ['result' => false, 'display' => false];
        $file = $request->file('uploadFile');
        if(!$file) { $result['display'] = 'файл не был отправлен'; return $result; }
        $file_size = $file->getSize();
        if($file_size > 4118557) { $result['display'] = 'размер файла не может превышать 4х мегабайт'; return $result; }

        $mime_type = $file->getMimeType();
        if(!$this->is_image_mime_type($mime_type)) {
            $result['display'] = 'Файл должен являться картинкой';
            return $result;
        }

        $original_name = $file->getClientOriginalName();

        $contents = $file->openFile()->fread($file_size);

        $insert = [];
        $insert['content'] = base64_encode($contents);
        $insert['name'] = $original_name;
        $insert['user_id'] = \Auth::id();
        $insert['extension'] = $file->getClientOriginalExtension();
        $insert['image_size'] = $file_size;
        $re = $this->upload_image_into_db($insert);
        if(!$re) { $result['display'] = 'извините, по каким-то причинам нам не удалось загрузить ваше изображение'; return $result; }
        $result['src'] = make_image_url($re);
        $result['result'] = true; return $result;
    }



    function upload_image_into_db($insert) {
        if($this->upload_attempts >= 3) { return false; }
        $insert['image_code'] = $this->hash_name($insert['name']);
        try {
            $ins = \DB::table('images')
                ->insertGetId($insert);
        } catch(\Exception $e) {
            $this->upload_attempts++;
            return $this->upload_image_into_db($insert);
        }
        if($ins) { return $insert['image_code']; }
        return false;
    }

    function getImage($image_code) {
        return \DB::table('images')->where('image_code', $image_code)->first();

    }

    function hash_name($original_name) {
        $s = '';
        if($this->upload_attempts) {
            $s = $this->upload_attempts;
        }
        return md5(date('Y-m-d H:i:s') . $original_name) . $s;
    }

    function is_image_mime_type($type) {
        if(in_array($type , array('image/jpeg', 'image/jpg' , 'image/png' , 'image/bmp'))) {
            return true;
        }
        return false;
    }








}