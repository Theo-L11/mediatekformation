<?php

namespace App\Form;

use App\Entity\Playlist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
/**
 * formulaire pour type des playlists
 * 
 * @author Titi L
 */
class PlaylistType extends AbstractType {

    /**
     * Création du formulaire pour ajouter ou modifier une playlist
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
                ->add('name', null, [
                    'label' => 'Nom'
                ])
                ->add('description')
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
            'data_class' => Playlist::class,
        ]);
    }

}