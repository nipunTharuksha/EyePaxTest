<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSalesRepresentativeRequest extends FormRequest
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
            'full_name' => 'required',
            'email' => ['required',
                Rule::unique('sales_representatives')
                    ->where(fn($query) => $query->where('sales_manager_id', request()->user()->id))],
            'telephone' => ['required',
                Rule::unique('sales_representatives')
                    ->where(fn($query) => $query->where('sales_manager_id', request()->user()->id))],
            'joined_date' => ['required', 'date_format:Y-m-d', 'before_or_equal:now'],
            'current_working_route_id' => ['required', 'exists:working_routes,id'],
            'comment' => ['nullable']
        ];
    }
}
