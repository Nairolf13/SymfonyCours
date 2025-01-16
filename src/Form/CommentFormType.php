<?php

namespace App\Form;

use App\Entity\Comment;
// use App\Entity\Conference;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CommentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('author', null, [
                'label' => 'Your name',
                'attr' => [
                    'class' => 'w-2/3 mx-auto block px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200',
                    'placeholder' => 'Enter your name',
                ],
                'label_attr' => [
                    'class' => 'block text-lg font-semibold text-gray-700 mb-2 text-center',
                ],
            ])
            ->add('text', null, [
                'attr' => [
                    'class' => 'w-2/3 mx-auto block px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200',
                    'placeholder' => 'Share your thoughts...',
                    'rows' => 4,
                ],
                'label_attr' => [
                    'class' => 'block text-lg font-semibold text-gray-700 mb-2 text-center',
                ],
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'w-2/3 mx-auto block px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200',
                    'placeholder' => 'Enter your email',
                ],
                'label_attr' => [
                    'class' => 'block text-lg font-semibold text-gray-700 mb-2 text-center',
                ],
            ])
            ->add('photo', FileType::class, [
                'required' => false,
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image or PDF file (JPEG, PNG, GIF, or PDF).',
                    ]),
                ],
                'attr' => [
                    'class' => 'w-2/3 mx-auto block text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-white file:bg-gradient-to-r file:from-purple-600 file:to-indigo-600 file:cursor-pointer hover:file:opacity-90 transition-all duration-200',
                ],
                'label_attr' => [
                    'class' => 'block text-lg font-semibold text-gray-700 mb-2 text-center',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'w-1/3 mx-auto block bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-3 px-6 rounded-lg hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transform transition-all duration-200 hover:-translate-y-0.5 font-semibold text-lg',
                ],
                'label' => 'Share Your Comment',
            ]);
    }
    
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
