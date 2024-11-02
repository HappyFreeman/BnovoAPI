<?php

namespace App\Http\Requests\Api\Visitor;

use App\Models\Visitor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\Intl\Countries;
use libphonenumber\PhoneNumberUtil;

class CreateVisitorRequest extends FormRequest
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
            'email' => ['required', 'string', 'max:50', 'unique:'.Visitor::class],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'unique:'.Visitor::class],
            'country' => ['nullable', 'string'],
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
