<?php

// app/Http/Requests/StoreNewsRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'n_title' => ['required', 'string', 'min:5'],
            'n_content' => ['required', 'string', 'min:40'],
            'n_author_id' => ['required', 'numeric', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'n_title.required' => 'Tytuł jest wymagany.',
            'n_title.string' => 'Tytuł musi być ciągiem znaków.',
            'n_title.min' => 'Tytuł musi mieć co najmniej 5 znaków.',

            'n_content.required' => 'Treść jest wymagana.',
            'n_content.string' => 'Treść musi być ciągiem znaków.',
            'n_content.min' => 'Treść musi mieć co najmniej 40 znaków.',

            'n_author_id.required' => 'ID autora jest wymagane.',
            'n_author_id.numeric' => 'ID autora musi być liczbą.',
            'n_author_id.exists' => 'Wybrany autor nie istnieje.',
        ];
    }
}
?>
