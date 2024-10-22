<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\NoReturn;

/**
 * @property int $user_id
 * @property int $product_id
 * @property int $quantity
 */
class BasketAddRequest extends FormRequest
{
    protected $redirectRoute = 'basket.index';
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'user_id' => 'nullable|integer|exists:users,id',
        ];
    }

    #[NoReturn] public function failedValidation(Validator $validator): void
    {
        dd($validator->errors());
    }
}
