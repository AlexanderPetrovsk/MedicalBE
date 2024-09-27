<?php

namespace App\Controller\Admin;

use App\Entity\NewsArticle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NewsArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NewsArticle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextEditorField::new('content'),
            ImageField::new('image')->setUploadDir('public/uploads/news_images/')
        ];
    }
}
