<?php

namespace App\Controller\Admin;

use App\Entity\VerbLocalization;
use App\Util\ListsUtil;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use SebastianBergmann\CodeCoverage\Report\Text;

class VerbLocalizationCrudController extends AbstractCrudController
{

    public function __construct(
        protected readonly ListsUtil $listsUtil
    )
    {
    }

    public static function getEntityFqcn(): string
    {
        return VerbLocalization::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('infinitive'),
            TextField::new('base'),
            ChoiceField::new('category')
                ->setChoices(array_flip($this->listsUtil->getCategories())),
            ChoiceField::new('dialect_code')
                ->setChoices(array_flip($this->listsUtil->getDialects()))->allowMultipleChoices(true),
            AssociationField::new('sources'),
        ];
    }

}
