<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('/api/songs/{id<\d+>}', methods: ['GET'], name: 'api songs get one')]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' =>'https://symfonycasts.s3.amazonaws.com/sample.mp3'


        ];

        $logger->info('El logger info funciona escribiendo esta cancion {song}',[
            'song'=>$id,
            ]);

        return new JsonResponse($song);/* tambien vale return $this->>json($song);*/

    }

}