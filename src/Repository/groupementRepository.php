<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\Groupements;

class groupementRepository extends EntityRepository
{
    public function myFindNombreAdhrent()
    {
    	$query = $this->_em->createQuery('SELECT count(*) FROM App\Entity\Groupements')->setParameter('NombreAdherent', $NombreAdherent);;
 		 return $query->getResult();
        
    }
    
}