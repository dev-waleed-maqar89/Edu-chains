<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'role' => $this->role,
            'tags' => TagResource::collection($this->tags),
            'image' => asset($this->image),
        ];
        if ($this->role === 'intern' && $this->intern) {
            $data['intern']['id'] = $this->intern->id;
            $data['title'] = $this->intern->title;
            $data['description'] = $this->intern->description;
            $data['cv'] = $this->cv ? asset($this->intern->cv) : null;
        } elseif ($this->role === 'employer' && $this->employer) {
            $data['employer']['id'] = $this->employer->id;
            $data['company_name'] = $this->employer->company_name;
            $data['company_address'] = $this->employer->company_address;
            $data['company_website'] = $this->employer->company_website;
            $data['company_email'] = $this->employer->company_email;
            $data['company_phone'] = $this->employer->company_phone;
            $data['company_logo'] = $this->employer->company_logo;
        }

        return $data;
    }
}