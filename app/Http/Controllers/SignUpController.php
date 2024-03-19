<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\SignUpRequest;
use App\Http\Resources\SignUpResources;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Mail;
use App\Mail\WelcomeEmail;

class SignUpController extends Controller
{
    public function signUpUsers(SignUpRequest $request)
    {
        $data = $request->validated();
        
        // check if image was given and save on local file system
        if(isset($data['photo'])) {
            $relativePath = $this->savePhoto($data['photo']);
            $data['photo'] = $relativePath;
        }

        $user = User::create($data);

        $email = $request->email;
        
        $sendWelcomeEmail = sendWelcomeEmail($email, $user); 

        return new SignUpResources($user, $sendWelcomeEmail);
    }

    public function displayUsers()
    {
        return SignUpResources::collection(User::latest()->paginate(20));
    }


        /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     */
    public function viewUser(User $user)
    {
        return new SignUpResources($user);
    }




    private function savePhoto($image) {
        
        //check if image is valid based64 string
        if(preg_match('/^data:image\/(\w+);base64,/', $image, $type)) {
           
            // Take out the bse64 encoded text without mime type
            $image = substr($image, strpos($image, ',') + 1);

            // Get file extension
            $type = strtolower($type[1]); // jpg, png, gif

            // Check if file is an image
            if(!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                throw new \Exception('invalid image type');
            }
            $image = str_replace(' ', '+', $image);
            $image = base64_decode($image);

            if($image === false) {
                throw new \Exception('base64_decode failed');
            }

        } else {
            throw new \Exception('did not match data URI WITH image data');
        } 

        $dir = 'images/';
        $file = Str::random() . '.' . $type;
        $absolutePath = public_path($dir);
        $relativePath = $dir . $file;
        if (!File::exists($absolutePath)) {
            File::makeDirectory($absolutePath, 0755, true);
        }
        file_put_contents($relativePath, $image);

        return $relativePath;
    }
}
