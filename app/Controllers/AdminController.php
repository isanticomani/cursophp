<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\{Job, Project};
use Zend\Diactoros\ServerRequest;
use Respect\Validation\Validator as v;
use Zend\Diactoros\Response\RedirectResponse;

class AdminController extends BaseController {
    public function getIndex() {
        return $this->renderHTML('admin.twig');
    }

    public function changePass(){
        return $this->renderHTML('admin/changePass.twig');
    }

    public function updatePass(ServerRequest $request){
        $responseMessage = null;
        $postData = $request->getParsedBody();
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $jobValidator = v::key('newPassword', v::stringType()->notEmpty())
            ->key('repeatPass', v::stringType()->notEmpty());
            
            try {
                $jobValidator->assert($postData);
                $postData = $request->getParsedBody();

                if ($postData['newPassword'] === $postData['repeatPass']) {
                    $user = User::find($_SESSION['userId']);
                    $user->password = \password_hash($postData['newPassword'],PASSWORD_DEFAULT);
                    $user->save();
                    $responseMessage = 'Saved';
                }else{
                    $responseMessage = 'Passwords not equals';
                    return $this->renderHTML('admin/changePass.twig', [
                        'responseMessage' =>$responseMessage
                    ]);
                }
                
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }
        }
        return $this->renderHTML('admin.twig', [
            'responseMessage' =>$responseMessage
        ]);

    }
}