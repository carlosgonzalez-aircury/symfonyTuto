<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;/*Everytime we reference a classs or interface we need to add a sue statement*/
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinlylController extends AbstractController /*Por regla general no se necesita hacer un extend, pero haremos AbstractController por los metodos que nos da*/
{
    #[Route('/', name: 'app_homepage')]/*attribute syntax, a way to add configuraton to your code. This route defines the URL and points to the controller
     wich is under #[]  */
    public function homepage(): Response{
       /* die('Esto es una prueba!!');*/
        /*Controller must returns a Response object (httpFoundation on preference for Request, Resonse and sessions)*/

        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];

        /*dd($tracks);Esta función nos muestra las variables, y mata la carga de la página. Mostrandonos, si funciona, los datos de un objeto o lo que se quiera mostrar*/
        /*dump($tracks); Como la anterior pero mantiene "viva" la página.*/

        return $this->render('vinyl/homepage.html.twig',[
            /*Como segundo argumento se pasa una array de variables que queramos tener en la plantillas, estas variables seran llamadas en el ".html.twig" que creemos*/

            'title'=> 'PB &Jams',
            'tracks'=>$tracks

        ]);/*Es comun tener un directorio con el mismo nombre que la calse (vinly) y un nombre de archivo con el mismo nombre del metodo*/

    }

    #[Route('/browse/{slug}', name: 'app_browse')]/* al añadir en la url una "wildcard{valor formar} permitimos pasar un argumento con el mismo nombre. Puede hacer que concuerde cualquier cosa pero no puede no ser usada; si esta en blanco fallará"*/
    public function browse(string $slug = null): Response /*Añadir el tipo es buena programacion e indica que este argumento siempre sera string*/
    {

        $gender = $slug ? u(str_replace('-', ' ',$slug))->title(true) : null;

    return $this->render('vinyl/browse.html.twig', [
        'genre'=>$gender,
    ]);

    }

}