<?php

namespace App\Http\Requests;

use App\Models\Complaint;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ComplaintRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Complaint::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules =  [
            'status_id' => ['exists:statuses,id'],
            'problem_type_id' => ['exists:problem_types,id'],
            'department_id' => ['exists:departments,id'],
            'description' => ['string', 'max:255'],
            'resolution' => ['string', 'max:255'],
            'taken_at' => ['nullable', 'date'],
            'resolved_at' => ['nullable', 'date'],
            'anonymous'   => ['boolean'],
            'deadline'     => ['date', 'nullable']
        ];

        if($this->isMethod('post'))
        {
            $rules['status_id'][] = ['required'];
            $rules['problem_type_id'][] = 'required';
            $rules['department_id'][] = 'required';
            $rules['description'][] = 'required';
        }

        return $rules;
    }
}
