<?php
namespace App\DataFixtures;


use App\Application\Sonata\ClassificationBundle\Entity\Tag;
use App\Application\Sonata\ClassificationBundle\Entity\Collection;
use App\Application\Sonata\ClassificationBundle\Entity\Context;
use App\Application\Sonata\ClassificationBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Sonata\ClassificationBundle\Model\ContextInterface;

class AppFixtures extends Fixture implements ContainerAwareInterface
{
        /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $user = $userManager->createUser();

        $user->setUsername($data['username']);
        $user->setUsernameCanonical($data['username']);
        $user->setPlainPassword($data['password']);

        $user->setEmail($data['email']);
        $user->setEmailCanonical($data['email']);

        $user->addRole($data['role']);
        $user->setEnabled($data['enabled']);

        $userManager->updateUser($user, true);

        
        $tags = array(
            'symfony' => null,
            'form' => null,
            'general' => null,
            'web2' => null,
        );

        foreach($tags as $tagName => $null) {
            $tag = new Tag;
            $tag->setEnabled(true);
            $tag->setName($tagName);

            $tags[$tagName] = $tag;
            $manager->persist($tag);
        }
        $defaultContext = new Context;
        $defaultContext->setId(ContextInterface::DEFAULT_CONTEXT);
        $defaultContext->setName('Default');
        $defaultContext->setEnabled(true);
        $manager->persist($defaultContext);

        $travels = new Category;
        $travels->setName('Travels');
        $travels->setSlug('travels');
        $travels->setDescription('Discover our travels');
        $travels->setEnabled(true);
        $travels->setContext($defaultContext);
        $manager->persist($travels);

        
        $php = new Collection;
        $php->setName("PHP Fan");
        $php->setSlug("php-fan");
        $php->setDescription("Everything a PHP Fan needs.");
        $php->setEnabled(true);
        $manager->persist($php);



        $manager->flush();
    }

    private function getData()
    {
        return [
            [
                'username' => 'testuser',
                'password' => 'p@ssword',
                'email' => 'admin@email.com',
                'firstname' => 'Boss',
                'lastname' => 'Big',
                'role' => 'ROLE_ADMIN',
                'enabled' => true,
            ],
        ];
    }
}