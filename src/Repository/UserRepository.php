<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

Class UserRepository extends ServiceEntityRepository{
    
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Users::class);
    }

    public function findByNombre($nombre){
        //ESTO ES UN DQL
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('u')
            ->from('App:Users', 'u')
            ->where('u.nombre = :nombre')
            ->setParameter('nombre', $nombre);
        return $qb->getQuery()->getResult(); 

        //ESTA ES LA FORMA DE EJECUTAR UN SQL NORMAL
        /* $sql = "SELECT *FSDF";
        $query = $this->getEntityManager()->createQuery($sql);
        $result = $query->getResult(); */
        
    }
    
}