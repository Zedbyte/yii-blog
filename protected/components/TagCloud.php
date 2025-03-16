<?php

Yii::import('zii.widgets.CPortlet');

class TagCloud extends CPortlet
{
    public $title='Tags';
    public $maxTags=20;

    // protected function renderContent()
    // {
    //     $tags=Tag::model()->findTagWeights($this->maxTags);

    //     echo '<div class="flex flex-wrap gap-2">'; // Flexbox container for better spacing
    //     foreach ($tags as $tag => $weight) {
    //         $link = CHtml::link(
    //             CHtml::encode($tag),
    //             array('post/index', 'tag' => $tag),
    //             array('class' => 'hover:text-white') // Hover effect
    //         );

    //         echo CHtml::tag('span', array(
    //             'class' => 'px-3 py-1 rounded-full transition-all hover:bg-stone-500 hover:text-gray-200',
    //             'style' => "font-size: 11px; background-color: rgba(68,64,60, 1); color: #fff;", // Blue-tinted background
    //         ), $link) . "\n";
    //     }
    //     echo '</div>';
    // }
    protected function renderContent()
    {
        $tags = Tag::model()->findTagWeights($this->maxTags);

        echo '<div class="flex flex-wrap gap-2">'; // Flexbox container for better spacing
        foreach ($tags as $tag => $data) {
            $link = CHtml::link(
                CHtml::encode($tag),
                array('post/index', 'tag' => $tag),
                array('class' => 'hover:text-white') // Hover effect
            );

            echo CHtml::tag('span', array(
                'class' => 'px-3 py-1 rounded-full transition-all hover:bg-stone-500 hover:text-gray-200',
                'style' => "font-size: {$data['weight']}px; background-color: rgba(68,64,60, 1); color: #fff;", // Adjust font size based on weight
            ), $link . " ({$data['frequency']})") . "\n"; // Append frequency in parentheses
        }
        echo '</div>';
    }
}