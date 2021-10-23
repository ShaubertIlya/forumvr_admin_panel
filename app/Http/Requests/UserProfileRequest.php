<?php

namespace App\Http\Requests;

use App\ArrayHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:1|max:100',
            'password' => 'nullable|min:6|max:255',

            'profile.bin' => 'required|numeric|digits:12',
            'profile.address' => 'required|string|min:1|max:255',
            'profile.phone_number' => 'required|numeric|digits:11',
            'profile.website' => 'required|string|min:1|max:255',
            'profile.description' => 'required|string|min:1',
            'profile.company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:90480',

            'business_information.main_presentation_link' => 'nullable|string|min:1|max:255',
            'business_information.company_visitcard' => 'nullable|string|min:1|max:255',
            'business_information.model3d_link' => 'nullable|string|min:1|max:255',
            'business_information.gallery_link' => 'nullable|string|min:1|max:255',

            'business_information.additional_presentation_links.keys.*' => 'nullable|string|min:1',
            'business_information.additional_presentation_links.values.*' => 'nullable|string|min:1',

            'business_information.videoclip_links.keys.*' => 'nullable|string|min:1',
            'business_information.videoclip_links.values.*' => 'nullable|string|min:1',

            'business_information.gallery_links.keys.*' => 'nullable|string|min:1',
            'business_information.gallery_links.values.*' => 'nullable|string|min:1',
        ];
    }

    public function validated()
    {
        $data = ArrayHelper::except(parent::validated(), ['name', 'email', 'password', 'profile.company_name']);

        if ($this->password) {
            $this->password = Hash::make($this->password);
        }

        ArrayHelper::adjustArrayKeyValue(
            $data['business_information']['additional_presentation_links'],
            $data['business_information']['videoclip_links'],
            $data['business_information']['gallery_links']
        );

        return $data;
    }
}
