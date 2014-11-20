<?php

namespace Is\MiniShopBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Is\MiniShopBundle\Entity\Product;
use Is\MiniShopBundle\Entity\Store;

class LoadData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $product = new Product();
        $product
            ->setTitle('Календарь на 2015 год')
            ->setPrice(100)
        ;

        $store = new Store();
        $store
            ->setTitle('Типография Пресс Информ')
            ->setProduct($product)
            ->setProductQuantity(500)
        ;

        $manager->persist($store);
        $manager->persist($product);

        $manager->flush();
    }
}
