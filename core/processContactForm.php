
<?php
//Include non-vendor files
require '../core/About/src/Validation/Validate.php';
require '../vendor/autoload.php';
require '../../keys.php';

use About\Validation;
use Mailgun\Mailgun;

$valid = new About\Validation\Validate();

$input = filter_input_array(INPUT_POST);

$message = null;

if(!empty($input)){

    $valid->validation = [
        'first_name'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please enter your first name'
        ]],
        'last_name'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please enter your last name'
        ]],
        'email'=>[[
                'rule'=>'email',
                'message'=>'Please enter a valid email'
            ],[
                'rule'=>'notEmpty',
                'message'=>'Please enter an email'
        ]],
        'subject'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please enter a subject'
        ]],
        'message'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please add a message'
        ]],
    ];


    $valid->check($input);


    if(empty($valid->errors) && !empty($input)){
        $message = "<div style=\"color: #00ff00;\">Your form has been submitted!</div>";

        # Instantiate the client.
        $mgClient = new Mailgun($mailgunKey);
        $domain = "sandboxd91592bbb4fe4f5b9ff6953642f11914.mailgun.org";

        # Make the call to the client.
        $result = $mgClient->sendMessage("$domain",
                  array('from'    => "{$input['first_name']} {$input['last_name']} <{$input['email']}>",
                        'to'      => 'Jason Snider <jason@jasonsnider.com>',
                        'subject' => $input['subject'],
                        'text'    => $input['message']
                    ));

        //var_dump($result);
    }else{
        $message = "<div class=\"error\">Please correct the errors</div>";
    }
}
