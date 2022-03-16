<?php

namespace App\EventListener;

use App\Entity\Customer;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

class AuthenticationSuccessListener
{

    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $user = $event->getUser();


        if (!$user instanceof Customer) {
            return;
        }

        // $data['login'] = $user->getEmail();
        $data['id'] = $user->getCustId();
        // $data['roles'] = $user->getRoles();
        // $data['firstName'] = $user->getCustFirstname();
        // $data['lastName'] = $user->getCustLastName();
        // $data['restaurantName'] = $user->getCustRestaurantName();

        $event->setData($data);
    }
}
