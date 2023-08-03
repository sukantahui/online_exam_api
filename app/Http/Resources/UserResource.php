<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed email
 * @property mixed userToOrganisation
 * @property mixed roleToUser
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $userToOrganisation = $this->userToOrganisation;
        $organisation = $userToOrganisation->organisation;
        $role = $this->roleToUser->role;
        return [
            'userId'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'organisationId'=>$organisation->id,
            'organisationName'=>$organisation->organisation_name,
            'roleId'=>$role->id,
            'roleName'=>$role->role_name,
        ];
    }
}
