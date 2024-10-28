<?php
namespace App\Service;

use App\Entity\Team;
use Doctrine\Persistence\ManagerRegistry;

class TeamService{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        //Como hace falta acceder a ManagerRegistry lo inyectamos en el constructor
        $this->doctrine = $doctrine;
    }
    public function getTeam(): ?array{
        $repository = $this->doctrine->getRepository(Team::class);
        return $repository->findAll();
    }
}
