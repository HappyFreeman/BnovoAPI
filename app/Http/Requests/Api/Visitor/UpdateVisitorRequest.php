<?php

namespace App\Http\Requests\Api\Visitor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\Intl\Countries;
use libphonenumber\PhoneNumberUtil;

class UpdateVisitorRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['sometimes', 'string', 'max:50', Rule::unique('visitors')->ignore($this->email)],
            'first_name' => ['sometimes', 'string', 'max:50'],
            'last_name' => ['sometimes', 'string', 'max:100'],
            'phone' => ['sometimes', 'string', Rule::unique('visitors')->ignore($this->phone)],
            'country' => ['sometimes', 'string'],
        ];
    }

    protected function prepareForValidation()
    { 
        if($this->has('phone')) {
            $phoneUtil = PhoneNumberUtil::getInstance();
            try {
                $phoneProto = $phoneUtil->parse($this->phone, "CH");

                // Получаем код страны по номеру телефона
                $regionCode = $phoneUtil->getRegionCodeForNumber($phoneProto);
                
                // Получаем название страны на русском языке
                $countryName = Countries::getName($regionCode, 'ru');

                $this->merge([
                    'country' => $countryName,
                ]);
            } catch (\libphonenumber\NumberParseException $e) {
                // Если номер телефона не корректен, оставляем страну
            }
        }  
    }
}
