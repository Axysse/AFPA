<?php

namespace App\Controller\Admin;

use App\Entity\QuizzReponses;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class QuizzReponsesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QuizzReponses::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('reponse1'),
            TextField::new('reponse2'),
            TextField::new('reponse3'),
            TextField::new('reponse4'),
            TextField::new('reponse5'),
            TextField::new('reponse6'),
            TextField::new('reponse7'),
            TextField::new('reponse8'),
            TextField::new('reponse9'),
            AssociationField::new('Question'),
        ];
    }
    
}
