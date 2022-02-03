<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /* if($this->user_id == auth()->user()->id){//autorizacion,//lo enviamos desde el formulario
            return true;
        }else{
            return false;
        } */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $post = $this->route()->parameter('post');//recuperamos la informacion del post , para el metodo update del controlador

        $rules = [
            'name'=>'required',
            'slug'=>'required|unique:posts',
            'status'=>'required|in:1,2', /* solo puede tomar el valor de 1 o 2 */
            'file' => 'image'
        ];

        if($post){//para editar un registro
            /* ACCEDEMOS AL array rules a la variable slug y modificamos */
            $rules['slug'] = 'required|unique:posts,slug,'.$post->id;
        }

        if($this->status == 2){
            /* el metodo (array merge) fuciona dos array */
            $rules = array_merge($rules,[
                'extract'=>'required',
                'body'=>'required',
                'category_id'=>'required',
                'tags'=>'required',
            ]);
        }

        return $rules;

    }
}
