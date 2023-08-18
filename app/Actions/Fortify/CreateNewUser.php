<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Helpers\Helper;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $kode_user = Helper::UserIDGenerator(new User, 'kode_user', 5, 'U');
        // $kode_mobil = Helper::PesananIDGenerator(new Mobil, 'kode_mobil', 5, 'M');

        return DB::transaction(function () use ($input, $kode_user) {
            return tap(User::create([
                'name' => $input['name'],
                'kode_user' => $kode_user,
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });

        // return User::create([
        //     'name' => $input['name'],
        //     'username' => $input['username'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        // ]);
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
