<?php

namespace Wealthbot\RiaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RiaSearchClientsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('search', 'search', array('required' => false));
    }

    public function getName()
    {
        return 'wealthbot_riabundle_ria_find_clients_form_type';
    }
}
