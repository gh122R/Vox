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
        return [
            'status_id' => ['required', 'exists:statuses,id'],
            'problem_type_id' => ['required', 'exists:problem_types,id'],
            'department_id' => ['required', 'exists:departments,id'],
            'description' => ['required', 'string', 'max:255'],
            'anonymous'   => ['boolean'],
            'deadline'     => ['date', 'nullable']
        ];
    }
}
