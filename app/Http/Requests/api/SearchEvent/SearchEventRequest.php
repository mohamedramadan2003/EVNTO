<?php

namespace App\Http\Requests\api\SearchEvent;

use Illuminate\Foundation\Http\FormRequest;

class SearchEventRequest extends FormRequest
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
            'query' => 'nullable|string|max:255',
            'organizer_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'query.string' => 'The search query must be a string.',
            'organizer_name.string' => 'The organizer name must be a string.',
            'address.string' => 'The address must be a string.',
            'category' => 'nullable|string|max:255',
            'event_type' => 'nullable|in:paid,free',
            'event_date' => 'nullable|in:today,tomorrow,this_week,set_date',
            'set_date' => 'nullable|date', // Only required if event_date is set_date
        ];
    }
}
