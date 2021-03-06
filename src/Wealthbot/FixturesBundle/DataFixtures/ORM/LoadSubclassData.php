<?php
/**
 * Created by JetBrains PhpStorm.
 * User: amalyuhin
 * Date: 20.09.12
 * Time: 12:40
 * To change this template use File | Settings | File Templates.
 */

namespace Wealthbot\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Wealthbot\AdminBundle\Entity\Subclass;

class LoadSubclassData extends AbstractFixture implements OrderedFixtureInterface
{
    private $subclasses = array(
        array(
            'name' => 'Subclass 1',
            'asset_class_index' => 1,
            'expected_performance' => 1,
            'account_type_index' => 1
        ),
        array(
            'name' => 'Subclass 2',
            'asset_class_index' => 1,
            'expected_performance' => 1,
            'account_type_index' => 1
        ),
        array(
            'name' => 'Subclass 3',
            'asset_class_index' => 1,
            'expected_performance' => 1,
            'account_type_index' => 1
        ),
        array(
            'name' => 'Subclass 4',
            'asset_class_index' => 2,
            'expected_performance' => 1,
            'account_type_index' => 1
        ),
        array(
            'name' => 'Subclass 5',
            'asset_class_index' => 2,
            'expected_performance' => 1,
            'account_type_index' => 1
        ),
        array(
            'name' => 'Subclass 6',
            'asset_class_index' => 2,
            'expected_performance' => 1,
            'account_type_index' => 1
        ),
        array(
            'name' => 'Subclass 7',
            'asset_class_index' => 3,
            'expected_performance' => 1,
            'account_type_index' => 1
        ),
        array(
            'name' => 'Subclass 8',
            'asset_class_index' => 3,
            'expected_performance' => 1,
            'account_type_index' => 1
        ),
        array(
            'name' => 'Subclass 9',
            'asset_class_index' => 3,
            'expected_performance' => 1,
            'account_type_index' => 1
        )
    );

    public function load(ObjectManager $manager)
    {
        foreach ($this->subclasses as $index => $item) {
            $assetClass = $this->getReference('asset-class-' . $item['asset_class_index']);
            $accountType = $this->getReference('subclass-account-type-' . $item['account_type_index']);

            $subclass = new Subclass();
            $subclass->setName($item['name']);
            $subclass->setExpectedPerformance($item['expected_performance']);
            $subclass->setAssetClass($assetClass);
            $subclass->setAccountType($accountType);

            $manager->persist($subclass);
            $this->addReference('subclass-' . ($index + 1), $subclass);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
