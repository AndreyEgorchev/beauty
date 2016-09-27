<?php
//use SleepingOwl\Admin\Model\ModelConfiguration;
//
//
//AdminSection::registerModel(\App\Article::class, function (ModelConfiguration $model) {
//    $model->setTitle('Сторінки')->setAlias('article');
//    $model->setMessageOndelete('<i class="fa fa-comment-o fa-lg"></i>Сторінка успішно видалений');
//    // Display
//    $model->onDisplay(function () {
//        $display = AdminDisplay::table();
//
//        $display->setColumns([
//            AdminColumn::link('title')->setLabel('Заголовок')
//                ->setWidth('100px'),
//           
//        ]);
//        return $display;
//    });
//    // Create And Edit
//    $model->onCreateAndEdit(function($id = null) {
//        $form = AdminForm::panel();
//      
//            $form->addHeader([
//                AdminFormElement::columns()
//                    ->addColumn([
//                        AdminFormElement::text('title', 'Заголовок')->required()
//                    ], 8)
//                   ]);
//        $tabs = AdminDisplay::tabbed([
//            'Description' => new \SleepingOwl\Admin\Form\FormElements([
//                AdminFormElement::wysiwyg('description', 'Опис')->disableFilter()
//            ]),
//        ]);
//
//        $form->addElement($tabs);
//
//        $form->getButtons()
//            ->setSaveButtonText('Save contact')
//            ->hideCancelButton();
//        return $form;
//    });
//});
//
