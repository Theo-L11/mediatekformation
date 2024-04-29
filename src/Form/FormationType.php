<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Formation;
use App\Entity\Playlist;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
/**
 * formulaire pour type des formation
 * 
 * @author Titi L
 */
class FormationType extends AbstractType {

    /**
     * Création du formulaire pour ajouter ou modifier une formation
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
                ->add('publishedAt', null, [
                    'widget' => 'single_text',
                    'label' => 'Date'
                ])
                ->add('title', null, [
                    'label' => 'Titre'
                ])
                ->add('categories', EntityType::class, [
                    'class' => Categorie::class,
                    'choice_label' => 'name',
                    'multiple' => true,
                    'required' => false
                ])
                ->add('playlist', EntityType::class, [
                    'class' => Playlist::class,
                    'choice_label' => 'name'
                ])
                ->add('description', null, [
                    'label' => 'Description',
                    'required' => false
                ])
                ->add('videoId', null, [
                    'label' => 'Identifiant de la vidéo:'
                ])
                ->add('submit', SubmitType::class, [
                    'label' => 'Enregistrer'
                ])
        ;
    }

    /**
     * Configure les options du formulaire
     * @param OptionsResolver $resolver
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }

}
