<?php

    namespace App\Repository;

    use App\Entity\ComplaintNote;
    use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
    use Doctrine\Persistence\ManagerRegistry;

    /**
     * @method ComplaintNote|null find($id, $lockMode = null, $lockVersion = null)
     * @method ComplaintNote|null findOneBy(array $criteria, array $orderBy = null)
     * @method ComplaintNote[]    findAll()
     * @method ComplaintNote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
     */
    class ComplaintNoteRepository extends ServiceEntityRepository
    {
        public function __construct(ManagerRegistry $registry)
        {
            parent::__construct($registry, ComplaintNote::class);
        }

        // /**
        //  * @return ComplaintNote[] Returns an array of ComplaintNote objects
        //  */
        /*
        public function findByExampleField($value)
        {
            return $this->createQueryBuilder('c')
                ->andWhere('c.exampleField = :val')
                ->setParameter('val', $value)
                ->orderBy('c.id', 'ASC')
                ->setMaxResults(10)
                ->getQuery()
                ->getResult()
            ;
        }
        */

        /*
        public function findOneBySomeField($value): ?ComplaintNote
        {
            return $this->createQueryBuilder('c')
                ->andWhere('c.exampleField = :val')
                ->setParameter('val', $value)
                ->getQuery()
                ->getOneOrNullResult()
            ;
        }
        */
    }
?>
-----
<?php

    namespace App\Repository;

    use App\Entity\ComplaintNote;
    use Doctrine\Persistence\ManagerRegistry;
    use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

    /**
     * @method ComplaintNote|null find($id, $lockMode = null, $lockVersion = null)
     * @method ComplaintNote|null findOneBy(array $criteria, array $orderBy = null)
     * @method ComplaintNote[]    findAll()
     * @method ComplaintNote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
     */
    class ComplaintNoteRepository extends ServiceEntityRepository
    {
        public function __construct(ManagerRegistry $registry)
        {
            parent::__construct($registry, ComplaintNote::class);
        }

        // /**
        //  * @return ComplaintNote[] Returns an array of ComplaintNote objects
        //  */
        /*
        public function findByExampleField($value)
        {
            return $this->createQueryBuilder('c')
                ->andWhere('c.exampleField = :val')
                ->setParameter('val', $value)
                ->orderBy('c.id', 'ASC')
                ->setMaxResults(10)
                ->getQuery()
                ->getResult()
            ;
        }
        */

        /*
        public function findOneBySomeField($value): ?ComplaintNote
        {
            return $this->createQueryBuilder('c')
                ->andWhere('c.exampleField = :val')
                ->setParameter('val', $value)
                ->getQuery()
                ->getOneOrNullResult()
            ;
        }
        */
    }
?>
