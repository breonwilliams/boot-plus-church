<?php
/**
 * Created by PhpStorm.
 * User: breon
 * Date: 12/4/16
 * Time: 8:41 AM
 */

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_sermon-field-group',
        'title' => 'Sermon Field Group',
        'fields' => array (
            array (
                'key' => 'field_583c87fe766ac',
                'label' => 'Speaker',
                'name' => 'speaker',
                'type' => 'text',
                'instructions' => 'Enter the name of the speaker for this sermon here.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_583c8844766ad',
                'label' => 'Scripture',
                'name' => 'scripture',
                'type' => 'text',
                'instructions' => 'Enter the book, chapter and verse here (i.e. Genesis 1:1).',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_583c88ee766ae',
                'label' => 'Audio',
                'name' => 'audio',
                'type' => 'text',
                'instructions' => 'Add audio mp3 url here.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_583c8aa9766af',
                'label' => 'Document',
                'name' => 'document',
                'type' => 'file',
                'instructions' => 'Upload document related to this sermon.',
                'save_format' => 'url',
                'library' => 'all',
            ),
            array (
                'key' => 'field_583c906ed2fd0',
                'label' => 'Video',
                'name' => 'video',
                'type' => 'text',
                'instructions' => 'Add the youtube video url for this sermon here.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'sermons',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_staff-field-group',
        'title' => 'Staff Field Group',
        'fields' => array (
            array (
                'key' => 'field_583b44023beca',
                'label' => 'Email',
                'name' => 'email',
                'type' => 'text',
                'instructions' => 'Add staff member\'s email address.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_583b445b3becb',
                'label' => 'Phone Number',
                'name' => 'phone_number',
                'type' => 'text',
                'instructions' => 'Add staff members phone number.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_583b55c94e0db',
                'label' => 'Staff Title',
                'name' => 'staff_title',
                'type' => 'text',
                'instructions' => 'Add staff members title.',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'staff',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}
