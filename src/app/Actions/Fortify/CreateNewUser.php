<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\DB;
use App\Models\WeightTarget;
use App\Models\WeightLog;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string'],
            'email' => [
                'required',
                'email',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'current' =>['required','numeric','max:999.9','regex:/^\d+(\.\d{1})?$/'],
            'goal' => ['required','numeric','max:999.9','regex:/^\d+(\.\d{1})?$/'],
        ],[
            'current.required'=>'体重を入力してください',
            'goal.required'=>'体重を入力してください',
            'current.numeric'=>'数字で入力してください',
            'goal.numeric'=>'数字で入力してください',
            'current.max'=>'4桁までの数字で入力してください',
            'goal.max'=>'4桁までの数字で入力してください',
            'current.regex'=>'小数点は1桁で入力してください',
            'goal.regex'=>'小数点は1桁で入力してください',
        ])->validate();
        return DB::transaction(function () use ($input) 
        {
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
            WeightTarget::create([
                'user_id' => $user->id,
                'target_weight' =>$input['goal'],
            ]);
            WeightLog::create([
                'user_id' =>$user->id,
                'weight' =>$input['current'],
                'date' =>now(),
            ]);
            return $user;    
        });
    }
}
