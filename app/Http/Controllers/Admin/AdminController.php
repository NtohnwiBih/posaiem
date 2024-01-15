<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Support\FacadesAuth;
use App\Models\Property;
use Auth;
use Session;
use Image;

class AdminController extends Controller
{

    public function dashboard(){
        return view('admin.dashboard');
    }
    
    public function login(Request $request) { // Logging in using our 'admin' guard (whether 'vendor' or 'admin' (depending on the `type` and `vendor_id` columns in `admins` table)) we created in auth.php
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);

            // Validation
            $rules = [
                'mobile'    => 'required',
                'password' => 'required',
            ];

            $customMessages = [ // Specifying A Custom Message For A Given Attribute: https://laravel.com/docs/9.x/validation#specifying-a-custom-message-for-a-given-attribute
                'mobile.required'    => 'Phone number is required!',
                'password.required' => 'Password is required!',
            ];

            $this->validate($request, $rules, $customMessages);


            // Authentication (login/logging in/loggin user in)
            if (Auth::guard('admin')->attempt(['mobile' => $data['mobile'], 'password' => $data['password']])) { // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
                if (Auth::guard('admin')->user()->type == 'agent' && Auth::guard('admin')->user()->status == '0') { // if the entity trying to login is 'vendor' and not 'admin' (i.e. `type` column is `vendor`, and `vendor_id` is not zero 0 in `admins` table)    // check the `type` column in the `admins` table for if the logging in user is 'venodr', and check the `confirm` column if the vendor is not yet confirmed (`confirm` = 'No'), then don't allow logging in    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
                    return redirect()->back()->with('error_message', 'Your agent account is not active');

                }  else { // otherwise, login successfully!
                    return redirect('/admin/dashboard'); // Let them LOGIN!!
                }

            } else { // If login credentials are incorrect
                return redirect()->back()->with('error_message', 'Invalid Email or Password'); // Redirecting With Flashed Session Data: https://laravel.com/docs/9.x/responses#redirecting-with-flashed-session-data
            }
        }


        return view('admin.login');
    }

    public function store(Request $request): RedirectResponse
    {
        
    }

    public function logout() {
        Auth::guard('admin')->logout(); // Logging out using our 'admin' guard that we created in auth.php    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
        return redirect('admin/login');
    }

    public function updateAdminPassword(Request $request) {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'update_admin_password');


        // Handling the update admin password <form> submission (POST request) in update_admin_password.blade.php
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);


            // Check first if the entered admin current password is corret
            if (\Illuminate\Support\Facades\Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) { // ['current_password'] comes from the AJAX call in admin/js/custom.js page from the 'data' object inside $.ajax() method    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
                // Check if the new password is matching with confirm password
                if ($data['confirm_password'] == $data['new_password']) {
                    \App\Models\Admin::where('id', Auth::guard('admin')->user()->id)->update([ // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
                        'password' => bcrypt($data['new_password'])
                    ]); // we persist (update) the hashed password (not the password itself)

                    return redirect()->back()->with('success_message', 'Admin Password has been updated successfully!');

                } else { // If new password and confirm password are not matching each other
                    return redirect()->back()->with('error_message', 'New Password and Confirm Password does not match!');
                }
            } else {
                return redirect()->back()->with('error_message', 'Your current admin password is Incorrect!');
            }
        }


        $adminDetails = \App\Models\Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray(); // 'Admin' is the Admin.php model    // Auth::guard('admin') is the authenticated user using the 'admin' guard we created in auth.php    // https://laravel.com/docs/9.x/eloquent#retrieving-models    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances


        return view('admin/settings/update_admin_password')->with(compact('adminDetails')); 
    }

    public function checkAdminPassword(Request $request) { // This method is called from the AJAX call in admin/js/custom.js page    
        $data = $request->all();
        // dd($data); 


        // Hashing Passwords: https://laravel.com/docs/9.x/hashing#hashing-passwords
        if (\Illuminate\Support\Facades\Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) { // ['current_password'] comes from the AJAX call in admin/js/custom.js page from the 'data' object inside $.ajax() method    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
            return 'true';
        } else {
            return 'false';
        }
    }

    public function updateAdminDetails(Request $request) { // the update_admin_details.blade.php
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'update_admin_details');


        if ($request->isMethod('post')) { // if the update <form> is submitted
            $data = $request->all();
            // dd($data);

            // Laravel's Validation
            // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules
            $rules = [
                'admin_name'   => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
                'admin_mobile' => 'required|numeric',
            ];

            $customMessages = [ // Specifying A Custom Message For A Given Attribute: https://laravel.com/docs/9.x/validation#specifying-a-custom-message-for-a-given-attribute
                'admin_name.required'   => 'Name is required',
                'admin_name.regex'      => 'Valid Name is required',
                'admin_mobile.required' => 'Mobile is required',
                'admin_mobile.numeric'  => 'Valid Mobile is required',
            ];

            $this->validate($request, $rules, $customMessages);



            // Uploading Admin Photo    // Using the Intervention package for uploading images
            if ($request->hasFile('admin_image')) { // the HTML name attribute    name="admin_name"    in update_admin_details.blade.php
                $image_tmp = $request->file('admin_image');
                // dd($image_tmp);

                if ($image_tmp->isValid()) {
                    // Get the image extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    // Generate a random name for the uploaded image (to avoid that the image might get overwritten if its name is repeated)
                    $imageName = rand(111, 99999) . '.' . $extension;

                    // Assigning the uploaded images path inside the 'public' folder
                    $imagePath = 'admin/images/photos/' . $imageName;

                    // Upload the image using the Intervention package and save it in our path inside the 'public' folder
                    Image::make($image_tmp)->save($imagePath); // '\Image' is the Intervention package
                }

            } else if (!empty($data['current_admin_image'])) { // In case the admins updates other fields but doesn't update the image itself (doesn't upload a new image), but there's an already existing old image
                $imageName = $data['current_admin_image'];
            } else { // In case the admins updates other fields but doesn't update the image itself (doesn't upload a new image), and originally there wasn't any image uploaded in the first place
                $imageName = '';
            }


            // Update Admin Details
            \App\Models\Admin::where('id', Auth::guard('admin')->user()->id)->update([ // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
                'name'   => $data['admin_name'],
                'mobile' => $data['admin_mobile'],
                'image'  => $imageName
            ]); // Note that the image name is the random image name that we generated

            return redirect()->back()->with('success_message', 'Admin details updated successfully!');
        }

        
        return view('admin/settings/update_admin_details');
    }
}
