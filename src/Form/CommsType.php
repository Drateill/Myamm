<?php

namespace App\Form;

use App\Entity\Comms;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Type',EntityType::class, [
                'class' => 'App\Entity\Meals',
                'required' => false
            ]);
            $builder->get('Type')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event){

                    
                }


            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comms::class,
        ]);
    }
}
