<?php

namespace App\Controller\Admin;

use App\Entity\QuizzQuestions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class QuizzQuestionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QuizzQuestions::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('question1'),
            TextField::new('question2'),
            TextField::new('question3'),
            AssociationField::new('pole'),
        ];
    }
    
}
