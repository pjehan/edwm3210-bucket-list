<?php

namespace App\Controller\Admin;

use App\Entity\Wish;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WishCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Wish::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextEditorField::new('description'),
            BooleanField::new('isPublished'),
            AssociationField::new('category'),
            AssociationField::new('tags'),
            AssociationField::new('author'),
            ImageField::new('image')->setUploadDir('public/uploads'),
        ];
    }
}
