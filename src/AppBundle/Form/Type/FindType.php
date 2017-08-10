<?php

namespace AppBundle\Form\Type;


use AppBundle\Entity\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SearchType.
 */
class FindType extends AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('GET')
            ->add('repositoryName', TextType::class, ['label' => 'Repository Name'])
            ->add('save', SubmitType::class, ['label' => 'Search'])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'cascade_validation' => true,
            'csrf_protection' => true,
        ]);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     * @codeCoverageIgnore
     */
    public function getName()
    {
        return 'app_search';
    }
}
