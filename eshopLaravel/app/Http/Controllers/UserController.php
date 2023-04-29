<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Show Register Form
    public function register() {
        return view('users.register');
    }

    // Create user
    public function create(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
            'tel_number'=> ['required'],
            'name_surname' => ['nullable', 'string', 'max:255'],
            'street' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'postalcode' => ['nullable', 'string', 'max:20'],
        ]);

        // Has Password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        if(Session::has('added-items')) {
            $user_id = auth()->user()->id;
            $array = Session::get('added-items');

            foreach ($array as $key => $value) {

                $product_id = $value['item_id'];
                $quantity = $value['item_quantity'];
                
                $userProduct = UserProduct::where('user_id', $user_id)
                                        ->where('product_id', $product_id)
                                        ->first();
                
                if ($userProduct) {
                    $userProduct->quantity += $quantity;
                    $userProduct->save();
                } else {
                    UserProduct::create([
                        'user_id' => $user_id,
                        'quantity' => $quantity,
                        'product_id' => $product_id,
                    ]);
                }
            };
        }

        return redirect('/');
    }

    //Logout user
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    //Login view
    public function login(Request $request) {
        return view('users.login');
    }

    //Auth user
    public function auth(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            
            if(Session::has('added-items')) {
                $user_id = auth()->user()->id;
                $array = Session::get('added-items');
    
                foreach ($array as $key => $value) {
    
                    $product_id = $value['item_id'];
                    $quantity = $value['item_quantity'];
                    
                    $userProduct = UserProduct::where('user_id', $user_id)
                                            ->where('product_id', $product_id)
                                            ->first();
                    
                    if ($userProduct) {
                        $userProduct->quantity += $quantity;
                        $userProduct->save();
                    } else {
                        UserProduct::create([
                            'user_id' => $user_id,
                            'quantity' => $quantity,
                            'product_id' => $product_id,
                        ]);
                    }
                };
            }
            return redirect('/');
        }
    }

}
