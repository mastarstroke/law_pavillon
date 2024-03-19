<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use URL;

class SignUpResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'dob' => $this->dob,
            'primary_case' => $this->primary_case,
            'case_details' => $this->case_details,
            // 'image' => $this->image,
            'image' =>$this->image ? URL::to($this->image) : null,
        ];
    }
}
