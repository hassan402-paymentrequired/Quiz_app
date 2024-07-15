<?php
namespace Core;

class Validate
{
    public static function validateEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }


    public static function validatePhone($phone){
        
        return $phone === "";
    }


    public static function validatefirstname($first_name){
        return $first_name === "";
    }


    public static function validatelastname($last_name){
        return  $last_name === "";
    }
    public static function validatepassword($password){
        return $password === "";
    }


  

}

function validateAllInput($email, $first_name, $last_name, $phone, $password) {
    
    $validate_input = new Validate();

    $error = [];

    $email = $validate_input::validateEmail($email);
    if(!$email) {
        $error[] = [
            'email'=> 'email is required'
        ];
    }

    $checkFirstname = $validate_input::validatefirstname($first_name);

    if($checkFirstname) {
    $error[] = [
        'first'=> 'first name is required and more the 3 chars'
    ];
    }


    $checklastname = $validate_input::validatelastname($last_name);

    if($checklastname ) {
    $error[] = [
        'last'=> 'last name is required and more the 3 chars'
    ];
    }

    $checkphone = $validate_input::validatePhone($phone);

    if($checkphone ) {
    $error[] = [
        'phone'=> 'phone is required and more the 3 chars'
    ];
    }

    $checkpassword = $validate_input::validatepassword($password);


    if($checkpassword ) {
    $error[] = [
        'password'=> 'password is required and more the 3 chars'
    ];
    }

    return $error;
}