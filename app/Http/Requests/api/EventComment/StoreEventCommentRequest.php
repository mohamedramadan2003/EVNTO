<?php

namespace App\Http\Requests\api\EventComment;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventCommentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'description' => 'required|string|max:500',
            'event_id' => 'required|exists:events,id',
        ];
    }
}
