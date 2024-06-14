<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;

#[AsController]
class TestController extends AbstractController
{
    public function __construct(private readonly HubInterface $hub)
    {
    }

    public function __invoke(): bool
    {
        $update = new Update(
            'http://localhost:3000',
            json_encode(['hello' => 'world'])
        );

        $this->hub->publish($update);

        return true;
    }
}