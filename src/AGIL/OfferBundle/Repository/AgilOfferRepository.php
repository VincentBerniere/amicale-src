<?php

namespace AGIL\OfferBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AGIL\OfferBundle\Controller\DefaultController;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * AgilOfferRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AgilOfferRepository extends EntityRepository
{
    /**
     * Permet d'obtenir le nombre d'annonces
     *
     * @return mixed
     */
    public function getCountOffers(){
        $query = $this->_em->createQueryBuilder();
        $query->select('COUNT(offer.offerId) as cnt')
            ->from('AGIL\OfferBundle\Entity\AgilOffer','offer')
            ->where('offer.offerPublish = true')
        ;

        return $query->getQuery()->getSingleScalarResult();
    }

    /**
     * Pagination : Retourne MAX_OFFERS par page
     * @param int $page
     * @param $maxPerPage
     * @return Paginator
     */
    public function getOffersByPage($page=1, $maxPerPage=DefaultController::MAX_OFFERS){
        $query = $this->_em->createQueryBuilder();

        $query->select('offer')
            ->from('AGIL\OfferBundle\Entity\AgilOffer','offer')
            ->where('offer.offerPublish = true')
            ->orderBy('offer.offerPostDate','desc')
        ;

        $query->setFirstResult(($page-1) * $maxPerPage)
            ->setMaxResults($maxPerPage)->getQuery();

        return new Paginator($query);
    }
}
