<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'article_title'     => 'required',
            'article_content'   => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'article_title' => '標題',
            'article_content' => '內容',
        ];
    }
}
