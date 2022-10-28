<?php

namespace App\Form;

use App\Entity\Disc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class DiscType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                'label' => 'Nom du disque',
                'help' => 'Indiquez ici le nom complet du disque',
                'attr' => [
                    'placeholder' => 'Titre',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/',
                        'message' => 'Caratère(s) non valide(s)'
                    ]),
                ]
            ])
            ->add('year', TextType::class,[
                'label' => 'Année du dique',
                'help' => "Indiquez ici l'année de sortie du disque",
                'attr' => [
                    'placeholder' => 'Année',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[12][0-9]{3}$/',
                        'message' => 'Caratère(s) non valide(s)'
                    ]),
                ]
            ])
            ->add('picture', FileType::class,[
                'label' => 'Jaquette du disque',
                'help' => 'Selectionnez une image',
                'attr' => [
                    'placeholder' => 'Jaquette.jpg',
                ],
            ])
            ->add('label', TextType::class,[
                'label' => 'Nom du label',
                'help' => 'Indiquez ici le nom complet du label',
                'attr' => [
                    'placeholder' => 'Label',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/',
                        'message' => 'Caratère(s) non valide(s)'
                    ]),
                ]
            ])
            ->add('genre', TextType::class,[
                'label' => 'Nom du genre',
                'help' => 'Indiquez ici le nom complet du genre',
                'attr' => [
                    'placeholder' => 'Genre',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/',
                        'message' => 'Caratère(s) non valide(s)'
                    ]),
                ]
            ])
            ->add('price', TextType::class,[
                'label' => 'Prix disque',
                'help' => 'Indiquez ici le prix du disque',
                'attr' => [
                    'placeholder' => 'Prix',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\d+(,\d{1,2})?$/',
                        'message' => 'Caratère(s) non valide(s)'
                    ]),
                ]
            ])
            ->add('artist', null,[
                'label' => 'Artiste',
                'help' => 'Selectionnez un artiste',
                'attr' => [
                    'placeholder' => 'Artiste',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Disc::class,
        ]);
    }
}
