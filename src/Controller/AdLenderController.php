<?php
namespace App\Controller;

use App\Entity\AdLender;
use App\Entity\User;
use App\Repository\AdLenderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('api/adLender')]
class AdLenderController extends AbstractController {
    public function __construct(private AdLenderRepository $repo, private EntityManagerInterface $em) {}

    #[Route(methods:'GET')]

    public function all(Request $request) : JsonResponse
    {
        return $this->json($this->repo->findAll());
    }

    #[Route('/{id}', methods:'GET')]
    public function one(AdLender $adLender) {
        return $this->json($adLender);
    }



   #[Route(methods:'POST')]
   public function add(User $user, Request $request, SerializerInterface $serializer) : JsonResponse {
    try {
        $adLender = $serializer->deserialize($request->getContent(), AdLender::class, 'json');
    }catch (\Exception $e) {
        return $this->json('Invalid Body', 400);
    }
    
    $adLender->setUser($user);
    $adLender->setCreatedDate(new \DateTime());

    $this->em->persist($adLender);
    $this->em->flush();
    return $this->json($adLender, 201);
    }

    #[Route('/{id}', methods:'DELETE')]
    public function delete(AdLender $adLender):JsonResponse{
        $this->em->remove($adLender);
        $this->em->flush();
        return $this->json(null, 204);
    }

    #[Route('/{id}', methods:'PATCH')]
    public function update(AdLender $adLender, Request $request, SerializerInterface $serializer): JsonResponse {
        try {
            $serializer->deserialize($request->getContent(), AdLender::class, 'json', [
                'object_to_populate' => $adLender
            ]);
        } catch (\Exception $th) {
            return $this->json('Invalid body', 400);
        }

        $this->em->flush();

        return $this->json($adLender);
    }
}